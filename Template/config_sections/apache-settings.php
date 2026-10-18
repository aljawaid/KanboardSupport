<?php
// PHP-FPM does not expose the mod_php Apache functions, so retain accurate
// server evidence without allowing the diagnostics page to fail.
$apacheVersion = function_exists('apache_get_version')
    ? apache_get_version()
    : $this->helper->supportHelper->getServerVariable('SERVER_SOFTWARE', t('Not available'));
$apacheModules = function_exists('apache_get_modules') ? apache_get_modules() : array();
?>
<details class="accordion-section apache-config">
    <summary class="accordion-title">
        <?= $this->helper->supportHelper->embedSVGIcon('apache-logo-accordion-icon') ?> <?= t('Apache Web Server Information') ?>
    </summary>
    <div class="accordion-content apache-info">
        <ul class="">
            <span class="data-wrap">
                <li class="app-info-title"><?= t('Apache Version') ?></li>
                <li class="app-info-value value-version border-bottom-thick"><?= $this->text->e($apacheVersion) ?></li>
            </span>
            <div class="">
                <h4 class=""><?= t('Apache Modules') ?></h4>
                <div class="">
                    <ul class="apache-modules">
                        <?php if ($apacheModules === array()): ?>
                            <li class="app-info-value"><?= t('Not available') ?></li>
                        <?php else: ?>
                            <?php foreach ($apacheModules as $module): ?>
                                <li class="">
                                    <?= $this->helper->supportHelper->embedSVGIcon('apache-logo-icon') ?>
                                    <?php if ($module == 'mod_rewrite'): ?>
                                        <strong title="<?= t('Required for URL Rewriting') ?>"><?= $this->text->e($module) ?></strong>
                                    <?php else: ?>
                                        <?= $this->text->e($module) ?>
                                    <?php endif ?>
                                </li>
                            <?php endforeach ?>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </ul>
    </div>
</details>
