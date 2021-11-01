<?php

namespace App\Actions\Team;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Team;

class IndividualTeamCreation
{
    public function create(Request $request, $project)
    {
        // create a team
        // add team members
        // could have a seperate file class for team member creation

        $validated = $request->validate([
            //'team_type' => 'required|in:IndividualTeamCreation,FeatureBranchTeamCreation,TeamCreation',
            //'file' => 'required|mimes:tar,zip',
        ]);

        // Uncomment this at a later date once main dev stuff is sorted ^^^^

        $team = new Team;

        $team->user_id = Auth::id();
        $team->project_id = $project->id;
        $team->isOwner = TRUE;

        $team->save();

        return ($team);

    }

}
