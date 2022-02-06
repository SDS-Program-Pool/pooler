<?php

namespace App\Actions\CodeAllocation;

use App\Models\ProjectMarkEscalation;
use App\Models\User;
use App\Models\ProjectMarkAllocation;
use App\Notifications\MarkAllocation;

class MarkEscalation
{

    public function escalate($projectId)
    {
        if(ProjectMarkEscalation::whereProjectId($projectId)->exists() === true){

            return redirect()->route('projects.index')->with('message', 'Already escalated')->send();

        }

        $users = User::wherecan_review_escalation(true)->whereIsStudent(true)->get('id')->toarray();

        if (sizeof($users) < 3) {
            // log unavail to allocate the project, manual allocation required.

            return redirect()->route('projects.index')->with('message', 'Unable to escalate project to a marker. Email a sysadmin')->send();
            // ^^ programatically handle this at some point
        }

        $markers_array = array_rand($users, 3);

        // requires error handling for if less than 3 people to send it to

        // drop previous markers who have not taken project

        $rejected_markers = ProjectMarkAllocation::whereProjectId($projectId)->whereTakenByUser(0)->delete();

        foreach($markers_array as $array)
        {
            $project_mark_allocation = new ProjectMarkAllocation();

            $project_mark_allocation->project_id = $projectId;
            $project_mark_allocation->user_id = $users[$array]['id'];

            $project_mark_allocation->save();

            $user = User::whereId($project_mark_allocation->user_id)->firstOrFail();
            $user->notify(new MarkAllocation());
            
        }

        $ProjectMarkEscalation = new ProjectMarkEscalation();
        $ProjectMarkEscalation->project_id = $projectId;
        $ProjectMarkEscalation->save();
        
        return redirect()->route('projects.index')->with('message', 'Escalation successful')->send();
    }

}