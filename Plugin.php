<?php

namespace Kanboard\Plugin\KanboardSupport;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Model\UserModel;
use Kanboard\Controller\UserViewController;

class Plugin extends Base
{
    public function initialize()
    {
        // Template - Override name should be camelCase e.g. pluginNameExampleCamelCase
        $this->template->setTemplateOverride('config/about', 'kanboardSupport:config/about');

        // CSS - Asset Hook - keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/KanboardSupport/Assets/css/kanboard-support.css'));

        // SETTINGS SIDEBAR - Template Hook - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:config:sidebar', 'kanboardSupport:config/sidebar');

        // SUPPORT PAGE - Routes
        $this->route->addRoute('/settings/support', 'TechnicalSupportController', 'show', 'KanboardSupport');

        // HELPER
        $this->helper->register('supportHelper', '\Kanboard\Plugin\KanboardSupport\Helper\SupportHelper');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'KanboardSupport';
    }

    public function getPluginDescription()
    {
        return t('Add a support section in the Kanboard Settings interface so that end users can easily gather any information required by their internal technical support departments for troubleshooting.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '2.0.0';
    }

    public function getCompatibleVersion()
    {
        // Examples:
        // >=1.0.37
        // <1.0.37
        // <=1.0.37
        return '>=1.2.20';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/KanboardSupport';
    }
}
