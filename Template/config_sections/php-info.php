<h2 class="">
    <i class="fa fa-code"></i> <?= t('PHP Information') ?>
</h2>
<div class="php-info">
    <ul class="">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Version') ?></li>
            <li class="app-info-value value-version border-bottom-thick">
                <strong><abbr title="<?= t('Major Version') ?>"><?= PHP_MAJOR_VERSION ?></abbr></strong>.<abbr title="<?= t('Minor Version') ?>"><?= PHP_MINOR_VERSION ?></abbr>.<abbr title="<?= t('Release Version') ?>"><?= PHP_RELEASE_VERSION ?></abbr>
            </li>
            <?php if (version_compare(PHP_VERSION, '7.2.0', '<')): ?>
                <span class="fail">
                    <span class="fail-x">&#10008;</span> <?= t('Less than minimum requirement') ?>
                </span>
            <?php else: ?>
                <span class="pass"><span class="pass-tick">&#10004;</span> <?= t('Pass') ?></span>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><abbr title="PHP Server API">PHP SAPI</abbr></li>
            <li class="app-info-value value border-bottom-thick"><?= PHP_SAPI ?></li>
        </span>
        <span class="data-wrap">
            <li class="app-info-title">PHP <?= t('Config File Path') ?></li>
            <li class="app-info-value value-path border-bottom-thick"><?= PHP_CONFIG_FILE_PATH ?></li>
        </span>
        <span class="data-wrap">
            <li class="app-info-title">PHP <?= t('Config File Scan Directory') ?></li>
            <li class="app-info-value value-path border-bottom-thick"><?= PHP_CONFIG_FILE_SCAN_DIR ?></li>
        </span>
        <span class="data-wrap">
            <li class="app-info-title">PHP <?= t('Loaded Configuration File') ?></li>
            <li class="app-info-value value-path border-bottom-thick"><?= php_ini_loaded_file() ?></li>
        </span>
    </ul>
</div>
<!-- gd -->
<div class="tile-wrapper">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">gd</code></div>
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
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('gd')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<!-- mbstring -->
<div class="tile-wrapper">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">mbstring</code></div>
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
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('mbstring')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<!-- hash -->
<div class="tile-wrapper">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">hash</code></div>
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
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('hash')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<!-- openssl -->
<div class="tile-wrapper">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">openssl</code></div>
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
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('openssl')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<!-- json -->
<div class="tile-wrapper">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">json</code></div>
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
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('json')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<!-- ctype -->
<div class="tile-wrapper">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">ctype</code></div>
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
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('ctype')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<!-- filter -->
<div class="tile-wrapper">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">filter</code></div>
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
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('filter')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<!-- session -->
<div class="tile-wrapper">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">session</code></div>
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
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('session')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<!-- dom -->
<div class="tile-wrapper">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">dom</code></div>
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
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('dom')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<!-- SimpleXML -->
<div class="tile-wrapper">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">SimpleXML</code></div>
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
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('SimpleXML')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<!-- xml -->
<div class="tile-wrapper">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">xml</code></div>
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
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('xml')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<!-- PDO Extension -->
<div class="tile-wrapper">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
        <?php if (DB_DRIVER === 'mysql'): ?>
            <code class="ext-name">pdo_mysql</code>
        <?php elseif (DB_DRIVER === 'postgres'): ?>
            <code class="ext-name">pdo_pgsql</code>
        <?php elseif (DB_DRIVER === 'sqlite'): ?>
            <code class="ext-name">pdo_sqlite</code>
        <?php else: ?>
            <code class="ext-name"><?= t('Not Detected') ?></code>
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
        <div class="tile-detected" title=""><?= t('MySQL') ?></div>
    <?php endif ?>
    <?php if (DB_DRIVER === 'postgres'): ?>
        <div class="tile-detected" title=""><?= t('PostgreSQL') ?></div>
    <?php endif ?>
    <?php if (DB_DRIVER === 'sqlite'): ?>
        <div class="tile-detected" title=""><?= t('SQLite') ?></div>
    <?php endif ?>
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (DB_DRIVER === 'mysql' && !extension_loaded('pdo_mysql')): ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php elseif (DB_DRIVER === 'postgres' && !extension_loaded('pdo_pgsql')): ?>
            <span class="tile-check">
                <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
            </span>
        <?php elseif (DB_DRIVER === 'sqlite' && !extension_loaded('pdo_sqlite')): ?>
            <span class="tile-check">
                <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
            </span>
        <?php else: ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php endif ?>
    </span>
