<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AuthController extends Controller implements HasMiddleware
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public static function middleware()
    {
        return [
            new Middleware(middleware: 'guest:admin', except: ['logout']),
        ];
    }

    public function login()
    {
        return view('dashboard.pages.auth.login');
    }

    public function storeLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if ($this->authService->login($credentials, 'admin', $request->remember_me)) {
            return redirect()->intended(route('dashboard.home'));
        }
        return redirect()->back()->withErrors(['email' => __('dashboard.not_match')]);
    }


    public function logout()
    {
        $this->authService->logout('admin');
        return redirect()->route('dashboard.login');
    }

    public function forgetPassword()
    {

    }
}
