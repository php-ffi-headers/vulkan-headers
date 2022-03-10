<?php

/**
 * This file is part of FFI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FFI\Headers;

use FFI\Contracts\Headers\HeaderInterface;
use FFI\Contracts\Preprocessor\Exception\DirectiveDefinitionExceptionInterface;
use FFI\Contracts\Preprocessor\Exception\PreprocessorExceptionInterface;
use FFI\Contracts\Preprocessor\PreprocessorInterface;
use FFI\Headers\Vulkan\HeadersDownloader;
use FFI\Headers\Vulkan\Platform;
use FFI\Headers\Vulkan\Version;
use FFI\Headers\Vulkan\VersionInterface;
use FFI\Preprocessor\Preprocessor;

class Vulkan implements HeaderInterface
{
    /**
     * @var non-empty-string
     */
    private const HEADERS_DIRECTORY = __DIR__ . '/../resources/headers';

    /**
     * @param PreprocessorInterface $pre
     * @param VersionInterface $version
     */
    public function __construct(
        public readonly PreprocessorInterface $pre,
        public readonly VersionInterface $version = Version::LATEST,
    ) {
        if (!$this->exists()) {
            HeadersDownloader::download($this->version, self::HEADERS_DIRECTORY);

            if (!$this->exists()) {
                throw new \RuntimeException('Could not initialize (download) header files');
            }
        }
    }

    /**
     * @return bool
     */
    private function exists(): bool
    {
        return \is_file($this->getHeaderPathname());
    }

    /**
     * @return non-empty-string
     */
    public function getHeaderPathname(): string
    {
        return self::HEADERS_DIRECTORY . '/' . $this->version->toString() . '/vulkan/vulkan.h';
    }

    /**
     * @param Platform|null $platform
     * @param bool $betaExtensions
     * @param VersionInterface|non-empty-string $version
     * @param PreprocessorInterface $pre
     * @return self
     * @throws DirectiveDefinitionExceptionInterface
     */
    public static function create(
        Platform $platform = null,
        bool $betaExtensions = false,
        VersionInterface|string $version = Version::LATEST,
        PreprocessorInterface $pre = new Preprocessor(),
    ): self {
        $pre = clone $pre;

        $pre->add('stddef.h', '');
        $pre->add('stdint.h', '');

        if ($platform !== null) {
            $pre->define($platform->value, '1');
        }

        $pre->define('VK_USE_64_BIT_PTR_DEFINES', '1');
        $pre->define('VK_NO_STDDEF_H', '1');
        $pre->define('VK_NO_STDINT_H', '1');
        $pre->define('VK_NO_PROTOTYPES', '1');

        if ($betaExtensions) {
            $pre->define('VK_ENABLE_BETA_EXTENSIONS', '1');
        }

        if (!$version instanceof VersionInterface) {
            $version = Version::create($version);
        }

        $pre->include(self::HEADERS_DIRECTORY . '/platform');
        $pre->include(self::HEADERS_DIRECTORY . '/' . $version->toString());

        return new self($pre, $version);
    }

    /**
     * @return non-empty-string
     * @throws PreprocessorExceptionInterface
     */
    public function __toString(): string
    {
        $result = [
            $this->pre->process(new \SplFileInfo($this->getHeaderPathname())),
            $this->pre->process(new \SplFileInfo(self::HEADERS_DIRECTORY . '/vulkan_prototypes_1.0.h')),
        ];

        return \implode(\PHP_EOL, $result) . \PHP_EOL;
    }
}
