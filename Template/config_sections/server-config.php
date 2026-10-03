<h2 class="">
    <i class="fa fa-server"></i> <?= t('Server Configuration') ?>
</h2>
<div class="server-info">
    <div class="server-col">
        <ul class="server-list">
            <span class="data-wrap">
                <li class="server-config server-config-title"><?= t('Operating System') ?></li>
                <li class="server-value server-config-value border-bottom-thick">
                    <?= @php_uname('s') . ' ' . @php_uname('r') . ' ' . @php_uname('m') ?>
                </li>
            </span>
            <span class="data-wrap">
                <li class="server-config server-config-title">HTTP Client</li>
                <li class="server-value server-config-value border-bottom-thick">
                    <?php if (Kanboard\Core\Http\Client::backend() == 'cURL'): ?>
                        <abbr title="<?= t('Client for URL') ?>"><?= Kanboard\Core\Http\Client::backend() ?></abbr>
                    <?php else: ?>
                        <?= Kanboard\Core\Http\Client::backend() ?>
                    <?php endif ?>
                </li>
            </span>
            <span class="data-wrap">
                <li class="server-config server-config-title" title="<?= t('Website Address') ?>"><?= t('Domain') ?></li>
                <li class="server-value server-config-value border-bottom-thick value-url privacy"><?= $_SERVER['SERVER_NAME'] ?></li>
            </span>
            <span class="data-wrap">
                <li class="server-config server-config-title"><?= t('Server IP Address') ?></li>
                <?php if ($this->user->isAdmin()): ?>
                    <li class="server-value server-config-value border-bottom-thick value-ip privacy">
                        <?= $_SERVER['SERVER_ADDR'] ?>
                    </li>
                <?php else: ?>
                    <li class="server-value server-config-value border-bottom-thick value-ip">
                        <?= $this->helper->supportHelper->maskIPAddress($_SERVER['SERVER_ADDR']) ?>
                    </li>
                <?php endif ?>
                <?php if ($this->user->isAdmin()): ?>
                    <a id="valueBTN" href="https://www.whois.com/whois/<?= $_SERVER['SERVER_ADDR'] ?>" class="value-btn privacy-delete" target="_blank" rel="noopener noreferrer" title="<?= t('Opens in a new window') ?> &#8663;">
                        <i class="fa fa-external-link"></i> <?= t('Lookup IP') ?>
                    </a>
                <?php endif ?>
            </span>
            <span class="data-wrap">
                <li class="server-config server-config-title"><?= t('Server Port') ?></li>
                <?php if ($_SERVER['SERVER_PORT'] == '443'): ?>
                    <li class="server-value server-config-value border-bottom-thick value-ip" title="<?= t('SSL Secure Port') ?>">
                        <i class="fa fa-lock pp-green"></i> <?= $_SERVER['SERVER_PORT'] ?> https
                    </li>
                    <span class="pass-tick" title="<?= t('This is the default and recommended setting') ?>">&#10004;</span>
                <?php else: ?>
                    <li class="server-value server-config-value border-bottom-thick value-ip" title="<?= t('Unsecure Port') ?>">
                        <i class="fa fa-unlock pp-red" title="<?= t('Unsecure http') ?>"></i> <?= $_SERVER['SERVER_PORT'] ?>
                    </li>
                    <span class="fail-x" title="<?= t('The site is not encrypted before being transmitted over the Internet. This port should be secured.') ?>">&#10008;</span>
                <?php endif ?>
            </span>
            <span class="data-wrap">
                <li class="server-config server-config-title"><?= t('System Temporary Directory') ?></li>
                <li class="server-value server-config-value border-bottom-thick value-path"><?= sys_get_temp_dir() ?></li>
            </span>
            <span class="data-wrap">
                <li class="server-config server-config-title"><?= t('Document Root') ?></li>
                <?php if ($this->user->isAdmin()): ?>
                    <li class="server-value server-config-value border-bottom-thick value-path privacy">
                        <?= $_SERVER['DOCUMENT_ROOT'] ?>
                    </li>
                <?php else: ?>
                    <li class="server-value server-config-value border-bottom-thick value-path">
                        <?= $this->helper->supportHelper->maskPath($_SERVER['DOCUMENT_ROOT']) ?>
                    </li>
                <?php endif ?>
                <?php if (is_writable($_SERVER['DOCUMENT_ROOT'])): ?>
                    <span class="fail-x" title="<?= e('%s. %s', t('This directory is writeable by the web server user'), t('This is not the recommended setting')) ?>">&#10008;</span>
                <?php else: ?>
                    <span class="pass-tick" title="<?= e('%s. %s', t('This directory is not writeable by the web server user'), t('This is the default and recommended setting')) ?>">&#10004;</span>
                <?php endif ?>
                <?php if ($this->user->isAdmin()): ?>
                    <div id="pCheck" class="p-check">
                        <?php if (!is_writable($_SERVER['DOCUMENT_ROOT'])): ?>
                            <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissions($_SERVER['DOCUMENT_ROOT']) ?>
                            </span>
                            <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissionsLinux($_SERVER['DOCUMENT_ROOT']) ?>
                            </span>
                            <span class="p-owner" title="<?= t('Directory Owner') ?>">
                                <?= $this->helper->supportHelper->getPermissionsOwner($_SERVER['DOCUMENT_ROOT']) ?>
                            </span>
                        <?php else: ?>
                            <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissions($_SERVER['DOCUMENT_ROOT']) ?>
                            </span>
                            <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissionsLinux($_SERVER['DOCUMENT_ROOT']) ?>
                            </span>
                            <span class="p-owner" title="<?= t('Directory Owner') ?>">
                                <?= $this->helper->supportHelper->getPermissionsOwner($_SERVER['DOCUMENT_ROOT']) ?>
                            </span>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </span>
            <span class="data-wrap">
                <li class="server-config server-config-title"><?= t('Session Save Path') ?></li>
                <li class="server-value server-config-value border-bottom-thick value-path"><?= session_save_path() ?></li>
                <?php if (!is_writable(session_save_path())): ?>
                    <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
                <?php else: ?>
                    <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
                <?php endif ?>
                <?php if ($this->user->isAdmin()): ?>
                    <div id="pCheck" class="p-check">
                        <?php if (!is_writable(session_save_path())): ?>
                            <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissions(session_save_path()) ?>
                            </span>
                            <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissionsLinux(session_save_path()) ?>
                            </span>
                            <span class="p-owner" title="<?= t('Directory Owner') ?>">
                                <?= $this->helper->supportHelper->getPermissionsOwner(session_save_path()) ?>
                            </span>
                        <?php else: ?>
                            <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissions(session_save_path()) ?>
                            </span>
                            <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissionsLinux(session_save_path()) ?>
                            </span>
                            <span class="p-owner" title="<?= t('Directory Owner') ?>">
                                <?= $this->helper->supportHelper->getPermissionsOwner(session_save_path()) ?>
                            </span>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </span>
            <span class="data-wrap">
                <li class="server-config server-config-title"><?= t('Absolute Path') ?></li>
                <?php if ($this->user->isAdmin()): ?>
                    <li class="server-value server-config-value border-bottom-thick value-path privacy">
                        <?= $_SERVER['SCRIPT_FILENAME'] ?>
                    </li>
                <?php else: ?>
                    <li class="server-value server-config-value border-bottom-thick value-path">
                        <?= $this->helper->supportHelper->maskPath($_SERVER['SCRIPT_FILENAME']) ?>
                    </li>
                <?php endif ?>
            </span>
            <span class="data-wrap">
                <li class="server-config server-config-title" title="<?= t('Common Gateway Interface') ?>">CGI <?= t('Version') ?></li>
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
    <!-- APACHE CONFIGURATION -->
    <?php if (strpos($_SERVER['SERVER_SOFTWARE'], 'Apache') !== false): ?>
        <?= $this->render('KanboardSupport:config_sections/apache-settings') ?>
    <?php endif ?>
    <?php if (file_exists(ROOT_DIR . DIRECTORY_SEPARATOR . '.htaccess') && ($this->user->isAdmin())): ?>
        <?= $this->render('KanboardSupport:config_sections/htaccess') ?>
    <?php endif ?>
</div>
