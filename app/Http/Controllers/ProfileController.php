<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        dd($user);

        return view('v1.settings.profile.index', compact('user'));
    }
}
