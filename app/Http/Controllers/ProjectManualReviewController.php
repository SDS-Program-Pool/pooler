<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProjectManualReviewController extends Controller
{
    public function index()
    {
        //$project_reviews = Auth::user()->project_manual_reviews->all();

       // dd($project_reviews);

        return view('v1.project.manual_review.index');
    }

    public function create()
    {
        $projects = Auth::user()->projects->all();

        return view('v1.project.manual_review.index', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mark'         => 'required|numeric|min:40|max:100',
            'qualfeedback' => 'required|min:3|max:500',
            'confidence'   => 'required|',
        ]);

        $mark = new ProjectMark();
        $mark->project_id = $request->route('id');
        $mark->user_id = Auth::user()->id;
        $mark->mark_percentage = $request->mark;
        $mark->qualitative_feedback = $request->qualfeedback;
        $mark->confidence = $request->confidence;
        $mark->save();

        // update the projectmarkallocation to set marked to true

        // $mark->project->setStatus('Marked by 1 user');

        return redirect()->route('tasks.index')->with('message', 'Project successfully marked.');
    }
}
