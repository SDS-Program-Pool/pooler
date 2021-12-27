<?php

namespace App\Http\Controllers\Staff;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projectData = Project::all();

        return view('v1.staff.projects.index', compact('projectData'));
    }
    public function show(Request $request)
    {
        $projectData = Project::all();

        return view('v1.staff.projects.index', compact('projectData'));
    }
}
