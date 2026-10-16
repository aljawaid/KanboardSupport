<!-- Sensitive-action contracts are covered by tests/SecurityBoundaryTest.php. -->
<h2 class="">
    <i class="fa fa-cog"></i> <?= t('Application Information') ?>
</h2>
<div class="app-info">
    <ul class="">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Application Name') ?></li>
            <li class="app-info-value border-bottom-thick privacy privacy-fw">Kanboard</li>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Version') ?></li>
            <li class="app-info-value value-version border-bottom-thick"><?= APP_VERSION ?></li>
        </span>
        <?php if ($this->user->isAdmin()): ?>
            <span class="data-wrap">
                <li class="app-info-title"><?= t('Updates') ?></li>
                <li class="app-info-value border-bottom-thick">
                    <a href="https://github.com/kanboard/kanboard/releases" class="kb-updates-link" target="_blank" rel="noopener noreferrer" title="<?= t('Opens in a new window') ?> &#8663;">
                        <i class="fa fa-external-link"></i> <?= t('Check for updates') ?>
                    </a>
                </li>
            </span>
        <?php endif ?>
        <?php if ($this->user->isAdmin()): ?>
            <p class="config-notice">
                <?= t('This page contains all the configuration settings from the application config file. You can also view the raw contents of the config file as-is and also compare it to the default version.') ?> <strong><?= t('The raw config file will expose sensitive information which should not be shared.') ?></strong>
            </p>
            <div class="config-btns">
                <?php if (file_exists(ROOT_DIR . DIRECTORY_SEPARATOR . 'config.php')): ?>
                    <button type="button" href="<?= $this->url->href('TechnicalSupportController', 'showCurrentRawConfigModal', array(
                        'plugin' => 'KanboardSupport'), false, '', false) ?>" class="btn config-btn config-btn-green js-modal-confirm" title="<?= t('The settings in this file apply to the current application environment') ?>">
                        <?= $this->helper->supportHelper->embedSVGIcon('raw-icon') ?> <?= t('Current Raw Config File') ?>
                    </button>
                <?php else: ?>
                    <button type="button" href="<?= $this->url->href('TechnicalSupportController', 'showCurrentRawConfigModal', array(
                        'plugin' => 'KanboardSupport'), false, '', false) ?>" class="btn config-btn config-btn-red js-modal-confirm" title="<?= t('An active configuration file has not been detected. Make sure the filename is correct.') ?>" disabled>
                        <?= $this->helper->supportHelper->embedSVGIcon('raw-icon') ?> <?= t('Current Raw Config File') ?>
                    </button>
                <?php endif ?>
                <button type="button" href="<?= $this->url->href('TechnicalSupportController', 'showDefaultRawConfigModal', array(
                    'plugin' => 'KanboardSupport'), false, '', false) ?>" class="btn config-btn config-btn-blue js-modal-confirm" title="<?= t('This file is for reference only') ?>">
                    <?= $this->helper->supportHelper->embedSVGIcon('raw-icon') ?> <?= t('Default Raw Config File') ?>
                </button>
                <?php if (extension_loaded('zip')): ?>
                    <form method="post" action="<?= $this->url->href('TechnicalSupportController', 'backupConfigFiles', array('plugin' => 'KanboardSupport'), false, '', false) ?>">
                        <?= $this->form->csrf() ?>
                        <button type="submit" class="btn config-download-btn">
                            <?= $this->helper->supportHelper->embedSVGIcon('zip-icon') ?> <?= t('Download Config Files') ?>
                        </button>
                    </form>
                <?php else: ?>
                    <button type="submit" class="btn config-download-btn" title="<?= t('PHP \'zip\' Extension Not Detected. Check the \'PHP Information\' section of this page.') ?>" disabled>
                        <?= $this->helper->supportHelper->embedSVGIcon('zip-icon') ?> <?= t('Download Config Files') ?>
                    </button>
                <?php endif ?>
            </div>
        <?php endif ?>
        <?= $this->render('KanboardSupport:config_sections/app-sections') ?>
    </ul>
</div>
