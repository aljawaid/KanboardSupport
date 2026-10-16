<?php

/**
 * Provides assertion helpers for the plugin's focused regression tests.
 *
 * Related test runner: tests/run.php.
 */

function kanboardSupportAssertTrue($condition, $message)
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

function kanboardSupportAssertFalse($condition, $message)
{
    kanboardSupportAssertTrue(!$condition, $message);
}

function kanboardSupportAssertSame($expected, $actual, $message)
{
    if ($expected !== $actual) {
        throw new RuntimeException(
            $message . ' Expected ' . var_export($expected, true) . ', got ' . var_export($actual, true) . '.'
        );
    }
}

function kanboardSupportAssertContains($needle, $haystack, $message)
{
    kanboardSupportAssertTrue(strpos($haystack, $needle) !== false, $message);
}

function kanboardSupportAssertNotContains($needle, $haystack, $message)
{
    kanboardSupportAssertFalse(strpos($haystack, $needle) !== false, $message);
}
