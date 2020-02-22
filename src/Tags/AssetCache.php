<?php
/*
 * Tag for my LaravelAssetCache package: https://github.com/rosswintle/laravel-asset-cache/
 *
 * This grabs the asset file from the specified npm package from jsdelivr.net, and caches and serves it locally
 *
 * Before use you'll need to:
 *    composer require rosswintle/laravel-asset-cache
 *    php artisan storage:link (in all environments)
 *
 * Tag usage: {{ asset_cache package='alpinejs' version='' file='dist/alpine.min.js' }}
 *
 */
namespace RossWintle\StatamicAssetCache\Tags;

use Statamic\Tags\Tags;
use RossWintle\LaravelAssetCache\Facades\LaravelAssetCache;

class AssetCache extends Tags
{
    /**
     * The {{ asset_cache }} tag
     *
     * @return string|array
     */
    public function index()
    {
        return LaravelAssetCache::cachedAssetUrl(
            $this->params->get('package'),
            $this->params->get('version') ?? '',
            $this->params->get('file') ?? ''
        );
    }
}