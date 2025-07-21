<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class CacheInvalidationObserver
{

    public function created($model)
    {
        Cache::forget('dashboard_counts');
    }
    public function updated($model)
    {
        Cache::forget('dashboard_counts');
    }
    public function deleted($model)
    {
        Cache::forget('dashboard_counts');
    }
    public function restored($model)
    {
    }
    public function forceDeleted($model)
    {
    }

}