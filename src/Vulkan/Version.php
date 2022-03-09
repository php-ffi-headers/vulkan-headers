<?php

/**
 * This file is part of FFI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FFI\Headers\Vulkan;

enum Version: string implements VersionInterface
{
    // ---- Version 1.1 (2018) ----
    case V1_1_96  = '1.1.96';  // 1.1-lowest
    case V1_1_130 = '1.1.130'; // 1.1-latest

    // ---- Version 1.2 (2020) ----
    case V1_2_131 = '1.2.131'; // 1.2-lowest
    case V1_2_203 = '1.2.203'; // 1.2-latest

    // ---- Version 1.3 (2022) ----
    case V1_3_204 = '1.3.204'; // 1.3-lowest
    case V1_3_207 = '1.3.207'; // 1.3-latest

    public const LATEST = self::V1_3_207;

    /**
     * @param non-empty-string $version
     * @return VersionInterface
     */
    public static function create(string $version): VersionInterface
    {
        /** @var array<non-empty-string, VersionInterface> $versions */
        static $versions = [];

        return self::tryFrom($version)
            ?? $versions[$version]
            ??= new class($version) implements VersionInterface {
                /**
                 * @param non-empty-string $version
                 */
                public function __construct(
                    private string $version,
                ) {
                }

                /**
                 * {@inheritDoc}
                 */
                public function toString(): string
                {
                    return $this->version;
                }
            };
    }

    /**
     * {@inheritDoc}
     */
    public function toString(): string
    {
        return $this->value;
    }
}
