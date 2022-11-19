<?php
    $user = $this->user->getid();
    $user2 = $this->user->getFullname();
?>
    <div class="page-header" style="margin-top: 10px;">
        <h2><i class="fa fa-question-circle"></i> <?= t('Technical Information') ?></h2>
    </div>

<!-- USER CONFIGURATION -->
    <section class="support-section">
        <h2><i class="fa fa-user"></i> <?= t('User Configuration') ?></h2>
        <div class="table-responsive">
            <table id="UserTable" class="support-table user-table table-center">
                <thead class="">
                    <tr class="support-table-row">
                        <th class="support-table-title border-bottom-thick" colspan="4" scope="col">
                            <i class="fa fa-user i-fw"></i> <?= t('User Configuration') ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Your Profile Full Name') ?></td>
                        <td class="cell-value value-name" width=""><?= $this->user->getFullname() ?></td>
                        <td class="cell-title"><?= t('Your User ID') ?></td>
                        <td class="cell-value value"><?= $this->user->getid() ?></td>
                    </tr>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Your Role') ?></td>
                        <td class="cell-value" colspan="3"><?= $this->user->getRoleName($user['role']) ?></td>
                    </tr>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Your IP Address') ?></td>
                        <td class="cell-value value-ip" colspan="3"><?= $_SERVER['REMOTE_ADDR'] ?>
                            <?php if ($this->user->isAdmin()): ?>
                                <a id="valueBTN" href="https://www.whois.com/whois/<?= $_SERVER['REMOTE_ADDR'] ?>" class="value-btn" target="_blank" rel="noopener noreferrer" title="<?= t('Opens in a new window') ?>">
                                    <i class="fa fa-external-link"></i> <?= t('Lookup IP') ?>
                                </a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Current Page') ?></td>
                        <td class="cell-value value-url" colspan="3"><?= $_SERVER['SCRIPT_URI'] ?></td>
                    </tr>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Your Browser Name') ?></td>
                        <td class="cell-value" colspan="3"><?= $this->helper->supportHelper->getBrowser() ?></td>
                    </tr>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Your Browser') ?></td>
                        <td class="cell-value" colspan="3"><?= $this->text->e($user_agent) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

