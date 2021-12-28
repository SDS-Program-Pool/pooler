<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Project;
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
        $project = Project::whereId($request->route('id'))->with('source', 'marks', 'mark_review_marks')->firstOrFail();

        return view('v1.staff.projects.show', compact('project'));
    }
}
