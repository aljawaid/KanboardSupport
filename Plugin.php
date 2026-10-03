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
        // Template Override
        //  - Override name should be camelCase e.g. pluginNameExampleCamelCase
        $this->template->setTemplateOverride('config/webhook', 'kanboardSupport:config/webhook');

        // CSS - Asset Hook - keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/KanboardSupport/Assets/css/kanboard-support.css'));
        if (!file_exists('plugins/ContentCleaner') || !file_exists('plugins/PluginManager')) {
            $this->hook->on('template:layout:css', array('template' => 'plugins/KanboardSupport/Assets/css/messages.css'));
        }

        // JS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:js', array('template' => 'plugins/KanboardSupport/Assets/js/kanboard-support.js'));

        // SETTINGS SIDEBAR - Template Hook - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:config:sidebar', 'kanboardSupport:config/sidebar');
        // TOP RIGHT MENU
        $this->template->hook->attach('template:header:dropdown', 'kanboardSupport:header/user_dropdown');

        // SUPPORT PAGE - Routes
        $this->route->addRoute('/settings/configuration', 'TechnicalSupportController', 'show', 'KanboardSupport');
        $this->route->addRoute('/settings/webhook/information', 'TechnicalSupportController', 'showWebhookInformation', 'KanboardSupport');

        // HELPER
        $this->helper->register('supportHelper', '\Kanboard\Plugin\KanboardSupport\Helper\SupportHelper');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getPluginName()
    {
        return 'KanboardSupport';
    }

    public function getPluginDescription()
    {
        return t('Display the environment and configuration settings of your Kanboard instance all from one dedicated page. View and compare all options from the config file directly from the interface. Users will benefit from identifying problems caused by missing extensions and server misconfigurations without needing backend access to the server. Made for both regular users and administrators, this privacy and user friendly plugin provides a range of features including integrated webhook documentation, downloading backup copies of the config file and displaying, downloading or deleting the debug log file.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '4.5.1';
    }

    public function getCompatibleVersion()
    {
        // Examples: '>=1.0.37' '<1.0.37' '<=1.0.37'
        // Tested on KB v1.2.20 upto plugin v2.8.0, then KB v1.2.32+
        return '>=1.2.20';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/KanboardSupport';
    }
}
