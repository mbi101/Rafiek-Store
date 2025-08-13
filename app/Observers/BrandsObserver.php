<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class BrandsObserver
{

    public function created($model)
    {
        Cache::forget('brands_count');
    }
    public function updated($model)
    {
        Cache::forget('brands_count');
    }
    public function deleted($model)
    {
        Cache::forget('brands_count');
    }
    public function restored($model)
    {
    }
    public function forceDeleted($model)
    {
    }

}
