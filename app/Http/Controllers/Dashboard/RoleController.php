<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RoleRequest;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'check_permission:roles', only: ['index']),
            new Middleware(middleware: 'check_permission:roles.create', only: ['create', 'store']),
            new Middleware(middleware: 'check_permission:roles.update', only: ['edit', 'update']),
            new Middleware(middleware: 'check_permission:roles.delete', only: ['destroy']),
        ];
    }

    public function index()
    {
        $roles = $this->roleService->getRoles();
        $permissions = $this->roleService->getPermissions();
        return view('dashboard.pages.roles.index', compact(['roles', 'permissions']));
    }

    public function create()
    {
        $permissions = $this->roleService->getPermissions();
        return view('dashboard.pages.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = $this->roleService->createRole($request);
        if (!$role) {
            return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->route('dashboard.roles.index')->with('success', __('dashboard.success_msg'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {

        $this->roleService->checkAdmin($role);

        $permissions = $this->roleService->getPermissions();

        $existingPermissions = $this->roleService->existingPermissions($role);

        return view('dashboard.pages.roles.edit', compact(['role', 'permissions', 'existingPermissions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role = $this->roleService->updateRole($request, $role);
        if (!$role) {
            return back()->with('error', __('dashboard.error_msg'));
        }

        return redirect()->route('dashboard.roles.index')->with('success', __('dashboard.success_msg'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $this->roleService->destroy($role);
        return redirect()->back()->with('success', __('dashboard.success_msg'));
    }
}
