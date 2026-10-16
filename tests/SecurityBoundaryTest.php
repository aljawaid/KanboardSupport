<?php

/**
 * Verifies the administrator and request-integrity boundaries for support diagnostics.
 *
 * Related source files: Plugin.php, Controller/TechnicalSupportController.php,
 * Template/header/user_dropdown.php, Template/config_sections/app-info.php and
 * Template/config_sections/app-sections.php.
 */

use Kanboard\Controller\BaseController;
use Kanboard\Core\Security\Role;
use Kanboard\Plugin\KanboardSupport\Controller\TechnicalSupportController;

$actions = array(
    'show',
    'showWebhookInformation',
    'showCurrentRawConfigModal',
    'showDefaultRawConfigModal',
    'showDebugLogModal',
    'backupConfigFiles',
    'downloadDebugFile',
    'downloadRawDebugFile',
    'deleteDebugLog',
);

foreach ($actions as $action) {
    kanboardSupportAssertFalse(
        $container['applicationAuthorization']->isAllowed(
            'TechnicalSupportController',
            $action,
            Role::APP_USER
        ),
        'Ordinary users must not access TechnicalSupportController::' . $action . '. '
    );
    kanboardSupportAssertTrue(
        $container['applicationAuthorization']->isAllowed(
            'TechnicalSupportController',
            $action,
            Role::APP_ADMIN
        ),
        'Administrators must be allowed to access TechnicalSupportController::' . $action . '. '
    );
}

kanboardSupportAssertSame(
    BaseController::class,
    get_parent_class(TechnicalSupportController::class),
    'The plugin controller must not inherit unrelated configuration actions.'
);

foreach (array('save', 'downloadDb', 'saveUploadedDb', 'optimizeDb', 'token') as $inheritedAction) {
    kanboardSupportAssertFalse(
        method_exists(TechnicalSupportController::class, $inheritedAction),
        'The plugin controller must not expose ConfigController::' . $inheritedAction . '. '
    );
}

$controllerSource = file_get_contents(__DIR__ . '/../Controller/TechnicalSupportController.php');
$appInfoSource = file_get_contents(__DIR__ . '/../Template/config_sections/app-info.php');
$appSectionsSource = file_get_contents(__DIR__ . '/../Template/config_sections/app-sections.php');
$dropdownSource = file_get_contents(__DIR__ . '/../Template/header/user_dropdown.php');

kanboardSupportAssertContains('isPost()', $controllerSource, 'Sensitive actions must require POST requests.');
kanboardSupportAssertContains('checkCSRFForm()', $controllerSource, 'Sensitive actions must validate CSRF tokens.');
kanboardSupportAssertContains(
    'downloadFileSnapshot(LOG_FILE',
    $controllerSource,
    'Live debug logs must be snapshotted before Content-Length is calculated.'
);
$zipInitialisationPosition = strpos($controllerSource, 'new ZipArchive()');
$firstTemporaryFilePosition = strpos($controllerSource, "tempnam(sys_get_temp_dir()");
kanboardSupportAssertTrue(
    strpos($controllerSource, 'class_exists(ZipArchive::class)') !== false
        && $zipInitialisationPosition !== false
        && $firstTemporaryFilePosition !== false
        && $zipInitialisationPosition < $firstTemporaryFilePosition,
    'ZIP initialisation must happen before a temporary file is created.'
);
kanboardSupportAssertSame(
    1,
    substr_count($appInfoSource, '$this->form->csrf()'),
    'The configuration archive form must contain one CSRF token.'
);
kanboardSupportAssertSame(
    3,
    substr_count($appSectionsSource, '$this->form->csrf()'),
    'Every debug-log mutation or download form must contain a CSRF token.'
);
kanboardSupportAssertContains(
    '$this->user->isAdmin()',
    $dropdownSource,
    'The user-menu shortcut must only be rendered for administrators.'
);
kanboardSupportAssertContains(
    '$this->text->e',
    file_get_contents(__DIR__ . '/../Template/modals/debug-log.php'),
    'Debug-log output must be HTML escaped before rendering.'
);

$logExisted = is_file(LOG_FILE);
$originalLog = $logExisted ? file_get_contents(LOG_FILE) : null;
$unsafeLogEntry = '</pre><script>alert("support")</script>&';

try {
    file_put_contents(LOG_FILE, $unsafeLogEntry);
    $renderedLog = $container['template']->render(
        'kanboardSupport:modals/debug-log',
        array('title' => t('Debug Log'))
    );
} finally {
    if ($logExisted) {
        file_put_contents(LOG_FILE, $originalLog);
    } elseif (is_file(LOG_FILE)) {
        unlink(LOG_FILE);
    }
}

kanboardSupportAssertNotContains(
    $unsafeLogEntry,
    $renderedLog,
    'Externally influenced log text must not be rendered as active markup.'
);
kanboardSupportAssertContains(
    '&lt;/pre&gt;&lt;script&gt;alert(&quot;support&quot;)&lt;/script&gt;&amp;',
    $renderedLog,
    'Externally influenced log text must be rendered as escaped text.'
);
