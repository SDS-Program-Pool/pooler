<?php

namespace App\Actions\Team;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectTeam;
use App\Models\ProjectTeamMember;

class AddMember
{
    public function create($project, $request)
    {

        // Add a team member
        // add record to DB
        // Verify email if the current user is not equal to the user being added

        

      // dd($team, $request);

        $teamMember = new ProjectTeamMember;

        $teamMember->project_id = $project->project_id;
        $teamMember->user_id = Auth::id();
        
       // if($request)
        $teamMember->consent = TRUE;

        $teamMember->save();

        return $teamMember;
    }

}
