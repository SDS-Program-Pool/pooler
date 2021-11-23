<?php

namespace App\Http\Controllers\Student;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectMarkAllocation;
use App\Models\Project;


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

        if($request->take_project == TRUE)
        {
            // Project taken (YES they'll mark it)
            $ProjectMarkAllocation = ProjectMarkAllocation::whereProjectId($request->route('id'))->whereUserId(Auth::id())->firstOrFail();
            $ProjectMarkAllocation->taken_by_user = TRUE;
            $ProjectMarkAllocation->save();

            return redirect()->route('marking.mark',$request->route('id'));


        }
        elseif($request->take_project == FALSE)
        {
            // Project rejected
            $ProjectMarkAllocation = ProjectMarkAllocation::whereProjectId($request->route('id'))->whereUserId(Auth::user()->id)->firstOrFail();
            $ProjectMarkAllocation->taken_by_user = FALSE;
            $ProjectMarkAllocation->save();

            return redirect()->route('tasks.index')->with('message', 'Project Rejected!');

        }
        return redirect()->route('tasks.index')->with('message', 'How have you got here!');
    

    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'mark' => 'required|numeric',
            'qualfeedback' => 'required',
        ]);

    }
}
