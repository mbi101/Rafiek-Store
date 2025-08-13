<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => ['ar' => 'آبل', 'en' => 'apple'],
                'category_id' => 1,
                'image' => 'assets/images/brands/iphone.png',
                'status' => 1
            ],
            [
                'name' => ['ar' => 'سامسونج', 'en' => 'sumsonge'],
                'category_id' => 1,
                'image' => 'assets/images/brands/samsung.webp',
                'status' => 1
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