</div>
<!-- zip -->
<div class="tile-wrapper tile-optional-hover">
    <?php if (!extension_loaded('zip')): ?>
        <div class="tile-hover-plugin">
            <div class="tile-hover-plugin-text-wrapper">
                <div class="tile-hover-plugin-text"><?= t('Required for downloading config files') ?></div>
            </div>
        </div>
    <?php endif ?>
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">zip</code></div>
    <div class="tile-version value-version" title="<?= t('Version') ?>">
        <?php if (extension_loaded('zip')): ?>
            <span class="value-version"><?= phpversion('zip') ?></span>
        <?php else: ?>
            <span class="value-version"><?= t('Not Detected') ?></span>
        <?php endif ?>
    </div>
    <?php if (extension_loaded('zip')): ?>
        <div class="tile-optional static" title=""><?= t('Optional') ?></div>
    <?php endif ?>
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('zip')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Optional Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<!-- ldap -->
<div class="tile-wrapper tile-optional-hover">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">ldap</code></div>
    <div class="tile-version value-version" title="<?= t('Version') ?>">
        <?php if (extension_loaded('ldap')): ?>
            <span class="value-version"><?= phpversion('ldap') ?></span>
        <?php else: ?>
            <span class="value-version"><?= t('Not Detected') ?></span>
        <?php endif ?>
    </div>
    <div class="tile-optional static" title=""><?= t('Optional') ?></div>
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('ldap')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Optional Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<!-- curl -->
<div class="tile-wrapper tile-optional-hover">
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">curl</code></div>
    <div class="tile-version value-version" title="<?= t('Version') ?>">
        <?php if (extension_loaded('curl')): ?>
            <span class="value-version"><?= phpversion('curl') ?></span>
        <?php else: ?>
            <span class="value-version"><?= t('Not Detected') ?></span>
        <?php endif ?>
    </div>
    <div class="tile-optional static" title=""><?= t('Optional') ?></div>
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('curl')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php else: ?>
            <span class="tile-fail-x" title="<?= t('Optional Extension') ?>">&#10008;</span>
        <?php endif ?>
    </span>
</div>
<?php // Plugin-dependent extensions only fail when Mailmagik is installed. ?>
<?php $mailmagikInstalled = file_exists(PLUGINS_DIR . DIRECTORY_SEPARATOR . 'Mailmagik') ?>
<!-- imap -->
<div class="tile-wrapper tile-optional-hover">
    <div class="tile-hover-plugin">
        <div class="tile-hover-plugin-text-wrapper">
            <div class="tile-hover-plugin-text"><?= t('Required for the Mailmagik plugin') ?></div>
        </div>
    </div>
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">imap</code></div>
    <div class="tile-version value-version" title="<?= t('Version') ?>">
        <?php if (extension_loaded('imap')): ?>
            <span class="value-version"><?= phpversion('imap') ?></span>
        <?php else: ?>
            <span class="value-version"><?= t('Not Detected') ?></span>
        <?php endif ?>
    </div>
    <?php if (!$mailmagikInstalled): ?>
        <div class="tile-optional" title=""><?= t('Optional') ?></div>
    <?php endif ?>
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('imap')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php elseif ($mailmagikInstalled): ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php else: ?>
            <span class="tile-pass" title="<?= t('Not required') ?>">&#10004;</span>
        <?php endif ?>
    </span>
</div>
<!-- fileinfo -->
<div class="tile-wrapper tile-optional-hover">
    <div class="tile-hover-plugin">
        <div class="tile-hover-plugin-text-wrapper">
            <div class="tile-hover-plugin-text"><?= t('Required for the Mailmagik plugin') ?></div>
        </div>
    </div>
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">fileinfo</code></div>
    <div class="tile-version value-version" title="<?= t('Version') ?>">
        <?php if (extension_loaded('fileinfo')): ?>
            <span class="value-version"><?= phpversion('fileinfo') ?></span>
        <?php else: ?>
            <span class="value-version"><?= t('Not Detected') ?></span>
        <?php endif ?>
    </div>
    <?php if (!$mailmagikInstalled): ?>
        <div class="tile-optional" title=""><?= t('Optional') ?></div>
    <?php endif ?>
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('fileinfo')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php elseif ($mailmagikInstalled): ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php else: ?>
            <span class="tile-pass" title="<?= t('Not required') ?>">&#10004;</span>
        <?php endif ?>
    </span>
</div>
<!-- iconv -->
<div class="tile-wrapper tile-optional-hover">
    <div class="tile-hover-plugin">
        <div class="tile-hover-plugin-text-wrapper">
            <div class="tile-hover-plugin-text"><?= t('Required for the Mailmagik plugin') ?></div>
        </div>
    </div>
    <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code class="ext-name">iconv</code></div>
    <div class="tile-version value-version" title="<?= t('Version') ?>">
        <?php if (extension_loaded('iconv')): ?>
            <span class="value-version"><?= phpversion('iconv') ?></span>
        <?php else: ?>
            <span class="value-version"><?= t('Not Detected') ?></span>
        <?php endif ?>
    </div>
    <?php if (!$mailmagikInstalled): ?>
        <div class="tile-optional" title=""><?= t('Optional') ?></div>
    <?php endif ?>
    <div class="tile-icon" title="<?= t('PHP Extension') ?>"><?= $this->helper->supportHelper->embedSVGIcon('php-logo-icon') ?></div>
    <span class="tile-check">
        <?php if (extension_loaded('iconv')): ?>
            <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
        <?php elseif ($mailmagikInstalled): ?>
            <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
        <?php else: ?>
            <span class="tile-pass" title="<?= t('Not required') ?>">&#10004;</span>
        <?php endif ?>
    </span>
</div>
