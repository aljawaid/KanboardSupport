<?php

/**
 * Verifies current Kanboard and PHP compatibility in the diagnostic templates.
 *
 * Related source files: Plugin.php, Template/config_sections/server-config.php,
 * Template/config_sections/php-info.php, Template/config_sections/app-sections.php
 * and Template/config_sections/apache-settings.php.
 */

$plugin = $loadedPlugins[$pluginName];
$serverSource = file_get_contents(__DIR__ . '/../Template/config_sections/server-config.php');
$phpSource = file_get_contents(__DIR__ . '/../Template/config_sections/php-info.php');
$appSectionsSource = file_get_contents(__DIR__ . '/../Template/config_sections/app-sections.php');
$apacheSource = file_get_contents(__DIR__ . '/../Template/config_sections/apache-settings.php');

kanboardSupportAssertSame(
    '>=1.2.54',
    $plugin->getCompatibleVersion(),
    'The declared Kanboard compatibility must match the tested baseline.'
);
kanboardSupportAssertNotContains(
    '$_SERVER',
    $serverSource,
    'Server diagnostics must use Kanboard request helpers for missing-key safety.'
);
kanboardSupportAssertNotContains(
    'SCRIPT_URI',
    $serverSource,
    'Server diagnostics must not rely on the non-standard SCRIPT_URI variable.'
);
kanboardSupportAssertContains(
    "version_compare(PHP_VERSION, '8.1.0', '<')",
    $phpSource,
    'The displayed PHP requirement must match Kanboard 1.2.54.'
);
kanboardSupportAssertContains(
    '$pdoExtensions[DB_DRIVER]',
    $phpSource,
    'PDO diagnostics must identify the configured database driver.'
);
kanboardSupportAssertContains(
    "(int) SESSION_DURATION === 0",
    $appSectionsSource,
    'Session duration labels must distinguish browser sessions from timed sessions.'
);
kanboardSupportAssertContains(
    'HTTP_VERIFY_SSL_CERTIFICATE == true',
    $appSectionsSource,
    'Certificate verification must be shown as the healthy default.'
);
kanboardSupportAssertContains(
    "function_exists('apache_get_version')",
    $apacheSource,
    'Apache diagnostics must tolerate PHP-FPM runtimes without mod_php functions.'
);
kanboardSupportAssertContains(
    "getServerVariable('SERVER_SOFTWARE', t('Not available'))",
    $apacheSource,
    'Apache diagnostics must fall back to the available server software evidence.'
);

$serverOutput = $container['template']->render('kanboardSupport:config_sections/server-config');
$phpOutput = $container['template']->render('kanboardSupport:config_sections/php-info');
$apacheOutput = $container['template']->render('kanboardSupport:config_sections/apache-settings');

kanboardSupportAssertContains(
    t('Server Configuration'),
    $serverOutput,
    'Server diagnostics must render when optional server variables are absent.'
);
kanboardSupportAssertContains(
    t('PHP Information'),
    $phpOutput,
    'PHP diagnostics must render for the tested runtime.'
);
kanboardSupportAssertContains(
    t('Apache Web Server Information'),
    $apacheOutput,
    'Apache diagnostics must render under PHP-FPM without mod_php functions.'
);
