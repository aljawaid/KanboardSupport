<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('General Configuration') ?>
    </summary>
    <div class="accordion-content">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Escape HTML Inside Markdown') ?></li>
            <?php if (MARKDOWN_ESCAPE_HTML == false): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('External content will be trusted. Inline HTML will be rendered.') ?>">
                    <?= t('False') ?>
                </li>
                <span class="fail-x" title="<?= t('External content will be trusted. Inline HTML will be rendered.') ?>">&#10008;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('External content is not trusted by default for security reasons therefore inline HTML will not be rendered.') ?>">
                    <?= t('True') ?>
                </li>
                <span class="pass-tick" title="<?= t('External content is not trusted by default for security reasons therefore inline HTML will not be rendered.') ?>">&#10004;</span>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Enable URL Rewrite (Pretty URLs)') ?></li>
            <?php if (ENABLE_URL_REWRITE == false): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('Ensure the server configuration is correct before changing this setting') ?>">
                    <?= t('False') ?>
                </li>
                <span class="fail-x" title="<?= t('Ensure the server configuration is correct before changing this setting') ?>">&#10008;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('Pretty URLs are enabled') ?>">
                    <?= t('True') ?>
                </li>
                <span class="pass-tick" title="<?= t('Pretty URLs are enabled') ?>">&#10004;</span>
            <?php endif ?>
        </span>
    </div>
</details>
<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('Plugins Configuration') ?>
    </summary>
    <div class="accordion-content">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Plugins Installer') ?></li>
            <?php if (PLUGIN_INSTALLER == false): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('Plugins cannot be installed. This is also set by default for security reasons.') ?>">
                    <?= t('Disabled') ?>
                </li>
                <span class="fail-x" title="<?= t('Plugins cannot be installed. This is also set by default for security reasons.') ?>">&#10008;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('Plugins can be automatically installed through the Plugins Directory') ?>">
                    <?= t('Enabled') ?>
                </li>
                <span class="pass-tick" title="<?= t('Plugins can be automatically installed through the Plugins Directory') ?>">&#10004;</span>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Plugins Directory') ?></li>
            <?php if ($this->user->isAdmin()): ?>
                <li class="app-info-value value-path border-bottom-thick privacy">
                    <?= PLUGINS_DIR ?>
                </li>
            <?php else: ?>
                <li class="app-info-value value-path border-bottom-thick">
                    <?= $this->helper->supportHelper->maskPath(PLUGINS_DIR) ?>
                </li>
            <?php endif ?>
            <?php if (!is_writable(PLUGINS_DIR)): ?>
                <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
            <?php else: ?>
                <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
            <?php endif ?>
            <?php if ($this->user->isAdmin()): ?>
                <div id="pCheck" class="p-check">
                    <?php if (!is_writable(PLUGINS_DIR)): ?>
                        <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissions(PLUGINS_DIR) ?>
                        </span>
                        <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissionsLinux(PLUGINS_DIR) ?>
                        </span>
                        <span class="p-owner" title="<?= t('Directory Owner') ?>">
                            <?= $this->helper->supportHelper->getPermissionsOwner(PLUGINS_DIR) ?>
                        </span>
                    <?php else: ?>
                        <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissions(PLUGINS_DIR) ?>
                        </span>
                        <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissionsLinux(PLUGINS_DIR) ?>
                        </span>
                        <span class="p-owner" title="<?= t('Directory Owner') ?>">
                            <?= $this->helper->supportHelper->getPermissionsOwner(PLUGINS_DIR) ?>
                        </span>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Plugins Directory URL') ?></li>
            <?php if (PLUGIN_API_URL == 'https://kanboard.org/plugins.json'): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('Plugins will be listed from the default source') ?>">
                    <?= PLUGIN_API_URL ?>
                </li>
                <span class="pass-tick" title="<?= t('Plugins will be listed from the default source') ?>">&#10004;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick privacy" title="<?= t('Plugins will be listed from a custom source') ?>">
                    <?= PLUGIN_API_URL ?>
                </li>
                <span class="pass-tick" title="<?= t('Plugins will be listed from a custom source') ?>">&#10004;</span>
            <?php endif ?>
        </span>
    </div>
