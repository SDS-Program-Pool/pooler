<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $hour = date('H');
        $dayTerm = ($hour > 17) ? 'Evening' : (($hour > 12) ? 'Afternoon' : 'Morning');

        return view('v1.dashboard.student', compact('dayTerm'));
    }
}
