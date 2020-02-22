<?php

namespace RossWintle\StatamicAssetCache;

use Statamic\Providers\AddonServiceProvider;

class StatamicAssetCacheServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        \RossWintle\StatamicAssetCache\Tags\AssetCache::class
    ];
}