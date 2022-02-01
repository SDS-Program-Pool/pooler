<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectMarkEscalation;
use App\Actions\CodeAllocation\MarkEscalation;

class ProjectEscalationRequestController extends Controller
{
    public function __construct(MarkEscalation $markEscalation)
    {
        $this->markEscalation = $markEscalation;
    }
    public function store(Request $request)
    {
        $this->markEscalation->escalate($request->route('id'));

        $ProjectMarkEscalation = new ProjectMarkEscalation();
        $ProjectMarkEscalation->project_id = $request->route('id');
        $ProjectMarkEscalation->save();

        return redirect()->route('projects.index')->with('message', 'Project Escalated');
        
    }
}
