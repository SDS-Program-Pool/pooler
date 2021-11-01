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

        $validated = $request->validate([
            //'team_type' => 'required|in:IndividualTeamCreation,FeatureBranchTeamCreation,TeamCreation',
            //'file' => 'required|mimes:tar,zip',
        ]);

        $team = new Team;

        $team->user_id = Auth::id();

        dd($project->id);

    }

}