<!-- APPLICATION INFORMATION -->
    <section class="support-section">
        <h2 class=""><i class="fa fa-cog"></i> <?= t('Application Information') ?></h2>
        <div class="app-info">
            <ul class="">
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Application Name') ?></li>
                    <li class="app-info-value border-bottom-thick"><?= t('Kanboard') ?></li>
                </span>
                <li class="empty-col"></li>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Version') ?></li>
                    <li class="app-info-value value-version border-bottom-thick"><?= APP_VERSION ?></li>
                </span>
                <li class="empty-col"></li>
                <?php if ($this->user->isAdmin()): ?>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Updates') ?></li>
                    <li class="app-info-value border-bottom-thick">
                        <a href="https://github.com/kanboard/kanboard/releases" target="_blank" rel="noopener noreferrer" title="<?= t('Opens in a new window') ?>">
                            <i class="fa fa-external-link"></i> <?= t('Check for updates') ?>
                        </a>
                    </li>
                </span>
                <?php endif ?>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Debug Mode') ?></li>
                    <li class="app-info-value border-bottom-thick">
                        <?php if (!defined(DEBUG)): ?>
                            <?= t('Not Enabled') ?>
                        <?php elseif (defined(DEBUG)): ?>
                            <?= t('Enabled') ?>
                        <?php endif ?>
                    </li>
                </span>
                <br>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Data Directory') ?></li>
                    <li class="app-info-value value-path border-bottom-thick"><?= DATA_DIR ?></li>
                        <?php if (! is_writable(DATA_DIR)): ?>
                            <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
                        <?php else: ?>
                            <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
                        <?php endif ?>
                        <?php if ($this->user->isAdmin()): ?>
                        <div id="pCheck" class="p-check">
                            <?php if (! is_writable(DATA_DIR)): ?>
                                <span class="p-dir" title="<?= t('Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissions(DATA_DIR) ?></span>
                                <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissionsLinux(DATA_DIR) ?></span>
                                <span class="p-owner" title="<?= t('Directory Owner') ?>"><?= $this->helper->supportHelper->getPermissionsOwner(DATA_DIR) ?></span>
                            <?php else: ?>
                                <span class="p-dir" title="<?= t('Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissions(DATA_DIR) ?></span>
                                <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissionsLinux(DATA_DIR) ?></span>
                                <span class="p-owner" title="<?= t('Directory Owner') ?>"><?= $this->helper->supportHelper->getPermissionsOwner(DATA_DIR) ?></span>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                </span>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Files Directory') ?></li>
                    <li class="app-info-value value-path border-bottom-thick"><?= FILES_DIR ?></li>
                        <?php if (! is_writable(FILES_DIR)): ?>
                            <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
                        <?php else: ?>
                            <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
                        <?php endif ?>
                        <?php if ($this->user->isAdmin()): ?>
                        <div id="pCheck" class="p-check">
                            <?php if (! is_writable(FILES_DIR)): ?>
                                <span class="p-dir" title="<?= t('Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissions(FILES_DIR) ?></span>
                                <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissionsLinux(FILES_DIR) ?></span>
                                <span class="p-owner" title="<?= t('Directory Owner') ?>"><?= $this->helper->supportHelper->getPermissionsOwner(FILES_DIR) ?></span>
                            <?php else: ?>
                                <span class="p-dir" title="<?= t('Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissions(FILES_DIR) ?></span>
                                <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissionsLinux(FILES_DIR) ?></span>
                                <span class="p-owner" title="<?= t('Directory Owner') ?>"><?= $this->helper->supportHelper->getPermissionsOwner(FILES_DIR) ?></span>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                </span>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Cache Directory') ?></li>
                    <li class="app-info-value value-path border-bottom-thick"><?= CACHE_DIR ?></li>
                    <?php if (! is_writable(CACHE_DIR)): ?>
                            <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
                        <?php else: ?>
                            <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
                        <?php endif ?>
                        <?php if (CACHE_DRIVER == 'memory'): ?>
                            <span class="p-note"><i><?= t('Not required as Cache Driver is set to') ?></i> <code><?= t('memory') ?></code></span>
                        <?php else: ?>
                            <?php if ($this->user->isAdmin()): ?>
                            <div id="pCheck" class="p-check">
                            <?php if (! is_writable(CACHE_DIR)): ?>
                                <span class="p-dir" title="<?= t('Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissions(CACHE_DIR) ?></span>
                                <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissionsLinux(CACHE_DIR) ?></span>
                                <span class="p-owner" title="<?= t('Directory Owner') ?>"><?= $this->helper->supportHelper->getPermissionsOwner(CACHE_DIR) ?></span>
                            <?php else: ?>
                                <span class="p-dir" title="<?= t('Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissions(CACHE_DIR) ?></span>
                                <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissionsLinux(CACHE_DIR) ?></span>
                                <span class="p-owner" title="<?= t('Directory Owner') ?>"><?= $this->helper->supportHelper->getPermissionsOwner(CACHE_DIR) ?></span>
                            <?php endif ?>
                            </div>
                            <?php endif ?>
                        <?php endif ?>
                </span>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Plugins Directory') ?></li>
                    <li class="app-info-value value-path border-bottom-thick"><?= PLUGINS_DIR ?></li>
                    <?php if (! is_writable(PLUGINS_DIR)): ?>
                            <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
                        <?php else: ?>
                            <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
                        <?php endif ?>
                        <?php if ($this->user->isAdmin()): ?>
                        <div id="pCheck" class="p-check">
                            <?php if (! is_writable(PLUGINS_DIR)): ?>
                                <span class="p-dir" title="<?= t('Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissions(PLUGINS_DIR) ?></span>
                                <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissionsLinux(PLUGINS_DIR) ?></span>
                                <span class="p-owner" title="<?= t('Directory Owner') ?>"><?= $this->helper->supportHelper->getPermissionsOwner(PLUGINS_DIR) ?></span>
                            <?php else: ?>
                                <span class="p-dir" title="<?= t('Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissions(PLUGINS_DIR) ?></span>
                                <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissionsLinux(PLUGINS_DIR) ?></span>
                                <span class="p-owner" title="<?= t('Directory Owner') ?>"><?= $this->helper->supportHelper->getPermissionsOwner(PLUGINS_DIR) ?></span>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                </span>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Log File') ?></li>
                    <li class="app-info-value value-path border-bottom-thick"><?= LOG_FILE ?></li>
                </span>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Session Handler') ?></li>
                    <li class="app-info-value border-bottom-thick">
                        <?php if (SESSION_HANDLER == 'php'): ?>
                            <span><?= t('PHP') ?></span>
                        <?php else: ?>
                            <span><?= t('Database') ?></span>
                        <?php endif ?>
                    </li>
                </span>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Session Duration') ?></li>
                    <li class="app-info-value value-version border-bottom-thick"><?= SESSION_DURATION ?> <small><i><?= t('Until browser is closed') ?></i></small></li>
                </span>
            </ul>
        </div>
    </section>

