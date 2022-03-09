<p align="center">
    <a href="https://github.com/php-ffi-headers">
        <img src="https://avatars.githubusercontent.com/u/101121010?s=256" width="128" />
    </a>
</p>

<p align="center">
    <a href="https://github.com/php-ffi-headers/vulkan-headers/actions"><img src="https://github.com/php-ffi-headers/vulkan-headers/workflows/build/badge.svg"></a>
    <a href="https://packagist.org/packages/ffi-headers/vulkan-headers"><img src="https://img.shields.io/badge/PHP-8.1.0-ff0140.svg"></a>
    <a href="https://packagist.org/packages/ffi-headers/vulkan-headers"><img src="https://img.shields.io/badge/Vulkan-1.3.207-cc3c20.svg"></a>
    <a href="https://packagist.org/packages/ffi-headers/vulkan-headers"><img src="https://poser.pugx.org/ffi-headers/vulkan-headers/version" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/ffi-headers/vulkan-headers"><img src="https://poser.pugx.org/ffi-headers/vulkan-headers/v/unstable" alt="Latest Unstable Version"></a>
    <a href="https://packagist.org/packages/ffi-headers/vulkan-headers"><img src="https://poser.pugx.org/ffi-headers/vulkan-headers/downloads" alt="Total Downloads"></a>
    <a href="https://raw.githubusercontent.com/php-ffi-headers/vulkan-headers/master/LICENSE.md"><img src="https://poser.pugx.org/ffi-headers/vulkan-headers/license" alt="License MIT"></a>
</p>

# Vulkan Headers

This is a C headers of the [Vulkan](https://www.khronos.org/registry/vulkan/) adopted for PHP.

## Requirements

- PHP >= 8.1

## Installation

Library is available as composer repository and can be installed using the
following command in a root of your project.

```sh
$ composer require ffi-headers/vulkan-headers
```

## Usage

```php
use FFI\Headers\Vulkan;

$headers = Vulkan::create(
    platform: Vulkan\Platform::XLIB,   // Platform
    betaExtensions: true,              // Enable Beta Extensions
    version: Vulkan\Version::V1_3_207, // Headers Version
);

echo $headers;
```

> Please note that the use of header files is not the latest version:
> - Takes time to download and install (This will be done in the background
    >   during initialization).
> - May not be compatible with the PHP headers library.