</details>
<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('Directory Paths') ?>
    </summary>
    <div class="accordion-content">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Data Directory') ?></li>
            <?php if ($this->user->isAdmin()): ?>
                <li class="app-info-value value-path border-bottom-thick privacy">
                    <?= DATA_DIR ?>
                </li>
            <?php else: ?>
                <li class="app-info-value value-path border-bottom-thick">
                    <?= $this->helper->supportHelper->maskPath(DATA_DIR) ?>
                </li>
            <?php endif ?>
            <?php if (!is_writable(DATA_DIR)): ?>
                <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
            <?php else: ?>
                <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
            <?php endif ?>
            <?php if ($this->user->isAdmin()): ?>
                <div id="pCheck" class="p-check">
                    <?php if (!is_writable(DATA_DIR)): ?>
                        <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissions(DATA_DIR) ?>
                        </span>
                        <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissionsLinux(DATA_DIR) ?>
                        </span>
                        <span class="p-owner" title="<?= t('Directory Owner') ?>">
                            <?= $this->helper->supportHelper->getPermissionsOwner(DATA_DIR) ?>
                        </span>
                    <?php else: ?>
                        <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissions(DATA_DIR) ?>
                        </span>
                        <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissionsLinux(DATA_DIR) ?>
                        </span>
                        <span class="p-owner" title="<?= t('Directory Owner') ?>">
                            <?= $this->helper->supportHelper->getPermissionsOwner(DATA_DIR) ?>
                        </span>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Files Directory') ?></li>
            <?php if ($this->user->isAdmin()): ?>
                <li class="app-info-value value-path border-bottom-thick privacy">
                    <?= FILES_DIR ?>
                </li>
            <?php else: ?>
            <li class="app-info-value value-path border-bottom-thick">
                <?= $this->helper->supportHelper->maskPath(FILES_DIR) ?>
            </li>
            <?php endif ?>
            <?php if (!is_writable(FILES_DIR)): ?>
                <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
            <?php else: ?>
                <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
            <?php endif ?>
            <?php if ($this->user->isAdmin()): ?>
                <div id="pCheck" class="p-check">
                    <?php if (!is_writable(FILES_DIR)): ?>
                        <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissions(FILES_DIR) ?>
                        </span>
                        <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissionsLinux(FILES_DIR) ?>
                        </span>
                        <span class="p-owner" title="<?= t('Directory Owner') ?>">
                            <?= $this->helper->supportHelper->getPermissionsOwner(FILES_DIR) ?>
                        </span>
                    <?php else: ?>
                        <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissions(FILES_DIR) ?>
                        </span>
                        <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissionsLinux(FILES_DIR) ?>
                        </span>
                        <span class="p-owner" title="<?= t('Directory Owner') ?>">
                            <?= $this->helper->supportHelper->getPermissionsOwner(FILES_DIR) ?>
                        </span>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Cache Directory') ?></li>
            <?php if ($this->user->isAdmin()): ?>
                <li class="app-info-value value-path border-bottom-thick privacy">
                    <?= CACHE_DIR ?>
                </li>
            <?php else: ?>
                <li class="app-info-value value-path border-bottom-thick">
                    <?= $this->helper->supportHelper->maskPath(CACHE_DIR) ?>
                </li>
            <?php endif ?>
            <?php if (!is_writable(CACHE_DIR)): ?>
                <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
            <?php else: ?>
                <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
            <?php endif ?>
            <?php if (!defined('CACHE_DRIVER') or (CACHE_DRIVER == 'memory')): ?>
                <span class="p-note"><i><?= e('%s as Cache Driver is set to %s', '<strong>' . t('Not required') . '</strong>', '<code>memory</code>') ?></i></span>
            <?php else: ?>
                <?php if ($this->user->isAdmin()): ?>
                    <div id="pCheck" class="p-check">
                        <?php if (!is_writable(CACHE_DIR)): ?>
                            <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissions(CACHE_DIR) ?>
                            </span>
                            <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissionsLinux(CACHE_DIR) ?>
                            </span>
                            <span class="p-owner" title="<?= t('Directory Owner') ?>">
                                <?= $this->helper->supportHelper->getPermissionsOwner(CACHE_DIR) ?>
                            </span>
                        <?php else: ?>
                            <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissions(CACHE_DIR) ?>
                            </span>
                            <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissionsLinux(CACHE_DIR) ?>
                            </span>
                            <span class="p-owner" title="<?= t('Directory Owner') ?>">
                                <?= $this->helper->supportHelper->getPermissionsOwner(CACHE_DIR) ?>
                            </span>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            <?php endif ?>
        </span>
    </div>
