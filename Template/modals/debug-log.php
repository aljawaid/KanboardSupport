<!-- Raw diagnostic output is covered by tests/SecurityBoundaryTest.php. -->
<div class="config-modal">
    <div class="modal-page-header">
        <h2 class="relative">
            <span class="modal-title">
                <?= $this->helper->supportHelper->embedSVGIcon('log-icon-green') ?> <?= $title ?>
            </span>
        </h2>
    </div>
    <p class="debug-entries-text"><?= t('Displaying the most recent entries (50 maximum) from the log file.') ?></p>
    <div class="modal-contents panel">
        <pre class=""><?= $this->text->e($this->helper->supportHelper->displayDebugFile()) ?></pre>
    </div>
</div>
