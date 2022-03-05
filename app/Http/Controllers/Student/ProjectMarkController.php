<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectMark;
use App\Models\ProjectMarkAllocation;
use App\Models\User;
use App\Actions\CodeAllocation\AcceptReject;
use App\Notifications\ProjectFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectMarkController extends Controller
{
    public function __construct(AcceptReject $AcceptReject)
    {
        $this->AcceptReject = $AcceptReject;
    }

    public function show(Request $request)
    {
        $marking_array = Project::whereId($request->route('id'))->with('source')->firstOrFail();

        return view('v1.mark.show', compact('marking_array'));
    }

    public function mark(Request $request)
    {
        $marking_array = Project::whereId($request->route('id'))->with('source')->firstOrFail();

        return view('v1.mark.mark', compact('marking_array'));
    }

    public function acceptOrReject(Request $request)
    {
        $validated = $request->validate([
            'take_project' => 'required|boolean',
        ]);

        $this->AcceptReject->handleProject($request);
    
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mark'         => 'required|numeric|min:0|max:100',
            'qualfeedback' => 'required|min:3|max:4000',
            'confidence'   => 'required|in:high,medium,low',
        ]);

        $mark = new ProjectMark();
        $mark->project_id = $request->route('id');
        $mark->user_id = Auth::user()->id;
        $mark->mark_percentage = $request->mark;
        $mark->qualitative_feedback = $request->qualfeedback;
        $mark->confidence = $request->confidence;
        $mark->save();

        $ProjectMarkAllocation = ProjectMarkAllocation::whereProjectId($request->route('id'))->whereUserId(Auth::user()->id)->firstOrFail();
        $ProjectMarkAllocation->marked = true;
        $ProjectMarkAllocation->save();

        $project = Project::whereId($request->route('id'))->first();

        foreach ($project->ProjectTeamMembers as $user_id) {
            $user = User::whereId($user_id)->firstOrFail();
            $user->notify(new ProjectFeedback($project));
        }

        $project->setStatus('Marked by 1 user');

        return redirect()->route('tasks.index')->with('message', 'Project successfully marked.');
    }
}
