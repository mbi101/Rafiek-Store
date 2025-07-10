<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Country::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Define countries
        $countries = include database_path('data/countries.php');
        $finalData = [];

        foreach ($countries as $country) {
            $finalData[] = [
                'id' => $country['id'],
                'name' => json_encode([
                    'en' => $country['name_en'],
                    'ar' => $country['name_ar'],
                ], JSON_UNESCAPED_UNICODE),
                'code' => $country['code'],
                'status' => in_array((int)$country['id'], [2, 59, 112, 178]) ? 1 : 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach (array_chunk($finalData, 500) as $chunk) {
            DB::table('countries')->insert($chunk);
        }
    }
}
