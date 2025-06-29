<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RoleRequest;
use App\Services\RoleService;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permissions = $this->roleService->getPermissions();
        $role = $this->roleService->getRole($id);
        if (!$role) {
            return back()->with('error', __('dashboard.error_msg'));
        }
        $existingPermissions = $role->permissions->mapWithKeys(function ($permission) {
            return [$permission->key => [
                'id' => $permission->id,
                'options' => json_decode($permission->pivot->allowed_options ?? '[]', true),
            ]];
        })->toArray();
        return view('dashboard.pages.roles.edit', compact(['role', 'permissions', 'existingPermissions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $role = $this->roleService->updateRole($request, $id);
        if (!$role) {
            return back()->with('error', __('dashboard.error_msg'));
        }

        flash()->success('Product created successfully!');
        return redirect()->route('dashboard.roles.index')->with('success', __('dashboard.success_msg'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = $this->roleService->destroy($id);
        if (!$role) {
            return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->back()->with('success', __('dashboard.success_msg'));

    }
}
