<?php

namespace Kanboard\Plugin\KanboardSupport\Helper;

use Kanboard\Core\Base;

/**
 * Plugin KanboardSupport
 * Class SupportHelper
 *
 * @package  Plugin\KanboardSupport\Helper
 * @author   aljawaid
 *
 * Cross-platform behaviour is covered by tests/SupportHelperTest.php.
 */
class SupportHelper extends Base
{
    /**
     * Get SVG Icons for Inline Markup and CSS Styling (Embed SVG Fly Method)
     *
     * Include filename as class inside SVG file
     * Set 'color' as 'currentColor' to use CSS or define a color
     * Style using normal CSS
     * @uses    $this->helper->supportHelper->embedSVGIcon('icon-filename-without-extension')
     * @var     $svgFilename
     * @return  svg
     * @author  Erik Moberg https://www.erikmoberg.net/article/embed-svg-icons-in-html-with-php
     * @author  aljawaid
     */
    public function embedSVGIcon($icon_filename)
    {
        if (!preg_match('/^[a-z0-9-]+$/i', $icon_filename)) {
            return '';
        }

        $pluginName = $this->router->getPlugin() ? $this->helper->app->getPluginName() : 'KanboardSupport';
        $iconPath = PLUGINS_DIR . DIRECTORY_SEPARATOR . $pluginName . DIRECTORY_SEPARATOR
            . 'Assets' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . $icon_filename . '.svg';
        $icon = is_file($iconPath) ? file_get_contents($iconPath) : false;

        return $icon === false ? '' : $icon;
    }

