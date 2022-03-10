<?php

/**
 * This file is part of GLFW3 Headers package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FFI\Headers\Vulkan;

use FFI\Contracts\Headers\VersionInterface;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal FFI\Headers
 */
final class HeadersDownloader
{
    /**
     * @param VersionInterface $version
     * @return string
     */
    private static function getArchiveUrl(VersionInterface $version): string
    {
        return \vsprintf('https://github.com/KhronosGroup/Vulkan-Headers/archive/refs/tags/v%s.zip', [
            $version->toString(),
        ]);
    }

    /**
     * @param VersionInterface $version
     * @return string
     */
    private static function getArchiveTemp(VersionInterface $version): string
    {
        return \sys_get_temp_dir() . '/vulkan-headers-' . $version->toString() . '.zip';
    }

    /**
     * @param VersionInterface $version
     * @return string
     */
    private static function downloadArchive(VersionInterface $version): string
    {
        $urlFrom = self::getArchiveUrl($version);
        $urlTo = self::getArchiveTemp($version);

        if (!\is_file($urlTo) || !\filesize($urlTo)) {
            $from = @\fopen($urlFrom, 'rb');
            $to = @\fopen($urlTo, 'ab+');

            if ($error = \error_get_last()) {
                throw new \RuntimeException($error['message']);
            }

            \stream_copy_to_stream($from, $to);
        }

        return $urlTo;
    }

    /**
     * @param VersionInterface $version
     * @return iterable<\PharFileInfo>
     */
    private static function readArchive(VersionInterface $version): iterable
    {
        return new \RecursiveIteratorIterator(new \PharData(
            self::downloadArchive($version)
        ));
    }

    /**
     * @param VersionInterface $version
     * @param non-empty-string $directory
     * @return void
     */
    public static function download(VersionInterface $version, string $directory): void
    {
        $directory = $directory . '/' . $version->toString();

        foreach (self::readArchive($version) as $file) {
            if (!$file->isFile() || !\str_ends_with($file->getPathname(), '.h')) {
                continue;
            }

            switch (true) {
                case \str_contains($file->getPathname(), 'include/vulkan'):
                    if (!\is_dir($directory . '/vulkan')) {
                        \mkdir($directory . '/vulkan', 0777, true);
                    }

                    $name = \pathinfo($file->getPathname(), \PATHINFO_BASENAME);
                    \file_put_contents($directory . '/vulkan/' . $name, $file->getContent());
                    break;

                case \str_contains($file->getPathname(), 'include/vk_video'):
                    if (!\is_dir($directory . '/vk_video')) {
                        \mkdir($directory . '/vk_video', 0777, true);
                    }

                    $name = \pathinfo($file->getPathname(), \PATHINFO_BASENAME);
                    \file_put_contents($directory . '/vk_video/' . $name, $file->getContent());
                    break;
            }
        }
    }
}
