<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectMarkEscalation;

class ProjectEscalationRequestController extends Controller
{
    public function __construct()
    {
        
    }
    public function store(Request $request)
    {
        // Allow a user to esalate their proejct to the upper marking team.

        $ProjectMarkEscalation = new ProjectMarkEscalation();
        $ProjectMarkEscalation->project_id = $request->route('id');
        $ProjectMarkEscalation->save();

        return redirect()->route('projects.index')->with('message', 'Project Escalated');
        
    }
}
