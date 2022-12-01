<li<?= $this->app->checkMenuSelection('TechnicalSupport', 'show', 'KanboardSupport') ?>>
    <?= $this->url->link(t('Technical Information'), 'TechnicalSupportController', 'show', ['plugin' => 'KanboardSupport']) ?>
</li>
