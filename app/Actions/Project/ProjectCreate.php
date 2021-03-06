<?php

namespace App\Actions\Project;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectCreate
{
    public function create(Request $request)
    {
        // Create a DB record for a *new project* and return the ID back so we can play with it later.
        // Need to set the project owner.

        $validated = $request->validate([
            'team_type'    => 'required|in:IndividualTeamCreation,FeatureBranchTeamCreation,TeamCreation',
            'project_name' => 'required',
            //'file' => 'required|mimes:tar,zip',
            // 'name'
        ]);

        $id = mt_rand(1000, 1000000);

        $project = new Project();

        $project->id = $id;
        $project->user_id = Auth::id();
        $project->name = $request->project_name;

        // could refactor to switch statement as we're using plain text...? C.T
        // Could also set the rest to false to prevent any issues? e.g T,F,F
        if ($request->team_type === 'IndividualTeamCreation') {
            $project->is_team_individual = true;
        } elseif ($request->team_type === 'TeamCreation') {
            $project->is_team = true;
        } elseif ($request->team_type === 'FeatureBranchTeamCreation') {
            $project->is_team_feature_branch = true;
        } else {
            throw new \Exception('Team Type Could not be Selected Project/ProjectCreate');
        }

        $project->save();

        return $project;
    }
}
