<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\ResetPasswordRequest;
use App\Services\Auth\PasswordService;

class ResetPasswordController extends Controller
{
    protected $PasswordService;

    public function __construct(PasswordService $PasswordService)
    {
        $this->PasswordService = $PasswordService;
    }

    public function showResetForm($email, $code)
    {
        return view('dashboard.pages.auth.password.reset', ['email' => $email, 'code' => $code]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        if (!$this->PasswordService->verifyOtp(['email' => $request->email, 'code' => $request->code])) {
            return redirect()->back()->with(['error' => __('dashboard.code_is_invalid')]);
        }

        $admin = $this->PasswordService->resetPassword($request->email, $request->password);
        if (!$admin) {
            return redirect()->back()->with(['error' => __('dashboard.try_again_later')]);
        }

        return redirect()->route('dashboard.login')->with('success', __('dashboard.password_changed_successfully'));
    }

}
