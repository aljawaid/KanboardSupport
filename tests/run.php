<?php

// phpcs:ignoreFile PSR1.Files.SideEffects.FoundWithSymbols -- The runner must define Kanboard constants.

/**
 * Runs the plugin's focused regression checks against Kanboard.
 *
 * Related test files: TestAssertions.php and every *Test.php file in this directory.
 */

$kanboardRoot = isset($argv[1]) ? realpath($argv[1]) : false;

if ($kanboardRoot === false || !is_file($kanboardRoot . '/app/common.php')) {
    fwrite(STDERR, "Usage: php tests/run.php <kanboard-root>\n");
    exit(2);
}

$pluginsRoot = getenv('KANBOARD_PLUGINS_DIR') ?: $kanboardRoot . '/plugins';

$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI'] = '/?controller=TechnicalSupportController&action=show&plugin=KanboardSupport';
$_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 AppleWebKit/537.36 Chrome/140.0 Safari/537.36 Edg/140.0';
$_SERVER['HTTP_X_FORWARDED_PROTO'] = 'https';

define('PLUGINS_DIR', $pluginsRoot);
define('DB_FILENAME', ':memory:');

require $kanboardRoot . '/app/common.php';
require __DIR__ . '/TestAssertions.php';

$pluginName = 'KanboardSupport';
$loadedPlugins = $container['pluginLoader']->getPlugins();
$incompatiblePlugins = $container['pluginLoader']->getIncompatiblePlugins();

kanboardSupportAssertFalse(
    isset($incompatiblePlugins[$pluginName]),
    'KanboardSupport must be compatible with the tested Kanboard release.'
);
kanboardSupportAssertTrue(
    isset($loadedPlugins[$pluginName]),
    'KanboardSupport must load before its regression checks run.'
);

$testFiles = glob(__DIR__ . '/*Test.php');
sort($testFiles);

foreach ($testFiles as $testFile) {
    require $testFile;
}

echo 'KanboardSupport regression checks passed on Kanboard ' . APP_VERSION
    . ' with PHP ' . PHP_VERSION . PHP_EOL;
