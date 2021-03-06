<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('v1.settings.profile.index', compact('user'));
    }
}
