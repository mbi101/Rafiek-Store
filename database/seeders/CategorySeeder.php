<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => ['en' => 'electronic', 'ar' => 'الإلكترونيات'],
                'parent' => null,
                'status' => rand(0, 1),
            ],
            [
                'name' => ['en' => 'fashion', 'ar' => 'الملابس'],
                'parent' => null,
                'status' => rand(0, 1),
            ],

            [
                'name' => ['en' => 'sports', 'ar' => 'الرياضة'],
                'parent' => null,
                'status' => rand(0, 1),
            ],
        ];

        foreach ($data as $cat) {
            Category::create($cat);
        }
    }
}
