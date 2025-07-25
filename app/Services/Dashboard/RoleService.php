<?php

namespace App\Services\Dashboard;
use App\Repositories\Dashboard\RoleRepository;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function createRole($request)
    {
        return $this->roleRepository->saveRole($request, 'create');
    }

    public function getRoles()
    {
        return $this->roleRepository->getRoles();
    }

    public function getPermissions()
    {
        return $this->roleRepository->getPermissions();
    }

    public function getRole($id)
    {
        return $this->roleRepository->getRole($id);

    }

    public function checkAdmin($role): void
    {
        abort_if($role->key == 'admin', 403);
    }

    public function existingPermissions($role)
    {
        return $role->permissions->mapWithKeys(function ($permission) {
            return [
                $permission->key => [
                    'id' => $permission->id,
                    'options' => json_decode($permission->pivot->allowed_options ?? '[]', true),
                ]
            ];
        })->toArray();
    }

    public function updateRole($request, $role)
    {
        if (!$role) {
            return false;
        }

        $this->checkAdmin($role);

        return $this->roleRepository->saveRole($request, 'update', $role);
    }

    public function destroy($role)
    {
        if ($role->admins->count() > 0 || !$role) {
            return false;
        }

        $this->checkAdmin($role);

        return $this->roleRepository->destroy($role);
    }
}
