<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use App\Http\Requests\Dashboard\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('dashboard.pages.auth.login');
    }

    public function storeLogin(LoginRequest $request)
    {
        return $request;
    }

    public function register()
    {
        return view('dashboard.pages.auth.register');
    }

    public function storeRegister(RegisterRequest $request)
    {
        return $request;
    }
}
