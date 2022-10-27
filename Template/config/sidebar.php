<li<?= $this->app->checkMenuSelection('TechnicalSupport', 'show', 'KanboardSupport') ?>>
    <?= $this->url->link(t('Technical Support'), 'TechnicalSupportController', 'show', ['plugin' => 'KanboardSupport']) ?>
	<?= t('') ?>
</li>
