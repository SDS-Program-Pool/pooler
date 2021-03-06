<?php

namespace App\Actions\Team;

use App\Models\ProjectTeamMember;
use Illuminate\Support\Facades\Auth;

class AddMember
{
    public function create($project_team, $request)
    {

        // Add a team member
        // add record to DB
        // Verify email if the current user is not equal to the user being added

        $teamMember = new ProjectTeamMember();

        $teamMember->project_team_id = $project_team->id;
        $teamMember->user_id = Auth::id();

        // if($request) need the consent if statement here..
        $teamMember->consent = true;

        $teamMember->save();

        return $teamMember;
    }
}
