<?php

namespace Kanboard\Plugin\KanboardSupport;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Security\Role;
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

        // Environment and configuration diagnostics are administrator-only because the page contains operational metadata.
        // Access and compatibility contracts are covered by tests/SecurityBoundaryTest.php and
        // tests/DiagnosticsCompatibilityTest.php.
        $this->applicationAccessMap->add('TechnicalSupportController', '*', Role::APP_ADMIN);

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
        return t('Display Kanboard environment and configuration diagnostics on a dedicated administrator-only page. Compare configuration options, identify missing PHP extensions and server misconfigurations, review webhook documentation, download configuration backups, and view, download or delete the debug log.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '4.5.2';
    }

    public function getCompatibleVersion()
    {
        // The focused compatibility matrix covers the supported Kanboard baseline.
        return '>=1.2.54';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/KanboardSupport';
    }
}
