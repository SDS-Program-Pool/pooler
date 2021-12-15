<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class StudentController extends Controller
{
    public function index()
    {
        $userData = User::all();
        // must be fixed to only show students, not staff.
        // to be fixed

        return view('v1.staff.students.index', compact('userData'));
    }
}