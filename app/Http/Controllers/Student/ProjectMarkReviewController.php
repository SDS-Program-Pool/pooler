<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectMarkReview;
use App\Models\ProjectMarkReviewMark;
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
            'confidence' => 'required|in:high,medium,low',
            'mark_percentage.*.percentage' => 'required|numeric|min:0|max:100',

        ]);
    
        $mark = new ProjectMarkReview;
        $mark->project_id = $request->route('id');
        $mark->user_id = Auth::user()->id;
        $mark->confidence = $request->confidence;
        $mark->save();

        $markId = $mark->id;

        foreach($request->mark_percentage as $percentageArray)
        {
        
            $mark = new ProjectMarkReviewMark;
            $mark->project_mark_review_id = $markId;
            $mark->marks_id = $percentageArray['mark_id'];
            $mark->user_id = Auth::user()->id;
            $mark->percentage = $percentageArray['percentage'];
            $mark->save();

        }

        // $mark->project->setStatus('Marked by 1 user');

        return redirect()->route('tasks.index')->with('message', 'Project successfully mark marked.');
    }
}
