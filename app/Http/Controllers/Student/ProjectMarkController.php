<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectMark;
use App\Models\ProjectMarkAllocation;
use App\Models\User;
use App\Notifications\ProjectFeedback;
use App\Notifications\ProjectRejected;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectMarkController extends Controller
{
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

        if ($request->take_project == true) {
            // Project taken (YES they'll mark it)
            $ProjectMarkAllocation = ProjectMarkAllocation::whereProjectId($request->route('id'))->whereUserId(Auth::id())->firstOrFail();
            $ProjectMarkAllocation->taken_by_user = true;
            $ProjectMarkAllocation->save();

            $ProjectMarkAllocation->project->setStatus('Project Taken for Marking');

            return redirect()->route('marking.mark', $request->route('id'));
        } elseif ($request->take_project == false) {
            // Project rejected
            $ProjectMarkAllocation = ProjectMarkAllocation::whereProjectId($request->route('id'))->whereUserId(Auth::user()->id)->firstOrFail();
            $ProjectMarkAllocation->taken_by_user = false;
            $ProjectMarkAllocation->save();

            $staff_members = User::whereIsStaff(true)->get();

            foreach ($staff_members as $staff_member) {
                $user = User::whereId($staff_member->id)->firstOrFail();
                $user->notify(new ProjectRejected($request->route('id')));
            }

            $ProjectMarkAllocation->project->setStatus('Project rejected for Marking by a marker');

            return redirect()->route('tasks.index')->with('message', 'Project Rejected!');
        }

        return redirect()->route('tasks.index')->with('message', 'How have you got here!');
        // could remove elseif statement and just have the code so if somehow the validation fails the logic just defaults to reject??? C.T
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mark'         => 'required|numeric|min:40|max:100',
            'qualfeedback' => 'required|min:3|max:500',
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
