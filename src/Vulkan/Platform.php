<?php

/**
 * This file is part of FFI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FFI\Headers\Vulkan;

enum Platform: string
{
    case ANDROID = 'VK_USE_PLATFORM_ANDROID_KHR';
    case FUCHSIA = 'VK_USE_PLATFORM_FUCHSIA';
    case IOS = 'VK_USE_PLATFORM_IOS_MVK';
    case MACOS = 'VK_USE_PLATFORM_MACOS_MVK';
    case METAL = 'VK_USE_PLATFORM_METAL_EXT';
    case VI = 'VK_USE_PLATFORM_VI_NN';
    case WAYLAND = 'VK_USE_PLATFORM_WAYLAND_KHR';
    case WIN32 = 'VK_USE_PLATFORM_WIN32_KHR';
    case XCB = 'VK_USE_PLATFORM_XCB_KHR';
    case XLIB = 'VK_USE_PLATFORM_XLIB_KHR';
    case DIRECTFB = 'VK_USE_PLATFORM_DIRECTFB_EXT';
    case XLIB_XRANDR = 'VK_USE_PLATFORM_XLIB_XRANDR_EXT';
    case GGP = 'VK_USE_PLATFORM_GGP';
    case SCREEN = 'VK_USE_PLATFORM_SCREEN_QNX';
}
