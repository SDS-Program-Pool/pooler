<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectMark;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $markAverage = ProjectMark::avg('mark_percentage');
        $projectsRequiringAttention = Project::get();

        return view('v1.staff.dashboard.index', compact('projectCount','markAverage','projectsRequiringAttention'));
    }
}
