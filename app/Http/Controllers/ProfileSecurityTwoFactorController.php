<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileSecurityTwoFactorController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view("v1.profile.2fa", compact('user'));
    }
}
