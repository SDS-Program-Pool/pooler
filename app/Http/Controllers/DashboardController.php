<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hour = date('H');
        $dayTerm = ($hour > 17) ? 'Evening' : (($hour > 12) ? 'Afternoon' : 'Morning');

        return view('v1.dashboard.student', compact('dayTerm'));

    }
}
