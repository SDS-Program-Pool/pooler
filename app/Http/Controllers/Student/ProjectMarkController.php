<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectMarkController extends Controller
{
    public function index()
    {

        $mark_data = Project::whereUserId(Auth::id())->get();

        return view('mark.index', compact('mark_data'));
    }
}
