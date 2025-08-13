<?php

namespace App\Repositories\Dashboard;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandRepository
{
    public function getBrands()
    {
        return Brand::withCount('products')->latest()->paginate(8);
    }
    public function getBrand($id)
    {
        return Brand::find($id);
    }
    public function createBrand($data)
    {
        return Brand::create($data);
    }
    public function updateBrand($brand, $data)
    {
        return $brand->update($data);
    }
    public function deleteBrand($brand)
    {
        return $brand->delete();
    }
}