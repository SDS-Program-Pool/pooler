<?php

namespace App\Actions\Team;

use App\Models\ProjectTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndividualTeamCreation
{
    public function create(Request $request, $project)
    {
        $validated = $request->validate([
            //'team_type' => 'required|in:IndividualTeamCreation,FeatureBranchTeamCreation,TeamCreation',
            //'file' => 'required|mimes:tar,zip',
        ]);

        // Uncomment this at a later date once main dev stuff is sorted ^^^^

        $team = new ProjectTeam();

        $team->user_id = Auth::id();
        $team->project_id = $project->id;
        $team->is_owner = true;
        $team->save();

        // Why is this model here?? for DRY it should be a seperate class/func in the Team dir C.T 09-11-21

        $member = new AddMember();
        $member->create($team, $request);

        $return = [
            'team'   => $team,
            'member' => $member,
        ];

        return $return;
    }
}
