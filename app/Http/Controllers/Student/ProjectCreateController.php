<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectCreateController extends Controller
{
    public function index()
    {
        return view('v1.project.create.index');
    }
}
