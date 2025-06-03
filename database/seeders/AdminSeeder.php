<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use DB;
use Illuminate\Database\Seeder;

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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => $first_role_id,
        ]);
        Admin::query()->create([
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => $first_role_id,
        ]);

    }
}