</details>
<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('Logs & Sessions') ?>
    </summary>
    <div class="accordion-content">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Log File') ?></li>
            <?php if ($this->user->isAdmin()): ?>
                <li class="app-info-value value-path border-bottom-thick privacy">
                    <?= LOG_FILE ?>
                </li>
            <?php else: ?>
                <li class="app-info-value value-path border-bottom-thick">
                    <?= $this->helper->supportHelper->maskPath(LOG_FILE) ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Session Handler') ?></li>
            <li class="app-info-value border-bottom-thick">
                <?php if (SESSION_HANDLER == 'php'): ?>
                    <span>PHP</span>
                <?php else: ?>
                    <span><?= t('Database') ?></span>
                <?php endif ?>
            </li>
        </span>
        <span class="data-wrap mt-0">
            <li class="app-info-title"><?= t('Session Duration') ?></li>
            <li class="app-info-value value-version border-bottom-thick">
                <?= SESSION_DURATION ?> <small><i><?= t('Until browser is closed') ?></i></small>
            </li>
        </span>
        <span class="data-wrap mt-0 debug-wrapper">
            <li class="app-info-title"><?= t('Debug Mode') ?></li>
            <?php if (DEBUG == 'true'): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This setting will affect performance and should only be enabled for troubleshooting purposes') ?>">
                    <?= t('Enabled') ?>
                </li>
                <span class="fail-x" title="<?= t('This setting will affect performance and should only be enabled for troubleshooting purposes') ?>">&#10008;</span>
                <div class="debug-btns">
                    <button href="<?= $this->url->href('TechnicalSupportController', 'showDebugLogModal', array(
                        'plugin' => 'KanboardSupport'), false, '', false) ?>" class="btn js-modal-confirm config-download-btn" title="<?= t('View the last few entries of the log file') ?>">
                        <?= $this->helper->supportHelper->embedSVGIcon('log-icon-red') ?> <?= t('View Log') ?>
                    </button>
                    <?php if ($this->user->isAdmin()): ?>
                        <div class="btn-group" role="group">
                            <span class=""><?= t('Download Log') ?></span>
                            <?php if (extension_loaded('zip')): ?>
                                <form method="post" action="<?= $this->url->href('TechnicalSupportController', 'downloadDebugFile', array('plugin' => 'KanboardSupport'), true, '', false) ?>">
                                    <button type="submit" class="btn config-download-btn debug-download-btn" title="<?= t('Download Compressed Log File') ?>">
                                        <?= $this->helper->supportHelper->embedSVGIcon('zip-icon') ?>
                                    </button>
                                </form>
                            <?php else: ?>
                                <button type="submit" class="btn config-download-btn debug-download-btn" title="<?= t('Download Log File') ?>">
                                    <?= $this->helper->supportHelper->embedSVGIcon('log-icon-green') ?>
                                </button>
                            <?php endif ?>
                            <form method="post" action="<?= $this->url->href('TechnicalSupportController', 'downloadRawDebugFile', array('plugin' => 'KanboardSupport'), true, '', false) ?>">
                                <button type="submit" class="btn config-download-btn debug-raw-download-btn" title="<?= t('Download Log File') ?>">
                                    <?= $this->helper->supportHelper->embedSVGIcon('log-icon-green') ?>
                                </button>
                            </form>
                            <span class="" title="<?= t('Uncompressed file size') ?>">
                                <?= $this->helper->supportHelper->getLogFileSize() ?>
                            </span>
                        </div>
                        <form class="delete-log" method="post" action="<?= $this->url->href('TechnicalSupportController', 'deleteDebugLog', array('plugin' => 'KanboardSupport'), true, '', false) ?>">
                            <button type="submit" class="btn config-download-btn config-btn-red" title="<?= t('Delete the log file') ?>">
                                <i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <?= t('Delete Log') ?>
                            </button>
                            <p class="form-help"><?= t('Once deleted, the file will be immediately recreated.') ?></p>
                        </form>
                    <?php endif ?>
                </div>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default and recommended setting') ?>">
                    <?= t('Not Enabled') ?>
                </li>
                <span class="pass-tick" title="<?= t('This is the default and recommended setting') ?>">&#10004;</span>
                <?php if (file_exists(LOG_FILE)): ?>
                    <div class="debug-btns">
                        <button href="<?= $this->url->href('TechnicalSupportController', 'showDebugLogModal', array(
                            'plugin' => 'KanboardSupport'), false, '', false) ?>" class="btn js-modal-confirm config-download-btn" title="<?= t('View the last few entries of the log file') ?>">
                            <?= $this->helper->supportHelper->embedSVGIcon('log-icon-red') ?> <?= t('View Log') ?>
                        </button>
                    </div>
                <?php endif ?>
            <?php endif ?>
        </span>
    </div>
