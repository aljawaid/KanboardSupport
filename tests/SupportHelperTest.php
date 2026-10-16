<?php

/**
 * Verifies cross-platform and edge-case behaviour in Helper/SupportHelper.php.
 *
 * Related source file: Helper/SupportHelper.php.
 */

use Kanboard\Plugin\KanboardSupport\Helper\SupportHelper;

$helper = new SupportHelper($container);

kanboardSupportAssertContains(
    '<svg',
    $helper->embedSVGIcon('php-logo-icon'),
    'Bundled SVG icons must load independently of the current working directory.'
);
kanboardSupportAssertSame('', $helper->embedSVGIcon('missing-icon'), 'Missing SVG icons must fail quietly.');
kanboardSupportAssertSame('', $helper->embedSVGIcon('../Plugin'), 'Invalid SVG paths must be rejected.');
kanboardSupportAssertContains(
    'xxx.xxx.xxx.10',
    $helper->maskIPAddress('10.10.10.10'),
    'Repeated IPv4 octets must not expose the full address.'
);
kanboardSupportAssertContains(
    'xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:7334',
    $helper->maskIPAddress('2001:db8:3333:4444:5555:6666:7777:7334'),
    'IPv6 addresses must be privacy masked.'
);
kanboardSupportAssertContains(
    'mail.xxx.com',
    $helper->maskServer('mail.internal.example.com'),
    'Hostnames must retain only the useful edge labels.'
);
kanboardSupportAssertContains(
    'xxx/example',
    $helper->maskPath('C:\\Kanboard\\example'),
    'Windows paths must be masked without relying on POSIX separators.'
);
kanboardSupportAssertSame('Edge', $helper->getBrowser(), 'Edge must not be misidentified as Chrome or Safari.');
kanboardSupportAssertTrue($helper->isHttps(), 'Forwarded HTTPS requests must be reported as secure.');
kanboardSupportAssertContains(
    '/?controller=TechnicalSupportController',
    $helper->getCurrentPage(),
    'The current page must use the standard request URI.'
);

$temporaryFile = tempnam(sys_get_temp_dir(), 'kanboard-support-test-');

if ($temporaryFile === false) {
    throw new RuntimeException('Unable to create the helper test file.');
}

try {
    file_put_contents($temporaryFile, "first\nsecond\nthird\n");
    kanboardSupportAssertSame(
        "second\nthird",
        $helper->displayDebugFile($temporaryFile, 2),
        'Debug-log reading must return the requested trailing lines.'
    );
    kanboardSupportAssertSame(
        '0.00&nbsp;MB',
        $helper->getLogFileSize($temporaryFile),
        'Small debug logs must be reported without warnings.'
    );
} finally {
    unlink($temporaryFile);
}

kanboardSupportAssertSame(
    '',
    $helper->displayDebugFile($temporaryFile),
    'Missing debug logs must fail quietly.'
);
kanboardSupportAssertSame(
    t('Not available'),
    $helper->getPermissions($temporaryFile),
    'Missing paths must not emit permission warnings.'
);
kanboardSupportAssertSame(
    t('Not available'),
    $helper->getPermissionsLinux($temporaryFile),
    'Missing paths must report unavailable POSIX permissions.'
);
kanboardSupportAssertSame(
    t('Not available'),
    $helper->getPermissionsOwner($temporaryFile),
    'Missing paths must not require POSIX owner functions.'
);
