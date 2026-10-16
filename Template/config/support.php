<!-- Privacy control behaviour is covered by tests/PresentationCompatibilityTest.php. -->
<div class="config-page">
    <div class="page-header" style="margin-top: 10px;">
        <h2 class="">
            <?= $this->helper->supportHelper->embedSVGIcon('ks-icon') ?> <?= t('Application Configuration') ?>
        </h2>
    </div>
    <p class="">
        <?= e('This page shows all default and custom values from the configuration file stored in %s combined with application-specific settings detected from your server. %s', '<code class="field-code">/config.php</code>', '<i>' . t('Passwords are not included.') . '</i>') ?>
    </p>
    <!-- PRIVACY WARNING -->
    <section class="message error privacy-warning">
        <header></header>
        <i class=""></i>
        <h3 class="">
            <span class="message-title"><?= t('Data Privacy') ?></span>
            <span class="message-text">
                <?= t('This page shows sensitive data. Always hide selective information before sharing.') ?>
            </span>
        </h3>
    </section>
    <button type="button" class="data-btn" title="<?= t('Screenshot friendly') ?>" aria-pressed="false" data-hide-label="<?= $this->text->e(t('Hide Data')) ?>" data-show-label="<?= $this->text->e(t('Show Data')) ?>">
        <?= $this->helper->supportHelper->embedSVGIcon('privacy-icon') ?> <span class="data-btn-label"><?= t('Hide Data') ?></span>
    </button>
    <!-- USER CONFIGURATION -->
    <section class="support-section">
        <?= $this->render('KanboardSupport:config_sections/user-config', array('user_agent' => $user_agent)) ?>
    </section>
    <!-- APPLICATION INFORMATION -->
    <section class="support-section">
        <?= $this->render('KanboardSupport:config_sections/app-info') ?>
    </section>
    <!-- DATABASE CONNECTION -->
    <section id="DBSupportSection" class="support-section">
        <?= $this->render('KanboardSupport:config_sections/db-connection', array('db_size' => $db_size, 'db_version' => $db_version)) ?>
    </section>
    <!-- EMAIL CONNECTION -->
    <section class="support-section">
        <?= $this->render('KanboardSupport:config_sections/email-connection') ?>
    </section>
    <!-- SERVER CONFIGURATION -->
    <section id="ServerConfig" class="support-section">
        <?= $this->render('KanboardSupport:config_sections/server-config') ?>
    </section>
    <!-- PHP INFORMATION -->
    <section class="support-section">
        <?= $this->render('KanboardSupport:config_sections/php-info') ?>
    </section>
</div>
