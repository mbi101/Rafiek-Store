<?php

namespace Database\Seeders;

use App\Models\Role;
use DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $permissions = [];
        foreach (config('permissions_en') as $permission => $value) {
            $permissions[] = $permission;
        }

        Role::query()->create([
            'name' => [
                'ar' => 'المشرف الرئيسي',
                'en' => 'Super Admin',
            ],
            'permissions' => json_encode($permissions),
        ]);

    }
}
