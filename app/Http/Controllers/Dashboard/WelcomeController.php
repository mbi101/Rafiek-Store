<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('dashboard.welcome');
    }
}
