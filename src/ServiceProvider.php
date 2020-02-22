<?php

namespace RossWintle\StatamicAssetCache;

use Statamic\Providers\AddonServiceProvider;
use RossWintle\StatamicAssetCache\Tags\AssetCache;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        AssetCache::class,
    ];
}