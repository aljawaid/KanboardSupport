<?php
    $user = $this->user->getid();
    $user2 = $this->user->getFullname();
?>
    <div class="page-header" style="margin-top: 10px;">
        <h2><?= t('Technical Support') ?></h2>
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
                        <td class="cell-title no-border-left text-right" width="100px"><?= t('Your Role') ?></td>
                        <td class="cell-value no-border-left text-center" width="150px"><?= $this->user->getRoleName($user['role']) ?></td>
                    </tr>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Your User ID') ?></td>
                        <td class="cell-value value"><?= $this->user->getid() ?></td>
                        <td class="cell-title no-border-left text-right" width="100px"><?= t('Status') ?></td>
                        <td class="cell-value text-center" width="150px"><?= $user2['is_active'] ? t('Active') : t('Inactive') ?></td>
                    </tr>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Your IP Address') ?></td>
                        <td class="cell-value value-ip" colspan="3"><?= $_SERVER['REMOTE_ADDR'] ?></td>
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
                <li class="app-info-title"><?= t('Application Name') ?></li>
                <li class="app-info-value border-bottom-thick"><?= t('Kanboard') ?></li>
                <li class="empty-col"></li>
                <li class="app-info-title"><?= t('Version') ?></li>
                <li class="app-info-value value-version border-bottom-thick"><?= APP_VERSION ?></li>
                <li class="empty-col"></li>
                <?php if ($this->user->isAdmin()): ?>
                <li class="app-info-title"><?= t('Updates') ?></li>
                <li class="app-info-value border-bottom-thick">
                    <a href="https://github.com/kanboard/kanboard/releases" target="_blank" rel="noopener noreferrer" title="<?= t('Opens in a new window') ?>">
                        <i class="fa fa-external-link"></i> <?= t('Check for updates') ?>
                    </a>
                </li>
                <?php endif ?>
                <br>
                <li class="app-info-title"><?= t('Data Directory') ?></li>
                <li class="app-info-value value-path border-bottom-thick"><?= DATA_DIR ?></li>
                <li class="empty-col"></li>
                <li class="app-info-title"><?= t('Files Directory') ?></li>
                <li class="app-info-value value-path border-bottom-thick"><?= FILES_DIR ?></li>
                <li class="empty-col"></li>
                <br>
                <li class="app-info-title"><?= t('Cache Directory') ?></li>
                <li class="app-info-value value-path border-bottom-thick"><?= CACHE_DIR ?></li>
                <li class="empty-col"></li>
                <li class="app-info-title"><?= t('Plugins Directory') ?></li>
                <li class="app-info-value value-path border-bottom-thick"><?= PLUGINS_DIR ?></li>
                <br>
                <li class="app-info-title"><?= t('Log File') ?></li>
                <li class="app-info-value value-path border-bottom-thick"><?= LOG_FILE ?></li>
                <li class="empty-col"></li>
                <li class="app-info-title"><?= t('Session Handler') ?></li>
                <li class="app-info-value border-bottom-thick">
                    <?php if (SESSION_HANDLER == 'php'): ?>
                        <span><?= t('PHP') ?></span>
                    <?php else: ?>
                        <span><?= t('Database') ?></span>
                    <?php endif ?>
                    </li>
                <li class="empty-col"></li>
                <li class="app-info-title"><?= t('Session Duration') ?></li>
                <li class="app-info-value value-version border-bottom-thick"><?= SESSION_DURATION ?> <small><i><?= t('Until browser is closed') ?></i></small></li>
            </ul>
        </div>
    </section>

<!-- PHP INFORMATION -->
    <section class="support-section">
        <h2 class=""><i class="fa fa-code"></i> <?= t('PHP Information') ?></h2>
        <div class="php-info">
            <ul class="">
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
                <li class="empty-col"></li>
                <li class="app-info-title"><?= t('PHP Config File Path') ?></li>
                <li class="app-info-value value-path border-bottom-thick"><?= PHP_CONFIG_FILE_PATH ?></li>
                <li class="empty-col"></li>
                <li class="app-info-title"><?= t('PHP Config File Scan Directory') ?></li>
                <li class="app-info-value value-path border-bottom-thick"><?= PHP_CONFIG_FILE_SCAN_DIR ?></li>
                <li class="empty-col"></li>
                <li class="app-info-title"><?= t('PHP Loaded Configuration File') ?></li>
                <li class="app-info-value value-path border-bottom-thick"><?= php_ini_loaded_file() ?></li>
                <li class="empty-col"></li>
                <li class="app-info-title">
                    <abbr title="<?= t('PHP Server API') ?>"><?= t('PHP SAPI') ?></abbr>
                </li>
                <li class="app-info-value value border-bottom-thick"><?= PHP_SAPI ?></li>
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

<?php if (DB_DRIVER === 'sqlite'): ?>
    <div class="page-header">
        <h2><?= t('Database') ?></h2>
    </div>
    <div class="panel">
        <ul>
            <li>
                <?= t('Database size:') ?>
                <strong><?= $this->text->bytes($db_size) ?></strong>
            </li>
            <li>
                <?= $this->url->link(t('Download the database'), 'ConfigController', 'downloadDb', array(), true) ?>&nbsp;
                <?= t('(Gzip compressed Sqlite file)') ?>
            </li>
            <li>
                <?= $this->url->link(t('Upload the database'), 'ConfigController', 'uploadDb', array(), false, 'js-modal-medium') ?>
            </li>
            <li>
                <?= $this->url->link(t('Optimize the database'), 'ConfigController', 'optimizeDb', array(), true) ?>&nbsp;
                <?= t('(VACUUM command)') ?>
            </li>
        </ul>
    </div>
<?php endif ?>

<div class="page-header">
    <h2><?= t('License') ?></h2>
</div>
<div class="panel">
<?= nl2br(file_get_contents(ROOT_DIR.DIRECTORY_SEPARATOR.'LICENSE')) ?>
</div>
