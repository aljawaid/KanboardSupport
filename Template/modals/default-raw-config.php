<style type="text/css">
    /* MODAL SIZE */
    #modal-box {
        /* width: auto !important; */
        /* overflow: hidden; */
        overflow-x: hidden;
    }

    #modal-content {
        padding: 10px 15px;
    }

    /* MODAL CLOSE BUTTON */
    #modal-close-button {
        transform: scale(1.5);
        display: inline-block;
        position: absolute;
        right: 5px;
        top: 6px;
        background: var(--pp-red-alt-2);
        padding: 3px 3px 5px 6px;
        border-bottom-left-radius: 3px;
        box-shadow: -1px -1px 0 3px var(--pp-white);
        z-index: 1;
    }

    #modal-close-button i {
        color: var(--pp-white);
        transition: var(--transition-kanboard-support);
    }

    #modal-close-button:hover i {
        color: var(--pp-grey);
        text-shadow: 0 0 1px var(--pp-white);
    }
</style>
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
