# Statamic 3 Asset Cache

A Statamic (v3) addon that automates downloading CSS and JS assets from CDNs so 
that they can be self hosted.

This is a Statamic tag based on my [Laravel Asset Cache](https://github.com/rosswintle/laravel-asset-cache/) package.

## Installation

Install the package with composer:

```
composer require rosswintle/statamic-asset-cache
```

Cached assets are stored in and served from the `public` file storage "disk". You will need to have symlinked your `public/storage` directory to `storage/app/public` as per the [Laravel docs](https://laravel.com/docs/6.x/filesystem#the-public-disk) using:

```
php artisan storage:link
```

Be sure to do this in ALL environments: local, staging, and production, if you haven't already.

## Usage

The Statamic tag is:

```
{{ asset_cache package_name='<npm package name>' version='<version constraint>' filename='<file path and name>' }}
```

* `package_name` is the name of an npm package (currently only npm is supported via jsdelivr.net)
* `version` is a version constraint such as `1.9.0`. Semantic versioning is assumed. You can use `1.9` to get the latest `1.9.x` version as per the [jsdelivr docs](https://www.jsdelivr.com/features) but this is not recommended in production environments
* `filename` is the path and filename (with extension) for the asset that you want relative to the package's root. For example `dist/alpine.js`

The tag outputs the URL of the locally-cached file from the package.

Example:

```
<script defer src="{{ asset_cache package_name='alpinejs' version='1.9' filename='dist/alpine.min.js' }}"></script>
```

You can also use this for CSS:

```
<link rel="stylesheet" href="{{ asset_cache package_name='tailwindcss' version='1.1.4' filename='dist/tailwind.min.css' }}">
```

## What does this do?

Using the tag:

* Downloads the asset from jsdelivr.net
* Caches it in your site's `public` directory
* Returns the URL of the cached, local asset

## What problem does this solve?

It saves you having to manually download assets and include them in your project if you want to host them locally. 

There are [various reasons](https://csswizardry.com/2019/05/self-host-your-static-assets/) why you may want to do this, such as avoiding having your users tracked, to avoid depending on third-party CDNs and there are possible performance benefits too.

I'm also on a mission to ditch npm and build process from simple projects, so this bit of automation seemed useful.

If you dare specify an imprecise version constraint such as just `1.9` you can also get latest releases of dependencies without having to do anything! But all the big CDN's advise against this as it can break your site so use with __caution__ and avoid in production environments!!

## Compatibility

This package was built for and tested with Statamic 3 (beta) and Laravel 6.x, but should work on newer versions.

## Limitations

This is my first public package and Statamic addon. All sorts of things could be wrong! Please be gentle.

More limitations are given in the [package's readme](https://github.com/rosswintle/laravel-asset-cache/blob/master/README.md#limitations)

## Roadmap

See the [package's roadmap](https://github.com/rosswintle/laravel-asset-cache/blob/master/README.md#roadmap)

## Credits

* Thanks to [Marcel Pociot](https://twitter.com/marcelpociot) for his excellent [PHP Package Development](https://phppackagedevelopment.com/) course which helped me greatly in making this a package
* Thanks to [Ben Furfie](https://twitter.com/frontendben), [Ryan Chandler](https://twitter.com/ryangjchandler) and [Duncan McClean](https://twitter.com/damcclean) for encouragement and feedback and [Erin Dalzell](https://twitter.com/emd) for a bit of Statamic addon help.
