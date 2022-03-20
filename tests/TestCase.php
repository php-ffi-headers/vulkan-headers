<?php

/**
 * This file is part of FFI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FFI\Headers\Vulkan\Tests;

use FFI\Headers\Testing\TestingTrait;
use FFI\Headers\Vulkan\Platform;
use FFI\Headers\Vulkan\Version;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use TestingTrait;

    private const VERSION_CASES = [
        Version::V1_1_LOWEST,
        Version::V1_1_HIGHEST,
        Version::V1_2_LOWEST,
        Version::V1_2_HIGHEST,
        Version::V1_3_LOWEST,
        Version::V1_3_HIGHEST,
    ];

    /**
     * @return array<array{Platform, Version}>
     */
    public function configDataProvider(): array
    {
        $result = [];

        foreach (Platform::cases() as $platform) {
            foreach (self::VERSION_CASES as $version) {
                $result[\sprintf('%s-%s', $platform->name, $version->value)] = [$platform, $version];
            }
        }

        return $result;
    }

    /**
     * @return array<array{Version}>
     */
    public function versionsDataProvider(): array
    {
        $result = [];

        foreach (self::VERSION_CASES as $version) {
            $result[$version->toString()] = [$version];
        }

        return $result;
    }
}
