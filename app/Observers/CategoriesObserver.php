<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class CategoriesObserver
{

    public function created($model)
    {
        Cache::forget('categories_count');
    }
    public function updated($model)
    {
        Cache::forget('categories_count');
    }
    public function deleted($model)
    {
        Cache::forget('categories_count');
    }
    public function restored($model)
    {
    }
    public function forceDeleted($model)
    {
    }

}