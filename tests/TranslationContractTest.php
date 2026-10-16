<?php

/**
 * Verifies the translation key contract for every maintained locale.
 *
 * Related source files: each locale translations file and Locale/translations-starter-template.php.
 */

$localeFiles = array(
    'en_GB' => __DIR__ . '/../Locale/en_GB/translations.php',
    'de_DE' => __DIR__ . '/../Locale/de_DE/translations.php',
    'es_ES' => __DIR__ . '/../Locale/es_ES/translations.php',
    'fr_FR' => __DIR__ . '/../Locale/fr_FR/translations.php',
    'starter' => __DIR__ . '/../Locale/translations-starter-template.php',
);
$translations = array();

foreach ($localeFiles as $locale => $localeFile) {
    $translations[$locale] = require $localeFile;
    kanboardSupportAssertTrue(
        is_array($translations[$locale]),
        $locale . ' translations must return an array.'
    );
}

$expectedKeys = array_keys($translations['en_GB']);
sort($expectedKeys);

foreach ($translations as $locale => $values) {
    $actualKeys = array_keys($values);
    sort($actualKeys);
    $missingLocaleKeys = array_values(array_diff($expectedKeys, $actualKeys));
    $extraLocaleKeys = array_values(array_diff($actualKeys, $expectedKeys));
    kanboardSupportAssertTrue(
        $missingLocaleKeys === array() && $extraLocaleKeys === array(),
        $locale . ' must maintain the same translation keys as en_GB. Missing: '
            . implode(', ', $missingLocaleKeys) . '. Extra: ' . implode(', ', $extraLocaleKeys) . '.'
    );

    if ($locale !== 'starter') {
        $emptyValues = array_filter($values, function ($value) {
            return trim((string) $value) === '';
        });
        kanboardSupportAssertSame(
            array(),
            $emptyValues,
            $locale . ' must not contain untranslated empty values.'
        );
    }
}

$sourceFiles = array_merge(
    array(__DIR__ . '/../Plugin.php'),
    glob(__DIR__ . '/../Controller/*.php'),
    glob(__DIR__ . '/../Helper/*.php'),
    glob(__DIR__ . '/../Template/*.php'),
    glob(__DIR__ . '/../Template/*/*.php')
);
$sourceKeys = array();

foreach ($sourceFiles as $sourceFile) {
    $source = file_get_contents($sourceFile);
    preg_match_all("/(?<![A-Za-z0-9_])(?:t|e)\\(\\s*'((?:\\\\.|[^'\\\\])*)'/", $source, $matches);

    foreach ($matches[1] as $match) {
        $sourceKeys[] = stripcslashes($match);
    }
}

$missingKeys = array_values(array_diff(array_unique($sourceKeys), $expectedKeys));
sort($missingKeys);

kanboardSupportAssertSame(
    array(),
    $missingKeys,
    'Every source translation key must exist in each maintained locale.'
);
