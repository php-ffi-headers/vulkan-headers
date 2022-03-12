<?php

/**
 * This file is part of FFI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FFI\Headers\Vulkan\Tests;

use FFI\Headers\Vulkan;
use FFI\Headers\Vulkan\Platform;
use FFI\Headers\Vulkan\Version;

final class ContentRenderingTestCase extends TestCase
{
    /**
     * @testdox Testing that the headers are successfully built
     *
     * @dataProvider configDataProvider
     */
    public function testRenderable(Platform $platform, Version $version): void
    {
        $this->expectNotToPerformAssertions();

        (string)Vulkan::create($platform, true, $version);
    }

    /**
     * @testdox Tests that header has correct PHP FFI syntax
     *
     * @depends testRenderable
     * @dataProvider configDataProvider
     */
    public function testCompilation(Platform $platform, Version $version): void
    {
        $this->assertHeadersSyntaxValid(
            Vulkan::create($version)
        );
    }
}
