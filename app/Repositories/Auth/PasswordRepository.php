<?php

namespace App\Repositories\Auth;


use App\Models\Admin;
use Ichtrojan\Otp\Otp;

class PasswordRepository
{
    protected $otp;

    public function __construct()
    {
        $this->otp = new Otp();
    }


    public function getAdminByEmail($email)
    {
        return Admin::query()->where('email', $email)->first();
    }

    public function verifyOtp($data)
    {
        return $this->otp->validate($data['email'], $data['code']);
    }

    public function resetPassword($email, $password)
    {
        $admin = self::getAdminByEmail($email);
        return $admin->update([
            'password' => bcrypt($password),
        ]);
    }
}