</details>
<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('Login and Security Configuration') ?>
    </summary>
    <div class="accordion-content">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Self-Signed Certificates') ?></li>
            <?php if (HTTP_VERIFY_SSL_CERTIFICATE == true): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting. Change the value to \'false\' if your server is using self-signed security certificates.') ?>">
                    <?= t('Not Allowed') ?>
                </li>
                <span class="fail-x" title="<?= t('This is the default setting. Change the value to \'false\' if your server is using self-signed security certificates.') ?>">&#10008;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('Correctly configured self-signed security certificates can be used') ?>">
                    <?= t('Allowed') ?>
                </li>
                <span class="pass-tick" title="<?= t('Correctly configured self-signed security certificates can be used') ?>">&#10004;</span>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('TOTP Issuer Name') ?></li>
            <?php if (TOTP_ISSUER == 'Kanboard'): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= TOTP_ISSUER ?>
                </li>
                <span class="pass-tick" title="<?= t('This is the default setting') ?>">&#10004;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick">
                    <?= TOTP_ISSUER ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap mt-0">
            <li class="app-info-title"><?= t('Excluded Fields During External Authentication') ?></li>
            <?php if (EXTERNAL_AUTH_EXCLUDE_FIELDS == 'username'): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= EXTERNAL_AUTH_EXCLUDE_FIELDS ?>
                </li>
                <span class="pass-tick" title="<?= t('This is the default setting') ?>">&#10004;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick"><?= EXTERNAL_AUTH_EXCLUDE_FIELDS ?></li>
            <?php endif ?>
        </span>
        <span class="data-wrap mt-0">
            <li class="app-info-title"><?= t('Hide Login Form') ?></li>
            <?php if (HIDE_LOGIN_FORM == false): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= t('Not Hidden') ?>
                </li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick">
                    <?= t('Hidden') ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap mt-0">
            <li class="app-info-title"><?= t('Disable Logout') ?></li>
            <?php if (DISABLE_LOGOUT == false): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= t('Not Disabled') ?>
                </li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick">
                    <?= t('Disabled') ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap mt-0">
            <li class="app-info-title"><?= t('API Authentication Header') ?></li>
            <?php if (API_AUTHENTICATION_HEADER == false): ?>
                <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                    <?= t('Not Set') ?>
                </li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick">
                    <?= API_AUTHENTICATION_HEADER ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap mt-0">
            <li class="app-info-title"><?= t('X-Frame DENY HTTP Header') ?></li>
            <?php if (ENABLE_XFRAME == true): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= t('Enabled') ?>
                </li>
                <span class="pass-tick" title="<?= t('This is the default and recommended setting') ?>">&#10004;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick">
                    <?= t('Disabled') ?>
                </li>
                <span class="fail-x" title="<?= t('This is not the recommended setting') ?>">&#10008;</span>
            <?php endif ?>
        </span>
        <span class="data-wrap mt-0">
            <li class="app-info-title"><?= t('Strict Transport Security HTTP Header') ?></li>
            <?php if (ENABLE_HSTS == true): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= t('Enabled') ?>
                </li>
                <span class="pass-tick" title="<?= t('This is the default and recommended setting') ?>">&#10004;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick">
                    <?= t('Disabled') ?>
                </li>
                <span class="fail-x" title="<?= t('This is not the recommended setting') ?>">&#10008;</span>
            <?php endif ?>
        </span>
        <span class="data-wrap mt-0">
            <li class="app-info-title"><?= t('Remember Me Authentication') ?></li>
            <?php if (REMEMBER_ME_AUTH == true): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= t('Enabled') ?>
                </li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick">
                    <?= t('Disabled') ?>
                </li>
            <?php endif ?>
        </span>
        <fieldset class="brute-force-protection">
            <legend class=""><?= t('Brute Force Protection') ?></legend>
            <p class="">
                <?= t('When the login form is used, this feature works at the user account level. After numerous failed login attempts, the application shows a CAPTCHA image to prevent automated bot attacks. After further consistent failed attempts the user account is temporarily locked. Administrators can unlock users at any time from the user interface.') ?>
            </p>
            <span class="data-wrap">
                <li class="app-info-title">
                    <?= e('Enable %s After x Failed Logins', '<abbr title="' . t('Completely Automated Public Turing test to tell Computers and Humans Apart') . '">CAPTCHA</abbr>') ?>
                </li>
                <?php if (BRUTEFORCE_CAPTCHA == '3'): ?>
                    <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                        <?= BRUTEFORCE_CAPTCHA ?>
                    </li>
                    <span class="pass-tick" title="<?= t('This is the default setting') ?>">&#10004;</span>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick"><?= BRUTEFORCE_CAPTCHA ?></li>
                <?php endif ?>
            </span>
            <span class="data-wrap">
                <li class="app-info-title"><?= t('Lock User Account After x Failed Logins') ?></li>
                <?php if (BRUTEFORCE_LOCKDOWN == '6'): ?>
                    <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                        <?= BRUTEFORCE_LOCKDOWN ?>
                    </li>
                    <span class="pass-tick" title="<?= t('This is the default setting') ?>">&#10004;</span>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick"><?= BRUTEFORCE_LOCKDOWN ?></li>
                <?php endif ?>
            </span>
            <span class="data-wrap mt-0">
                <li class="app-info-title"><?= t('Locked User Account Duration') ?></li>
                <?php if (BRUTEFORCE_LOCKDOWN_DURATION == '15'): ?>
                    <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting in minutes') ?>">
                        <?= BRUTEFORCE_LOCKDOWN_DURATION ?>
                    </li>
                    <span class="pass-tick" title="<?= t('This is the default setting in minutes') ?>">&#10004;</span>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick" title="<?= t('This value is in minutes') ?>">
                        <?= BRUTEFORCE_LOCKDOWN_DURATION ?>
                    </li>
                <?php endif ?>
            </span>
            <p class="">
                <?= e('%s, the account must be unlocked using the login form.', '<strong>' . t('After three authentication failures through the user API') . '</strong>') ?>
            </p>
        </fieldset>
    </div>
