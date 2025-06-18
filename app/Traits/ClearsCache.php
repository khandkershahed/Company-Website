<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait ClearsCache
{
    public static function clearOnSave(array $cacheKeys)
    {
        static::saved(function () use ($cacheKeys) {
            foreach ($cacheKeys as $key) {
                Cache::forget($key);
            }
        });

        static::deleted(function () use ($cacheKeys) {
            foreach ($cacheKeys as $key) {
                Cache::forget($key);
            }
        });
    }
}
