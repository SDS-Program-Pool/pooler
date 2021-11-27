<?php

namespace App\Http\Controllers\Student;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectMarkAllocation;
use App\Models\ProjectMark;
use App\Models\Project;
use App\Models\ProjectMarkReview;

class ProjectMarkReviewController extends Controller
{
    public function show(Request $request)
    {
        $marking_array = Project::whereId($request->route('id'))->with('source')->firstOrFail();

        return view('v1.markreview.show', compact('marking_array'));
        
    }

    public function mark(Request $request)
    {

        $marking_array = Project::whereId($request->route('id'))->with('source')->firstOrFail();

        return view('v1.markreview.mark', compact('marking_array'));

  
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'mark*' => 'required|numeric',
            'confidence*' => 'required|numeric',
        ]);

        $mark = new ProjectMarkReview;
        $mark->project_id = $request->route('id');
        $mark->user_id = Auth::user()->id;
        $mark->mark_percentage = $request->mark;
        $mark->qualitative_feedback = $request->qualfeedback;
        $mark->save();

       // $mark->project->setStatus('Marked by 1 user');

        return redirect()->route('tasks.index')->with('message', 'Project successfully marked.');


    }
}
