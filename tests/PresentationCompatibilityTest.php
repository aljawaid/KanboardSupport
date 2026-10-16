<?php

/**
 * Verifies theme, responsive, interaction and modal presentation contracts.
 *
 * Related source files: Assets/css/kanboard-support.css, Assets/js/kanboard-support.js,
 * Template/config/support.php and Template/modals/*.php.
 */

$css = file_get_contents(__DIR__ . '/../Assets/css/kanboard-support.css');
$javascript = file_get_contents(__DIR__ . '/../Assets/js/kanboard-support.js');
$supportTemplate = file_get_contents(__DIR__ . '/../Template/config/support.php');

kanboardSupportAssertContains('light-dark(', $css, 'The existing palette must adapt to dark themes.');
kanboardSupportAssertContains('@media screen and (max-width: 768px)', $css, 'The support view must adapt to mobile widths.');
kanboardSupportAssertContains('@media (prefers-reduced-motion: reduce)', $css, 'Motion preferences must be honoured.');
kanboardSupportAssertContains('min-height: 44px', $css, 'Mobile controls must retain practical touch targets.');
kanboardSupportAssertNotContains('transition: all', $css, 'Hover transitions must name the animated properties.');
kanboardSupportAssertContains("aria-pressed", $javascript, 'The privacy control must expose its current state.');
kanboardSupportAssertContains('data-show-label', $supportTemplate, 'The privacy control must expose its alternate label.');

foreach (glob(__DIR__ . '/../Template/modals/*.php') as $modal) {
    kanboardSupportAssertNotContains(
        '<style',
        file_get_contents($modal),
        basename($modal) . ' must use the shared theme-aware stylesheet.'
    );
}
