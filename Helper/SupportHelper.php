<?php

namespace Kanboard\Plugin\KanboardSupport\Helper;

use Kanboard\Core\Base;

class SupportHelper extends Base
{
    public function getBrowser()
    {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser = "N/A";
        $browsers = [
     '/msie/i' => 'Internet explorer',
     '/firefox/i' => 'Firefox',
     '/safari/i' => 'Safari',
     '/chrome/i' => 'Chrome',
     '/edge/i' => 'Edge',
     '/opera/i' => 'Opera',
     '/mobile/i' => 'Mobile browser',
    ];
        foreach ($browsers as $regex => $value) {
     if (preg_match($regex, $user_agent)) {
       $browser = $value;
     }
    }
        return $browser;
    }

    public function getPermissions($dir)
    {
        $perms = fileperms($dir);

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
                $info = '<span class="p-type" title="Directory">d</span>';
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
                    (($perms & 0x0800) ? 's' : 'x' ) :
                    (($perms & 0x0800) ? 'S' : '-'));

        // Group
        $info .= (($perms & 0x0020) ? 'r' : '-');
        $info .= (($perms & 0x0010) ? 'w' : '-');
        $info .= (($perms & 0x0008) ?
                    (($perms & 0x0400) ? 's' : 'x' ) :
                    (($perms & 0x0400) ? 'S' : '-'));

        // World
        $info .= (($perms & 0x0004) ? 'r' : '-');
        $info .= (($perms & 0x0002) ? 'w' : '-');
        $info .= (($perms & 0x0001) ?
                    (($perms & 0x0200) ? 't' : 'x' ) :
                    (($perms & 0x0200) ? 'T' : '-'));

        echo $info;
        clearstatcache();
    }

    public function getPermissionsLinux($directory)
    {
        if(!file_exists($directory)) return false;

        echo substr(sprintf('%o', fileperms($directory)), -4);
        clearstatcache();
    }

    public function getPermissionsOwner($directory)
    {
        $owner = posix_getpwuid(fileowner($directory));
        echo $owner['name'];
    }

}
