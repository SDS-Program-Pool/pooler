<?php

namespace App\Actions\CodeAllocation;

use App\Models\ProjectMarkEscalation;
use App\Models\User;
use App\Models\ProjectMarkAllocation;
use App\Notifications\MarkAllocation;

class MarkEscalation
{
    public function __construct()
    {

    }

    public function escalate($projectId)
    {

        $users = User::wherecan_review_escalation(true)->whereIsStudent(true)->get('id')->toarray();

        $markers_array = array_rand($users, 3);

        foreach($markers_array as $array)
        {
            $project_mark_allocation = new ProjectMarkAllocation();

            $project_mark_allocation->project_id = $projectId;
            $project_mark_allocation->user_id = $users[$array]['id'];

            $project_mark_allocation->save();

            $user = User::whereId($project_mark_allocation->user_id)->firstOrFail();
            $user->notify(new MarkAllocation());
            
        }

        // Select users with can_review_escalation
    }

    private function get_reviewers()
    {
        $users = User::wherecan_review_escalation(true)->whereIsStudent(true)->get();
        return $users;

    }


}