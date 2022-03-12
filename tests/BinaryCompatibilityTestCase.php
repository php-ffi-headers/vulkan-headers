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
use FFI\Headers\Vulkan\Version;
use FFI\Location\Locator;

class BinaryCompatibilityTestCase extends TestCase
{
    /**
     * @requires OSFAMILY Windows
     *
     * @dataProvider versionsDataProvider
     */
    public function testWindowsBinaryCompatibility(Version $version): void
    {
        if (($binary = Locator::resolve('vulkan.dll', 'vulkan-1.dll')) === null) {
            $this->markTestSkipped('Can not load vulkan library');
        }

        $this->assertHeadersCompatibleWith(
            Vulkan::create(Vulkan\Platform::WIN32, false, $version),
            $binary
        );
    }

    /**
     * @requires OSFAMILY Linux
     *
     * @dataProvider versionsDataProvider
     */
    public function testLinuxX11BinaryCompatibility(Version $version): void
    {
        if (($binary = Locator::resolve('libvulkan.so', 'libvulkan.so.1')) === null) {
            $this->markTestSkipped('Can not load vulkan library');
        }

        $this->assertHeadersCompatibleWith(
            Vulkan::create(Vulkan\Platform::XLIB, false, $version),
            $binary
        );
    }

    /**
     * @requires OSFAMILY Linux
     *
     * @dataProvider versionsDataProvider
     */
    public function testLinuxXRandrBinaryCompatibility(Version $version): void
    {
        if (($binary = Locator::resolve('libvulkan.so', 'libvulkan.so.1')) === null) {
            $this->markTestSkipped('Can not load vulkan library');
        }

        $this->assertHeadersCompatibleWith(
            Vulkan::create(Vulkan\Platform::XLIB_XRANDR, false, $version),
            $binary
        );
    }

    /**
     * @requires OSFAMILY Linux
     * @dataProvider versionsDataProvider
     */
    public function testLinuxWaylandBinaryCompatibility(Version $version): void
    {
        if (!isset($_SERVER['XDG_SESSION_TYPE']) || $_SERVER['XDG_SESSION_TYPE'] !== 'wayland') {
            $this->markTestSkipped('The Wayland window system server required');
        }

        if (($binary = Locator::resolve('libvulkan.so', 'libvulkan.so.1')) === null) {
            $this->markTestSkipped('Can not load vulkan library');
        }

        $this->assertHeadersCompatibleWith(
            Vulkan::create(Vulkan\Platform::WAYLAND, false, $version),
            $binary
        );
    }

    /**
     * @requires OSFAMILY Darwin
     *
     * @dataProvider versionsDataProvider
     */
    public function testDarwinBinaryCompatibility(Version $version): void
    {
        if (($binary = Locator::resolve('libvulkan.dylib', 'libvulkan.1.dylib', 'libMoltenVK.dylib')) === null) {
            $this->markTestSkipped('Can not load vulkan library');
        }

        $this->assertHeadersCompatibleWith(
            Vulkan::create(Vulkan\Platform::MACOS, false, $version),
            $binary
        );
    }
}
