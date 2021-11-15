<?php

namespace App\Actions\CodeAllocation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Actions\Team\IndividualTeamCreation;
use App\Actions\Team\FeatureBranchTeamCreation;
use App\Actions\Team\TeamCreation;
use App\Actions\Project\ProjectCreate;
use App\Actions\CodeUpload\Upload;

use App\Models\Project;
use App\Models\ProjectMarkAllocation;
use App\Models\User;
use App\Models\ProjectTeamMember;


class Allocation
{

    public function first_allocation($projectStrategy,$teamStrategy)
    {

        $team_members = $this->team_members($projectStrategy->id);

        $test = User::whereNotIn('id',$team_members)->get();

        dd($test);

        


    
    }

    /**
     * Return a collection of users who are working on an individual team project
     */
    private function team_members($project_id)
    {

        $projects =  Project::with('team_members')->whereId($project_id)->get();

        foreach($projects as $project)
        {
            foreach($project->team_members as $user)
            {
                $user_id = array($user->user_id);
            }

        }

        return $user_id;

        
    }

}
