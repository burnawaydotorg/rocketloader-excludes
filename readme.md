====
GiveWP & jQuery Rocket Loader Exclude
====

Contributors: brandonsheats
Donate link:
Tags: givewp, jquery, rocketloader, cloudflare, exclude, javascript
Requires at least: 4.0
Tested up to: 6.4
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Excludes GiveWP and jQuery JavaScript files from Cloudflare's Rocket Loader to prevent conflicts.

## Description

This plugin automatically excludes GiveWP and jQuery JavaScript files from Cloudflare's Rocket Loader. This prevents potential issues caused by Rocket Loader's optimization, ensuring that GiveWP and jQuery scripts function correctly.

## Installation

1.  Upload the `rocketloader-givewp` folder to the `/wp-content/plugins/` directory.
2.  Activate the plugin through the 'Plugins' menu in WordPress.
3.  View the source of your GiveWP pages to ensure the `data-cfasync="false"` attribute is applied to all script tags.
4.  (optional) Remove any Page or Configuration Rules you may have for your website at Cloudflare.

## Frequently Asked Questions

**Why do I need this plugin?**

Cloudflare's Rocket Loader can sometimes cause conflicts with JavaScript files, especially those used by GiveWP and jQuery. This plugin ensures that these scripts are excluded from Rocket Loader, preventing potential issues.

**How does it work?**

The plugin adds the `data-cfasync="false"` attribute to GiveWP and jQuery scripts, telling Cloudflare's Rocket Loader to ignore them. Doing so will ensure compatability with your site and Cloudflare while using GiveWP.

This will increase the number of calls to javascript files, thus increasing page load. Use only after attempting other page optimization techniques.

## Changelog

### 1.0.1

- Fixes to add checks and include ?givewp-embed (embedded pages).

## Upgrade Notice

### 1.0

- Initial release.
