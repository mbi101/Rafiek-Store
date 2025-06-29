<?php

namespace App\Services;

use App\Repositories\RoleRepository;

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

    public function updateRole($request, $id)
    {
        $role = $this->roleRepository->getRole($id);
        if (!$role) {
            return false;
        }
        return $this->roleRepository->saveRole($request, 'update', $role);
    }

    public function destroy($id)
    {
        $role = $this->roleRepository->getRole($id);

        if ($role->admins->count() > 0 || !$role) {
            return false;
        }

        return $this->roleRepository->destroy($role);
    }
}