<!-- DATABASE CONNECTION -->
    <section class="support-section">
        <h2 class=""><i class="fa fa-database"></i> <?= t('Database Connection') ?></h2>
        <div class="db-info">
            <ul class="">
                <span class="data-wrap">
                    <li class="db-info-title"><?= t('Database Driver') ?></li>
                    <li class="db-info-value value-path border-bottom-thick"><?= DB_DRIVER ?></li>
                </span>
                <span class="data-wrap">
                    <li class="db-info-title"><?= t('Database Version') ?></li>
                    <li class="db-info-value value-version border-bottom-thick"><?= $this->text->e($db_version) ?></li>
                </span>
                <span class="data-wrap">
                    <li class="db-info-title"><?= t('Database Username') ?></li>
                    <li class="db-info-value value-path border-bottom-thick"><?= DB_USERNAME ?></li>
                </span>
                <span class="data-wrap">
                    <li class="db-info-title"><?= t('Database Hostname') ?></li>
                    <li class="db-info-value value-path border-bottom-thick"><?= DB_HOSTNAME ?></li>
                </span>
                <span class="data-wrap">
                    <li class="db-info-title"><?= t('Database Name') ?></li>
                    <li class="db-info-value value-path border-bottom-thick"><?= DB_NAME ?></li>
                </span>
            </ul>
            <?php if (DB_DRIVER === 'sqlite'): ?>
                <div class="panel">
                    <ul>
                        <li class="">
                            <?= t('Database Size') ?>
                            <strong><?= $this->text->bytes($db_size) ?></strong>
                        </li>
                        <li class="">
                            <?= $this->url->link(t('Download Database'), 'ConfigController', 'downloadDb', array(), true, 'btn btn-sm') ?>&nbsp;
                            <?= t('(Gzip compressed SQLite file)') ?>
                        </li>
                        <li class="">
                            <?= $this->url->link(t('Upload Database'), 'ConfigController', 'uploadDb', array(), false, 'js-modal-medium btn btn-sm') ?>
                        </li>
                        <li class="">
                            <?= $this->url->link(t('Optimize Database'), 'ConfigController', 'optimizeDb', array(), true, 'btn btn-sm') ?>&nbsp;
                            <?= t('(VACUUM command)') ?>
                        </li>
                    </ul>
                </div>
            <?php endif ?>
        </div>
    </section>

