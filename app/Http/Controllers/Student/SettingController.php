<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        return view('v1.settings.student.index');
    }
}
