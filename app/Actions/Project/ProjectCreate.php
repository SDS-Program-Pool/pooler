<?php

namespace App\Actions\Project;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;


class ProjectCreate
{
    public function create(Request $request)
    {
        // Create a DB record for a *new project* and return the ID back so we can play with it later.
        // Need to set the project owner.

        $validated = $request->validate([
            'team_type' => 'required|in:IndividualTeamCreation,FeatureBranchTeamCreation,TeamCreation',
            //'file' => 'required|mimes:tar,zip',
        ]);

        $project = new Project;

        $project->user_id = Auth::id();

        // could refactor to switch statement as we're using plain text...? C.T
        // Could also set the rest to false to prevent any issues? e.g T,F,F
        if($request->team_type === 'IndividualTeamCreation'){

            $project->is_team_individual = TRUE;
        }
        elseif($request->team_type === 'TeamCreation'){

            $project->is_team = TRUE;
        }
        elseif($request->team_type === 'FeatureBranchTeamCreation'){

            $project->is_team_feature_branch = TRUE;
        }
        else{
            throw new \Exception("Team Type Could not be Selected Project/ProjectCreate");
        }

        $project->save();

        return($project);

    }

}
