<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectMark;
use App\Models\ProjectMarkReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectMarkReviewController extends Controller
{
    public function show(Request $request)
    {
        $projectArray = Project::whereId($request->route('id'))->with('source','marks')->firstOrFail();

        return view('v1.markreview.show', compact('projectArray'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mark*'       => 'required|array:mark',
            'confidence' => 'required|in:high,medium,low',
        ]);

        $mark = new ProjectMarkReview();
        $mark->project_id = $request->route('id');
        $mark->user_id = Auth::user()->id;
        $mark->mark_percentage = $request->mark;
        $mark->qualitative_feedback = $request->qualfeedback;
        $mark->save();

        // $mark->project->setStatus('Marked by 1 user');

        return redirect()->route('tasks.index')->with('message', 'Project successfully mark marked.');
    }
}
