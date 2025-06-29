<?php

namespace App\Repositories;


use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleRepository
{
    public function getRole($id)
    {
        return Role::find($id);
    }

    public function saveRole($request, $type, $role = null)
    {
        $key = $this->generateUniqueRoleKey($request->name['en']);

        if ($type == 'create') {
            $role = Role::query()->create([
                'key' => $key,
                'name' => [
                    'ar' => $request->name['ar'],
                    'en' => $request->name['en'],
                ],
            ]);
        } else {
            $role->update([
                'key' => $key,
                'name' => [
                    'ar' => $request->name['ar'],
                    'en' => $request->name['en'],
                ],
            ]);
        }

        $permissionIds = collect($request->permissions ?? [])
            ->pluck('id')
            ->unique()
            ->toArray();

        $permissions = Permission::query()->whereIn('id', $permissionIds)->get()->keyBy('id');

        $syncData = [];

        foreach ($request->permissions ?? [] as $item) {
            $permission = $permissions[$item['id']] ?? null;

            if ($permission) {
                $options = $item['options'] ?? [];
                $syncData[$permission->id] = [
                    'allowed_options' => json_encode($options),
                ];
            }
        }

        if ($type == 'create') {
            $role->permissions()->syncWithoutDetaching($syncData);
        } else {
            $role->permissions()->sync($syncData);
        }

        return $role;
    }

    public function getRoles()
    {
        return Role::query()->select('id', 'name')->with('permissions')->withCount('admins')->paginate(6);
    }

    public function getPermissions()
    {
        return Permission::query()->select('id', 'key', 'name', 'options')->get();
    }

    public function updateRole($request, $role)
    {
        return $role->update([
            'name' => $request->role,
            'permissions' => json_encode($request->permessions),
        ]);

    }

    public function destroy($role)
    {
        return $role->delete();
    }

    function generateUniqueRoleKey($name): string
    {
        $baseKey = Str::slug($name, '_');
        $key = $baseKey;

        $i = 2;
        while (Role::query()->where('key', $key)->exists()) {
            $key = $baseKey . $i;
            $i++;
        }

        return $key;
    }

}