<!-- EMAIL CONNECTION -->
    <section class="support-section">
        <h2 class=""><i class="fa fa-envelope"></i> <?= t('Email Connection') ?></h2>
        <div class="mail-info">
            <ul class="">
                <span class="data-wrap">
                    <li class="mail-info-title"><?= t('Mail Configuration') ?></li>
                    <li class="mail-info-value border-bottom-thick">
                        <?php if (MAIL_CONFIGURATION == '1'): ?>
                            <?= t('Enabled') ?>
                        <?php else: ?>
                            <?= t('Disabled') ?>
                        <?php endif ?>
                    </li>
                </span>
                <span class="data-wrap">
                    <li class="mail-info-title"><?= t('Sender Email') ?></li>
                    <li class="mail-info-value border-bottom-thick"><?= MAIL_FROM ?></li>
                </span>
                <?php if ($this->user->isAdmin()): ?>
                    <span class="data-wrap">
                        <li class="mail-info-title"><abbr title="Blind Carbon Copy"><?= t('BCC') ?></abbr></li>
                        <li class="mail-info-value border-bottom-thick">
                        <?php if (empty(MAIL_BCC)): ?>
                            <i><?= t('Not Set') ?></i>
                        <?php else: ?>
                            <?= MAIL_BCC ?>
                        <?php endif ?>
                        </li>
                    </span>
                <?php endif ?>
                <span class="data-wrap">
                    <li class="mail-info-title"><abbr title="<?= t('Mail Transport Agent') ?>"><?= t('Mail Transport') ?></abbr></li>
                    <li class="mail-info-value border-bottom-thick">
                    <?php if (MAIL_TRANSPORT == 'smtp'): ?>
                        <?= t('SMTP') ?>
                    <?php elseif (MAIL_TRANSPORT == 'sendmail'): ?>
                        <?= t('Sendmail') ?>
                    <?php elseif (MAIL_TRANSPORT == 'mail'): ?>
                        <?= t('PHP Mail') ?>
                    <?php elseif (MAIL_TRANSPORT == 'postmark'): ?>
                        <?= t('Postmark') ?>
                    <?php elseif (MAIL_TRANSPORT == 'Mailgun'): ?>
                        <?= t('Mailgun') ?>
                    <?php elseif (MAIL_TRANSPORT == 'sendgrid'): ?>
                        <?= t('SendGrid') ?>
                    <?php else: ?>
                        <?= t('Other') ?>
                    <?php endif ?>
                    </li>
                </span>
                <?php if (MAIL_TRANSPORT == 'smtp'): ?>
                    <span class="data-wrap">
                        <li class="mail-info-title"><?= t('Mail Server Hostname') ?></li>
                        <li class="mail-info-value value-path border-bottom-thick"><?= MAIL_SMTP_HOSTNAME ?></li>
                    </span>
                    <?php if (!empty(MAIL_SMTP_ENCRYPTION)): ?>
                        <span class="data-wrap">
                            <li class="mail-info-title"><abbr title="Simple Mail Transport Protocol"><?= t('SMTP Encryption') ?></abbr></li>
                            <li class="mail-info-value border-bottom-thick">
                            <?php if (MAIL_SMTP_ENCRYPTION == 'ssl'): ?>
                                <?= t('SSL') ?>
                            <?php elseif (MAIL_SMTP_ENCRYPTION == 'tls'): ?>
                                <?= t('TLS') ?>
                            <?php else: ?>
                                <?= t('Not Set') ?>
                            <?php endif ?>
                            </li>
                        </span>
                    <?php endif ?>
                    <span class="data-wrap">
                        <li class="mail-info-title"><abbr title="Simple Mail Transport Protocol"><?= t('SMTP Port') ?></abbr></li>
                        <li class="mail-info-value value-path border-bottom-thick"><?= MAIL_SMTP_PORT ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="mail-info-title"><abbr title="Simple Mail Transport Protocol"><?= t('SMTP Username') ?></abbr></li>
                        <li class="mail-info-value border-bottom-thick"><?= MAIL_SMTP_USERNAME ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="mail-info-title"><abbr title="Simple Mail Transport Protocol"><?= t('SMTP HELO Command Name') ?></abbr></li>
                        <li class="mail-info-value border-bottom-thick">
                        <?php if (!empty(MAIL_SMTP_HELO_NAME)): ?>
                            <?= MAIL_SMTP_HELO_NAME ?>
                        <?php else: ?>
                            <i><?= t('Not Set') ?></i>
                        <?php endif ?>
                        </li>
                    </span>
                <?php endif ?>
                <?php if (MAIL_TRANSPORT == 'sendmail'): ?>
                    <span class="data-wrap">
                    <li class="mail-info-title"><?= t('Sendmail Command') ?></li>
                    <li class="mail-info-value value-path border-bottom-thick"><?= MAIL_SENDMAIL_COMMAND ?></li>
                    </span>
                <?php endif ?>
            </ul>
        </div>
    </section>

