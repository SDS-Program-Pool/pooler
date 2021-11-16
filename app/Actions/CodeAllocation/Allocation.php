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

    /**
     * Get Team Members via team_members private function 
     * Get ALL users through users private function
     * Find all users where not in the project
     * Generate array of users IDs via foreach loop (more efficient way to do this)
     * Store Record into DB
     */
    public function first_allocation($projectStrategy,$teamStrategy)
    {

        $team_members = $this->team_members($projectStrategy->id);

        $users = User::whereNotIn('id',$team_members)->get();

        foreach($users as $user){

            $users_array[] = $user->id;

        }


        // Generate the array keys of 3 random markers
        $markers_array = array_rand($users_array,3);

        // Generate the user ID's of those based on the array keys from above
        

        foreach($markers_array as $markers_array)
        {
            print_r($users_array[$markers_array]);

        }

        //$new_marker = new Projectmarker
        


    
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
