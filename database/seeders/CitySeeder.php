<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        City::truncate();


        // Define cities
        $cities = include database_path('data/cities.php');
        $finalData = [];

        foreach ($cities as $city) {
            $finalData[] = [
                'id' => $city['id'],
                'country_id' => $city['country_id'],
                'name' => json_encode([
                    'en' => $city['name_en'],
                    'ar' => $city['name_ar'],
                ], JSON_UNESCAPED_UNICODE),
                'code' => $city['code'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach (array_chunk($finalData, 500) as $chunk) {
            DB::table('cities')->insert($chunk);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