</details>
<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('LDAP Configuration') ?>
    </summary>
    <div class="accordion-content">
        <?= $this->render('KanboardSupport:config_sections/ldap-config') ?>
    </div>
</details>
<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('Group Memberships') ?>
    </summary>
    <div class="accordion-content">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Show Group Memberships in User List') ?></li>
            <?php if (SHOW_GROUP_MEMBERSHIPS_IN_USERLIST == false): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('Group memberships will not be shown') ?>">
                    <?= t('False') ?>
                </li>
                <span class="fail-x" title="<?= t('Group memberships will not be shown') ?>">&#10008;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= t('True') ?>
                </li>
                <span class="pass-tick" title="<?= t('This is the default setting') ?>">&#10004;</span>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Limit Group Memberships in User List') ?></li>
            <?php if (SHOW_GROUP_MEMBERSHIPS_IN_USERLIST_WITH_LIMIT == '7'): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting. Set to \'0\' for all group memberships.') ?>">7</li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('The default setting is 7. Set to \'0\' for all group memberships.') ?>">
                    <?= SHOW_GROUP_MEMBERSHIPS_IN_USERLIST_WITH_LIMIT ?>
                </li>
            <?php endif ?>
        </span>
    </div>
</details>
<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('Proxy Settings') ?>
    </summary>
    <div class="accordion-content">
        <fieldset class="http-client-proxy">
            <legend class=""><?= t('HTTP Client Proxy') ?></legend>
            <span class="data-wrap">
                <li class="app-info-title"><?= t('Proxy Hostname') ?></li>
                <?php if (HTTP_PROXY_HOSTNAME == ''): ?>
                    <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                        <?= t('Not Set') ?>
                    </li>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick">
                        <?= HTTP_PROXY_HOSTNAME ?>
                    </li>
                <?php endif ?>
            </span>
            <span class="data-wrap">
                <li class="app-info-title"><?= t('Proxy Port') ?></li>
                <?php if (HTTP_PROXY_PORT == '3128'): ?>
                    <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                        <?= HTTP_PROXY_PORT ?>
                    </li>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick">
                        <?= HTTP_PROXY_PORT ?>
                    </li>
                <?php endif ?>
            </span>
            <span class="data-wrap">
                <li class="app-info-title"><?= t('Proxy Username') ?></li>
                <?php if (HTTP_PROXY_USERNAME == ''): ?>
                    <li class="app-info-value border-bottom-thick privacy not-set" title="<?= t('This is the default setting') ?>">
                        <?= t('Not Set') ?>
                    </li>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick privacy">
                        <?= HTTP_PROXY_USERNAME ?>
                    </li>
                <?php endif ?>
            </span>
            <span class="data-wrap mt-0">
                <li class="app-info-title"><?= t('Proxy Password') ?></li>
                <?php if (HTTP_PROXY_PASSWORD == ''): ?>
                    <li class="app-info-value border-bottom-thick privacy not-set" title="<?= t('This is the default setting') ?>">
                        <?= t('Not Set') ?>
                    </li>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick privacy">
                        <?= HTTP_PROXY_PASSWORD ?>
                    </li>
                <?php endif ?>
            </span>
            <span class="data-wrap mt-0">
                <li class="app-info-title"><?= t('Proxy Exclude') ?></li>
                <?php if (HTTP_PROXY_EXCLUDE == 'localhost'): ?>
                    <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                        <?= HTTP_PROXY_EXCLUDE ?>
                    </li>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick">
                        <?= HTTP_PROXY_EXCLUDE ?>
                    </li>
                <?php endif ?>
            </span>
        </fieldset>
        <fieldset class="reverse-proxy">
            <legend class=""><?= t('Reverse Proxy') ?></legend>
            <span class="data-wrap">
                <li class="app-info-title"><?= t('Reverse Proxy Authentication') ?></li>
                <?php if (REVERSE_PROXY_AUTH == 'false'): ?>
                    <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                        <?= t('Disabled') ?>
                    </li>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick">
                        <?= t('Enabled') ?>
                    </li>
                <?php endif ?>
            </span>
            <span class="data-wrap">
                <li class="app-info-title"><?= t('Username Header Name') ?></li>
                <?php if (REVERSE_PROXY_USER_HEADER == 'REMOTE_USER'): ?>
                    <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                        <?= REVERSE_PROXY_USER_HEADER ?>
                    </li>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick">
                        <?= REVERSE_PROXY_USER_HEADER ?>
                    </li>
                <?php endif ?>
            </span>
            <span class="data-wrap">
                <li class="app-info-title"><?= t('Admin Username') ?></li>
                <?php if (REVERSE_PROXY_DEFAULT_ADMIN == ''): ?>
                    <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                        <?= t('Not Set') ?>
                    </li>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick">
                        <?= REVERSE_PROXY_DEFAULT_ADMIN ?>
                    </li>
                <?php endif ?>
            </span>
            <span class="data-wrap mt-0">
                <li class="app-info-title"><?= t('User Email Header Name') ?></li>
                <?php if (REVERSE_PROXY_EMAIL_HEADER == 'REMOTE_EMAIL'): ?>
                    <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                        <?= REVERSE_PROXY_EMAIL_HEADER ?>
                    </li>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick">
                        <?= REVERSE_PROXY_EMAIL_HEADER ?>
                    </li>
                <?php endif ?>
            </span>
            <span class="data-wrap mt-0">
                <li class="app-info-title"><?= t('User Full Name Header Name') ?></li>
                <?php if (APP_VERSION >= '1.2.27'): ?>
                    <?php if (REVERSE_PROXY_FULLNAME_HEADER == 'REMOTE_FULLNAME'): ?>
                        <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                            <?= REVERSE_PROXY_FULLNAME_HEADER ?>
                        </li>
                    <?php else: ?>
                        <li class="app-info-value border-bottom-thick">
                            <?= REVERSE_PROXY_FULLNAME_HEADER ?>
                        </li>
                    <?php endif ?>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick not-available" title="<?= e('This setting is available from %s', 'v1.2.27') ?>">
                        <?= t('Not available in this application version') ?>
                    </li>
                    <span class="fail-x" title="<?= e('This setting is available from %s', 'v1.2.27') ?>">&#10008;</span>
                <?php endif ?>
            </span>
            <span class="data-wrap mt-0">
                <li class="app-info-title"><?= t('Default Domain') ?></li>
                <?php if (REVERSE_PROXY_DEFAULT_DOMAIN == ''): ?>
                    <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                        <?= t('Not Set') ?>
                    </li>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick">
                        <?= REVERSE_PROXY_DEFAULT_DOMAIN ?>
                    </li>
                <?php endif ?>
            </span>
        </fieldset>
    </div>
</details>
