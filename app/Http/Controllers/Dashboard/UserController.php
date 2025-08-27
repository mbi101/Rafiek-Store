<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\City;
use App\Models\User;
use App\Services\Dashboard\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $users = $request->query()
            ? $this->userService->userSearch($request->input())
            : User::latest()->paginate(8);
        return view('dashboard.pages.users.index', compact('users'));
    }


    public function create()
    {
        return view('dashboard.pages.users.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->store($data);

        if (!$user) {
            return redirect()->back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->back()->with('success', __('dashboard.success_msg'));
    }


    public function edit(User $user)
    {
        return view('dashboard.pages.users.edit', compact('user'));
    }


    public function update(UserRequest $request, string $id)
    {
        $request->validated();
        $user = $this->userService->update($request, $id);

        if (!$user) {
            return redirect()->back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->back()->with('success', __('dashboard.success_msg'));
    }

    public function destroy(string $id)
    {
        if (!$this->userService->destroy($id)) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.error_msg'),
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.success_msg')
        ], 200);
    }

    public function changeStatus(Request $request, User $user)
    {
        $request->validate([
            'status' => ['required', 'in:0,1']
        ]);

        if (!$this->userService->changeStatus($user)) {
            return redirect()->back()->with('error', __('dashboard.error_msg'));
        }

        return redirect()->back()->with('success', __('dashboard.success_msg'));

    }

    public function activate_Disable_User(Request $request, User $user)
    {
        $request->validate([
            'active' => ['required', 'in:0,1']
        ]);

        if (!$this->userService->changeStatus($user)) {
            return redirect()->back()->with('error', __('dashboard.error_msg'));
        }

        return redirect()->back()->with('success', __('dashboard.success_msg'));
    }

}