<!-- SERVER CONFIGURATION -->
    <section class="support-section">
        <h2 class=""><i class="fa fa-server"></i> <?= t('Server Configuration') ?></h2>
        <div class="server-info">
            <div class="server-col">
                <ul class="server-list">
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Operating System') ?></li>
                        <li class="server-value server-config-value border-bottom-thick"><?= @php_uname('s').' '.@php_uname('r').' '.@php_uname('m') ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('HTTP Client') ?></li>
                        <li class="server-value server-config-value border-bottom-thick"><?= Kanboard\Core\Http\Client::backend() ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title" title="<?= t('Website Address') ?>"><?= t('Domain') ?></li>
                        <li class="server-value server-config-value border-bottom-thick value-url"><?= $_SERVER['SERVER_NAME'] ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Server IP Address') ?></li>
                        <li class="server-value server-config-value border-bottom-thick value-ip"><?= $_SERVER['SERVER_ADDR'] ?>
                        </li>
                            <?php if ($this->user->isAdmin()): ?>
                                <a id="valueBTN" href="https://www.whois.com/whois/<?= $_SERVER['SERVER_ADDR'] ?>" class="value-btn" target="_blank" rel="noopener noreferrer" title="<?= t('Opens in a new window') ?>">
                                    <i class="fa fa-external-link"></i> <?= t('Lookup IP') ?>
                                </a>
                            <?php endif ?>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Server Port') ?></li>
                        <li class="server-value server-config-value border-bottom-thick value-ip">
                            <?php if ($_SERVER['SERVER_PORT'] == '443'): ?>
                                <i class="fa fa-lock pp-green" title="<?= t('Secure') ?>"></i> <?= $_SERVER['SERVER_PORT'] ?>
                            <?php else: ?>
                                <i class="fa fa-unlock pp-red" title="<?= t('Not Secure') ?>"></i> <?= $_SERVER['SERVER_PORT'] ?>
                            <?php endif ?>
                        </li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('System Temporary Directory') ?></li>
                        <li class="server-value server-config-value border-bottom-thick value-path"><?= sys_get_temp_dir() ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Document Root') ?></li>
                        <li class="server-value server-config-value border-bottom-thick value-path"><?= $_SERVER['DOCUMENT_ROOT'] ?></li>
                        <?php if (! is_writable($_SERVER['DOCUMENT_ROOT'])): ?>
                            <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
                        <?php else: ?>
                            <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
                        <?php endif ?>
                        <?php if ($this->user->isAdmin()): ?>
                        <div id="pCheck" class="p-check">
                            <?php if (! is_writable($_SERVER['DOCUMENT_ROOT'])): ?>
                                <span class="p-dir" title="<?= t('Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissions($_SERVER['DOCUMENT_ROOT']) ?></span>
                                <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissionsLinux($_SERVER['DOCUMENT_ROOT']) ?></span>
                                <span class="p-owner" title="<?= t('Directory Owner') ?>"><?= $this->helper->supportHelper->getPermissionsOwner($_SERVER['DOCUMENT_ROOT']) ?></span>
                            <?php else: ?>
                                <span class="p-dir" title="<?= t('Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissions($_SERVER['DOCUMENT_ROOT']) ?></span>
                                <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissionsLinux($_SERVER['DOCUMENT_ROOT']) ?></span>
                                <span class="p-owner" title="<?= t('Directory Owner') ?>"><?= $this->helper->supportHelper->getPermissionsOwner($_SERVER['DOCUMENT_ROOT']) ?></span>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Session Save Path') ?></li>
                        <li class="server-value server-config-value border-bottom-thick value-path"><?= session_save_path() ?></li>
                        <?php if (! is_writable(session_save_path())): ?>
                            <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
                        <?php else: ?>
                            <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
                        <?php endif ?>
                        <?php if ($this->user->isAdmin()): ?>
                        <div id="pCheck" class="p-check">
                            <?php if (! is_writable(session_save_path())): ?>
                                <span class="p-dir" title="<?= t('Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissions(session_save_path()) ?></span>
                                <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissionsLinux(session_save_path()) ?></span>
                                <span class="p-owner" title="<?= t('Directory Owner') ?>"><?= $this->helper->supportHelper->getPermissionsOwner(session_save_path()) ?></span>
                            <?php else: ?>
                                <span class="p-dir" title="<?= t('Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissions(session_save_path()) ?></span>
                                <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>"><?= $this->helper->supportHelper->getPermissionsLinux(session_save_path()) ?></span>
                                <span class="p-owner" title="<?= t('Directory Owner') ?>"><?= $this->helper->supportHelper->getPermissionsOwner(session_save_path()) ?></span>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Absolute Path') ?></li>
                        <li class="server-value server-config-value border-bottom-thick value-path"><?= $_SERVER['SCRIPT_FILENAME'] ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title" title="<?= t('Common Gateway Interface') ?>"><?= t('CGI Version') ?></li>
                        <li class="server-value server-config-value border-bottom-thick"><?= $_SERVER['GATEWAY_INTERFACE'] ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('HTTP Web Server') ?></li>
                        <li class="server-value server-config-value border-bottom-thick"><?= $_SERVER['SERVER_SOFTWARE'] ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Pretty URLs') ?></li>
                        <li class="server-value server-config-value border-bottom-thick">
                            <?php if ($this->user->isAdmin() && ($_SERVER['HTTP_MOD_REWRITE'] == 'On')): ?>
                                <?= t('On') ?> <span class="pass-tick-alt">&#10004;</span><code>HTTP_MOD_REWRITE</code>
                            <?php else: ?>
                                <?= t('Off') ?> <span class="fail-x-alt">&#10008;</span>
                            <?php endif ?>
                        </li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Server Protocol') ?></li>
                        <li class="server-value server-config-value border-bottom-thick"><?= $_SERVER['SERVER_PROTOCOL'] ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Secure HTTP Protocol') ?></li>
                        <li class="server-value server-config-value border-bottom-thick">
                            <?php if ($_SERVER['HTTPS'] == 'on'): ?>
                                <?= t('Yes') ?> <span class="pass-tick-alt">&#10004;</span>
                            <?php else: ?>
                                <?= t('No') ?> <span class="pass-fail-x-alt">&#10004;</span>
                            <?php endif ?>
                        </li>
                    </span>
                </ul>
            </div>
        </div>
    </section>

