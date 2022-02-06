<?php

namespace App\Actions\CodeAllocation;

use App\Actions\CodeAllocation\Allocation;
use App\Models\ProjectMarkAllocation;
use Illuminate\Support\Facades\Auth;

class AcceptReject
{
    public function __construct(Allocation $Allocation)
    {
        $this->Allocation = $Allocation;
    }

    public function handleProject($request)
    {
        if ($request->take_project == true) {
            // Project taken (YES they'll mark it)

            $ProjectMarkAllocation = ProjectMarkAllocation::whereProjectId($request->route('id'))->whereUserId(Auth::id())->firstOrFail();
            $ProjectMarkAllocation->taken_by_user = true;
            $ProjectMarkAllocation->save();
    
            $ProjectMarkAllocation->project->setStatus('Project Taken for Marking');

            return redirect()->route('marking.mark', $request->route('id'))->send();

        }
        else {
            // Project rejected

            $rejected_markers = ProjectMarkAllocation::whereProjectId($request->route('id'))->whereUserId(Auth::user()->id)->delete();
           // $rejected_markers->project->setStatus('Project Rejected for Marking, Reallocation in progress');

            $this->Allocation->re_allocate($request->route('id'));

            return redirect()->route('tasks.index')->with('message', 'Project Rejected!')->send();
        }

    }

}
