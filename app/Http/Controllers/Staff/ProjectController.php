<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        return view('v1.staff.projects.index');
    }
}