<!-- PHP INFORMATION -->
    <section class="support-section">
        <h2 class=""><i class="fa fa-code"></i> <?= t('PHP Information') ?></h2>
        <div class="php-info">
            <ul class="">
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Version') ?></li>
                    <li class="app-info-value value-version border-bottom-thick">
                        <strong><abbr title="Major Version"><?= PHP_MAJOR_VERSION ?></abbr></strong>.<abbr title="Minor Version"><?= PHP_MINOR_VERSION ?></abbr>.<abbr title="Release Version"><?= PHP_RELEASE_VERSION ?></abbr>
                    </li>
                    <?php if (version_compare(PHP_VERSION, '7.2.0', '<')): ?>
                        <span class="fail">
                            <span class="fail-x">&#10008;</span> <?= t('Less than minimum requirement') ?>
                        </span>
                    <?php else: ?>
                        <span class="pass">
                            <span class="pass-tick">&#10004;</span> <?= t('Pass') ?>
                        </span>
                    <?php endif ?>
                </span>
                <li class="empty-col"></li>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('PHP Config File Path') ?></li>
                    <li class="app-info-value value-path border-bottom-thick"><?= PHP_CONFIG_FILE_PATH ?></li>
                </span>
                <li class="empty-col"></li>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('PHP Config File Scan Directory') ?></li>
                    <li class="app-info-value value-path border-bottom-thick"><?= PHP_CONFIG_FILE_SCAN_DIR ?></li>
                </span>
                <li class="empty-col"></li>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('PHP Loaded Configuration File') ?></li>
                    <li class="app-info-value value-path border-bottom-thick"><?= php_ini_loaded_file() ?></li>
                </span>
                <li class="empty-col"></li>
                <span class="data-wrap">
                    <li class="app-info-title">
                        <abbr title="<?= t('PHP Server API') ?>"><?= t('PHP SAPI') ?></abbr>
                    </li>
                    <li class="app-info-value value border-bottom-thick"><?= PHP_SAPI ?></li>
                </span>
            </ul>
        </div>
        <!-- gd -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>gd</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('gd')): ?>
                <span class="value-version"><?= phpversion('gd') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <?php if (!extension_loaded('gd')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('gd')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- mbstring -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>mbstring</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('mbstring')): ?>
                <span class="value-version"><?= phpversion('mbstring') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <?php if (!extension_loaded('mbstring')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('mbstring')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- hash -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>hash</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('hash')): ?>
                <span class="value-version"><?= phpversion('hash') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <?php if (!extension_loaded('hash')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('hash')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- openssl -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>openssl</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('openssl')): ?>
                <span class="value-version"><?= phpversion('openssl') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <?php if (!extension_loaded('openssl')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('openssl')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- json -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>json</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('json')): ?>
                <span class="value-version"><?= phpversion('json') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <?php if (!extension_loaded('json')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('json')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- ctype -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>ctype</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('ctype')): ?>
                <span class="value-version"><?= phpversion('ctype') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <?php if (!extension_loaded('ctype')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('ctype')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- filter -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>filter</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('filter')): ?>
                <span class="value-version"><?= phpversion('filter') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <?php if (!extension_loaded('filter')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('filter')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- session -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>session</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('session')): ?>
                <span class="value-version"><?= phpversion('session') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <?php if (!extension_loaded('session')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('session')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- dom -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>dom</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('dom')): ?>
                <span class="value-version"><?= phpversion('dom') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <?php if (!extension_loaded('dom')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('dom')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- SimpleXML -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>SimpleXML</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('SimpleXML')): ?>
                <span class="value-version"><?= phpversion('SimpleXML') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <?php if (!extension_loaded('SimpleXML')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('SimpleXML')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- xml -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>xml</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('xml')): ?>
                <span class="value-version"><?= phpversion('xml') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <?php if (!extension_loaded('xml')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('xml')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- zip -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>zip</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('zip')): ?>
                <span class="value-version"><?= phpversion('zip') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <div class="tile-optional" title=""><?= t('Optional') ?></div>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('zip')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- ldap -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>ldap</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('ldap')): ?>
                <span class="value-version"><?= phpversion('ldap') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <div class="tile-optional" title=""><?= t('Optional') ?></div>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('ldap')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- curl -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <code>curl</code>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (extension_loaded('curl')): ?>
                <span class="value-version"><?= phpversion('curl') ?></span>
            <?php else: ?>
                <span class="value-version"><?= t('Not Detected') ?></span>
            <?php endif ?>
            </div>
            <div class="tile-optional" title=""><?= t('Optional') ?></div>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (extension_loaded('curl')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
            <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                </span>
            <?php endif ?>
        </div>
        <!-- PDO Extension -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <?php if (DB_DRIVER === 'mysql'): ?>
                    <code>pdo_mysql</code>
                <?php endif ?>
                <?php if (DB_DRIVER === 'postgres'): ?>
                    <code>pdo_pgsql</code>
                <?php endif ?>
                <?php if (DB_DRIVER === 'sqlite'): ?>
                    <code>pdo_sqlite</code>
                <?php endif ?>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
            <?php if (DB_DRIVER === 'mysql' && !extension_loaded('pdo_mysql')): ?>
                <small><?= t('Missing PDO Extension') ?></small>
            <?php else: ?>
                <?= phpversion('pdo_mysql') ?>
            <?php endif ?>
            <?php if (DB_DRIVER === 'postgres' && !extension_loaded('pdo_pgsql')): ?>
                <small><?= t('Missing PDO Extension') ?></small>
            <?php else: ?>
                <?= phpversion('pdo_pgsql') ?>
            <?php endif ?>
            <?php if (DB_DRIVER === 'sqlite' && !extension_loaded('pdo_sqlite')): ?>
                <small><?= t('Missing PDO Extension') ?></small>
            <?php else: ?>
                <?= phpversion('pdo_sqlite') ?>
            <?php endif ?>
            </div>
            <?php if (DB_DRIVER === 'mysql'): ?>
                <div class="tile-detected" title=""><?= t('MySQL Detected') ?></div>
            <?php endif ?>
            <?php if (DB_DRIVER === 'postgres'): ?>
                <div class="tile-detected" title=""><?= t('PostgreSQL Detected') ?></div>
            <?php endif ?>
            <?php if (DB_DRIVER === 'sqlite'): ?>
                <div class="tile-detected" title=""><?= t('SQLite Detected') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
                <span class="tile-check">
            <?php if (DB_DRIVER === 'mysql' && !extension_loaded('pdo_mysql')): ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
            <?php elseif (DB_DRIVER === 'postgres' && !extension_loaded('pdo_pgsql')): ?>
                <span class="tile-check">
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
            <?php elseif (DB_DRIVER === 'sqlite' && !extension_loaded('pdo_sqlite')): ?>
                <span class="tile-check">
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
            <?php else: ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                </span>
            <?php endif ?>
        </div>
    </section>
