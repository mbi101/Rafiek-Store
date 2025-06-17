<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\ForgotPasswordRequest;
use App\Http\Requests\Dashboard\Auth\RecoverPasswordRequest;
use App\Services\Auth\PasswordService;

class ForgotPasswordController extends Controller
{
    protected $passwordService;

    public function __construct(PasswordService $passwordService)
    {
        $this->passwordService = $passwordService;
    }

    public function showEmailForm()
    {
        return view('dashboard.pages.auth.password.email');
    }

    public function sendOtp(RecoverPasswordRequest $request)
    {
        $admin = $this->passwordService->sendOtp($request->email);
        if (!$admin) {
            return redirect()->back()->withErrors(['email' => __('passwords.email_is_not_registered')]);
        }
        return redirect()->route('dashboard.password.verify', ['email' => $admin->email]);
    }

    public function showOtpForm($email)
    {
        return view('dashboard.pages.auth.password.confirm', ['email' => $email]);
    }

    public function verifyOtp(ForgotPasswordRequest $request)
    {
        $data = $request->only('email', 'code');

        if (!$this->passwordService->verifyOtp($data)) {
            return redirect()->back()->withErrors(['code' => __('dashboard.code_is_invalid')]);
        }
        return redirect()->route('dashboard.password.reset', ['email' => $request->email, 'code' => $request->code]);
    }
}
