<!-- Administrator-only navigation is covered by tests/SecurityBoundaryTest.php. -->
<?php if ($this->user->isAdmin()): ?>
    <li class="support-dropdown">
        <?= $this->url->link($this->helper->supportHelper->embedSVGIcon('ks-icon') . t('Configuration'), 'TechnicalSupportController', 'show', ['plugin' => 'KanboardSupport', ]) ?>
    </li>
<?php endif ?>
