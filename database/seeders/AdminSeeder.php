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

        $admin_role_id = Role::query()->where('key', 'admin')->first()->id;
        $manager_role_id = Role::query()->where('key', 'manager')->first()->id;
        $supervisor_role_id = Role::query()->where('key', 'sales_supervisor')->first()->id;
        Admin::query()->create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role_id' => $admin_role_id,
        ]);
        Admin::query()->create([
            'name' => 'manager',
            'email' => 'manager@admin.com',
            'password' => Hash::make('admin'),
            'role_id' => $manager_role_id,
        ]);
        Admin::query()->create([
            'name' => 'Supervisor',
            'email' => 'supervisor@admin.com',
            'password' => Hash::make('admin'),
            'role_id' => $supervisor_role_id,
        ]);

    }
}
