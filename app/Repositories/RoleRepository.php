<?php

namespace App\Repositories;


use App\Models\Role;

class RoleRepository
{
    public function getRole($id)
    {
        return Role::find($id);
    }

    public function createRole($request)
    {
        $role = Role::create([
            'role' => [
                'ar' => $request->role['ar'],
                'en' => $request->role['en'],
            ],
            'permission' => json_encode($request->permessions),
        ]);

        return $role;

    }

    public function getRoles()
    {
        return Role::query()->select('id', 'name')->withCount('admins')->paginate(6);
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

}