    /**
     * Mask the IP Address for Security Reasons
     *
     * Works with IP addresses and hostnames (e.g. 'localhost' will become 'xhost')
     * Use for where the value is either an IP address or a 'localhost' hostname
     * @uses    $this->helper->supportHelper->maskIPAddress('ip address')
     * @var     $ip_address
     * @return  string          'xxx.xxx.xxx.123' or 'xhost'
     * @author  latrarchy       https://stackoverflow.com/a/31195574
     * @author  aljawaid
     */
    public function maskIPAddress($ip_address)
    {
        $ip_address = trim((string) $ip_address);

        if ($ip_address === '' || strcasecmp($ip_address, 'localhost') === 0) {
            return $this->maskedValue('xhost');
        }

        if (filter_var($ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $octets = explode('.', $ip_address);
            return $this->maskedValue('xxx.xxx.xxx.' . $octets[3]);
        }

        if (filter_var($ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $normalized = inet_ntop(inet_pton($ip_address));
            $segments = array_values(array_filter(explode(':', $normalized), 'strlen'));
            $lastSegment = $segments === array() ? '0' : end($segments);
            return $this->maskedValue('xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:' . $lastSegment);
        }

        return $this->maskServer($ip_address);
    }

    /**
     * Mask the Directory Path for Security Reasons
     *
     * @uses    $this->helper->supportHelper->maskPath('directory/path')
     * @var     $path
     * @return  string          '/xxx/xxx/xxx/public_html'
     * @author  aljawaid
     */
    public function maskPath($path)
    {
        $normalized = str_replace('\\', '/', trim((string) $path));
        $directories = array_values(array_filter(explode('/', trim($normalized, '/')), 'strlen'));

        if ($directories === array()) {
            return $this->maskedValue('xxx');
        }

        $lastDirectory = array_pop($directories);
        $maskedDirectories = array_fill(0, max(1, count($directories)), 'xxx');
        $maskedDirectories[] = $lastDirectory;

        return $this->maskedValue(implode('/', $maskedDirectories));
    }

    /**
     * Mask the Server Name for Security Reasons
     *
     * Works with mail servers to display the first and last part of the value only deriving from a domain
     * @uses    $this->helper->supportHelper->maskServer('mail.server.com')
     * @var     $server_name
     * @return  string          'mail.xxx.com'
     * @author  aljawaid
     */
    public function maskServer($server_name)
    {
        $server_name = trim((string) $server_name);

        if (filter_var($server_name, FILTER_VALIDATE_IP)) {
            return $this->maskIPAddress($server_name);
        }

        $parts = array_values(array_filter(explode('.', $server_name), 'strlen'));

        if (count($parts) < 2) {
            return $this->maskedValue('xhost');
        }

        if (count($parts) === 2) {
            return $this->maskedValue('xxx.' . $parts[1]);
        }

        return $this->maskedValue($parts[0] . '.xxx.' . end($parts));
    }

    /**
     * Detect User Browser
     *
     * @see     support.php
     * @return  string
     * @author  W3docs https://www.w3docs.com/snippets/php/browser-detection.html
     */
    public function getBrowser()
    {
        $user_agent = $this->request->getServerVariable('HTTP_USER_AGENT');
        $browser = "N/A";
        $browsers = [
            '/msie/i' => 'Internet Explorer',
            '/firefox/i' => 'Mozilla Firefox',
            '/edge/i' => 'Edge',
            '/edg/i' => 'Edge',
            '/opr/i' => 'Opera',
            '/opera/i' => 'Opera',
            '/chrome/i' => 'Chrome',
            '/safari/i' => 'Safari',
            '/mobile/i' => 'Mobile browser',
        ];
        foreach ($browsers as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                return $value;
            }
        }

        return $browser;
    }

    /**
     * Get Directory Permissions
     *
     * @var     $dir
     * @see     support.php app-config.php
     * @return  string
     * @author  PHP Example #2 https://www.php.net/manual/en/function.fileperms.php
     */
    public function getPermissions($dir)
    {
        if (!file_exists($dir)) {
            return t('Not available');
        }

        $perms = fileperms($dir);

        if ($perms === false) {
            return t('Not available');
        }

        switch ($perms & 0xF000) {
            case 0xC000: // socket
                $info = 's';
                break;
            case 0xA000: // symbolic link
                $info = 'l';
                break;
            case 0x8000: // regular
                $info = 'r';
                break;
            case 0x6000: // block special
                $info = 'b';
                break;
            case 0x4000: // directory
                $info = '<span class="p-type" title="' . t('Directory') . '">d</span>';
                break;
            case 0x2000: // character special
                $info = 'c';
                break;
            case 0x1000: // FIFO pipe
                $info = 'p';
                break;
            default: // unknown
                $info = 'u';
        }

        // Owner
        $info .= (($perms & 0x0100) ? 'r' : '-');
        $info .= (($perms & 0x0080) ? 'w' : '-');
        $info .= (($perms & 0x0040) ?
                    (($perms & 0x0800) ? 's' : 'x') :
                    (($perms & 0x0800) ? 'S' : '-'));

        // Group
        $info .= (($perms & 0x0020) ? 'r' : '-');
        $info .= (($perms & 0x0010) ? 'w' : '-');
        $info .= (($perms & 0x0008) ?
                    (($perms & 0x0400) ? 's' : 'x') :
                    (($perms & 0x0400) ? 'S' : '-'));

        // World
        $info .= (($perms & 0x0004) ? 'r' : '-');
        $info .= (($perms & 0x0002) ? 'w' : '-');
        $info .= (($perms & 0x0001) ?
                    (($perms & 0x0200) ? 't' : 'x') :
                    (($perms & 0x0200) ? 'T' : '-'));

        return $info;
    }

    /**
     * Get Linux Directory Permissions
     *
     * Displays as octal value
     * @var     $directory
     * @see     support.php app-config.php
     * @return  string
     * @author  PHP Example #1 https://www.php.net/manual/en/function.fileperms.php
     */
    public function getPermissionsLinux($directory)
    {
        if (!file_exists($directory)) {
            return t('Not available');
        }

        $permissions = fileperms($directory);

        return $permissions === false ? t('Not available') : substr(sprintf('%o', $permissions), -4);
    }

    /**
     * Get Directory Owner
     *
     * @var     $dir
     * @see     support.php app-config.php
     * @return  string
     * @author  PHP https://www.php.net/manual/en/function.posix-getpwuid.php
     */
    public function getPermissionsOwner($directory)
    {
        if (!file_exists($directory)) {
            return t('Not available');
        }

        $ownerId = fileowner($directory);

        if ($ownerId === false || !function_exists('posix_getpwuid')) {
            return t('Not available');
        }

        $owner = posix_getpwuid($ownerId);

        return is_array($owner) && isset($owner['name']) ? $owner['name'] : t('Not available');
    }

    /**
     * Display The Debug Log File
     *
     * Slightly modified version of http://www.geekality.net/2011/05/28/php-tail-tackling-large-files/
     * @author      Torleif Berger, Lorenzo Stanco
     * @link        http://stackoverflow.com/a/15025877/995958
     * @link        https://gist.github.com/lorenzos/1711e81a9162320fde20
     * @license     http://creativecommons.org/licenses/by/3.0/
     */
    public function displayDebugFile($filepath = LOG_FILE, $lines = 50, $adaptive = true)
    {
        $lines = max(1, (int) $lines);

        // Open file
        $f = @fopen($filepath, "rb");
        if ($f === false) {
            return '';
        }

        $fileStats = fstat($f);
        if ($fileStats === false || $fileStats['size'] === 0) {
            fclose($f);
            return '';
        }

        // Sets buffer size, according to the number of lines to retrieve.
        // This gives a performance boost when reading a few lines from the file.
        if (!$adaptive) {
            $buffer = 4096;
        } else {
            $buffer = ($lines < 2 ? 64 : ($lines < 10 ? 512 : 4096));
        }

        // Jump to last character
        if (fseek($f, -1, SEEK_END) !== 0) {
            fclose($f);
            return '';
        }

        // Read it and adjust line number if necessary
        // (Otherwise the result would be wrong if file doesn't end with a blank line)
        if (fread($f, 1) != "\n") {
            $lines -= 1;
        }

        // Start reading
        $output = '';
        $chunk = '';

        // While we would like more
        while (ftell($f) > 0 && $lines >= 0) {
            // Figure out how far back we should jump
            $seek = min(ftell($f), $buffer);

            // Do the jump (backwards, relative to where we are)
            fseek($f, -$seek, SEEK_CUR);

            // Read a chunk and prepend it to our output
            $output = ($chunk = fread($f, $seek)) . $output;

            // Jump back to where we started reading
            fseek($f, -mb_strlen($chunk, '8bit'), SEEK_CUR);

            // Decrease our line counter
            $lines -= substr_count($chunk, "\n");
        }

        // While we have too many lines
        // (Because of buffer size we might have read too many)
        while ($lines++ < 0) {
            // Find first newline and remove all text before that
            $output = substr($output, strpos($output, "\n") + 1);
        }

        // Close file and return
        fclose($f);

        return trim($output);
    }

    /**
     * Get the Debug Log File Size in MB
     *
     * @see         app-sections.php
     * @return      $filesize       string
     * @author      aljawaid
     */
    public function getLogFileSize($filepath = LOG_FILE)
    {
        if (!is_file($filepath)) {
            return t('Not available');
        }

        $debug_log_file = filesize($filepath);
        if ($debug_log_file === false) {
            return t('Not available');
        }

        $filesizeMB = ($debug_log_file / 1024 / 1024);
        $filesize = number_format($filesizeMB, 2);

        return $filesize . '&nbsp;MB';
    }

    /**
     * Return a server variable without producing missing-key warnings.
     *
     * @param  string $name
     * @param  string $fallback
     * @return string
     */
    public function getServerVariable($name, $fallback = '')
    {
        $value = $this->request->getServerVariable($name);

        return $value === '' ? $fallback : $value;
    }

    /**
     * Return the effective session storage directory.
     *
     * @return string
     */
    public function getSessionSavePath()
    {
        $path = session_save_path();

        return $path === '' ? sys_get_temp_dir() : $path;
    }

    /**
     * Return the current request path without relying on non-standard server variables.
     *
     * @return string
     */
    public function getCurrentPage()
    {
        return $this->request->getUri();
    }

    /**
     * Report whether Kanboard detected a secure request, including proxy-aware requests.
     *
     * @return bool
     */
    public function isHttps()
    {
        return $this->request->isHTTPS();
    }

    /**
     * Render a privacy-masked value with an escaped explanation.
     *
     * @param  string $value
     * @return string
     */
    private function maskedValue($value)
    {
        return '<span class="masked-value" title="' . $this->escape(t('Only Administrators can see the full value')) . '">'
            . $this->escape($value)
            . '</span>';
    }

    /**
     * Escape dynamic text for HTML output.
     *
     * @param  string $value
     * @return string
     */
    private function escape($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}
