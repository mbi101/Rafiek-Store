<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Config::get('roles');

        $availablePermissions = Config::get('permissions_list');

        // 1. Create Permissions
        foreach ($availablePermissions as $key => $data) {
            Permission::firstOrCreate(
                ['key' => $key],
                [
                    'name' => [
                        'en' => $data['en'],
                        'ar' => $data['ar']
                    ],
                    'options' => $data['options']
                ]
            );
        }

        // 2. Create Roles + Attach Permissions
        foreach ($roles as $key => $data) {
            $role = Role::firstOrCreate(['key' => $key], [
                'name' => [
                    'en' => $data['en'],
                    'ar' => $data['ar']
                ]
            ]);

            $permissions = Permission::all();

            if (in_array('*', $data['permissions'])) {
                foreach ($permissions as $permission) {
                    $role->permissions()->syncWithoutDetaching([
                        $permission->id => ['allowed_options' => json_encode($permission->options)]
                    ]);
                }
            } else {
                foreach ($data['permissions'] as $permName) {
                    $perm = $permissions->firstWhere('key', $permName);
                    if ($perm) {
                        $role->permissions()->syncWithoutDetaching([
                            $perm->id => ['allowed_options' => json_encode($perm->options)]
                        ]);
                    }
                }
            }
        }
    }

}
