<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Admin::query()->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $first_role_id = Role::query()->first()->id;
        Admin::query()->create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role_id' => $first_role_id,
        ]);
        Admin::query()->create([
            'name' => 'manager',
            'email' => 'manager@admin.com',
            'password' => Hash::make('admin'),
            'role_id' => $first_role_id,
        ]);

    }
}
