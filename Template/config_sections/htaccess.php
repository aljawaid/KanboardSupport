<!-- Raw diagnostic output is covered by tests/SecurityBoundaryTest.php. -->
<details class="accordion-section htaccess-config">
    <summary class="accordion-title">
        <?= $this->helper->supportHelper->embedSVGIcon('htaccess-file-icon') ?> <?= t('Hypertext Access File') ?>
    </summary>
    <div class="accordion-content">
        <pre class="htaccess-file"><?= $this->text->e((string) file_get_contents(ROOT_DIR . DIRECTORY_SEPARATOR . '.htaccess')) ?></pre>
    </div>
</details>
