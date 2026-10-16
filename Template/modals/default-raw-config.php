<!-- Raw diagnostic output is covered by tests/SecurityBoundaryTest.php. -->
<div class="config-modal">
    <div class="modal-page-header">
        <h2 class="relative">
            <span class="modal-title">
                <?= $this->helper->supportHelper->embedSVGIcon('raw-icon') ?> <?= $title ?>
            </span>
        </h2>
    </div>
    <div class="modal-contents panel panel-blue">
        <pre class=""><?= $this->text->e((string) file_get_contents(ROOT_DIR . DIRECTORY_SEPARATOR . 'config.default.php', false, null, 7)); ?></pre>
    </div>
</div>
