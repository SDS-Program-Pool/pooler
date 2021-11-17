<?php

namespace App\Actions\CodeAllocation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * A re allocate function would need to check the markers table as well... todo.
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
            $project_mark_allocation = new ProjectMarkAllocation;

            $project_mark_allocation->project_id = $projectStrategy->id;
            $project_mark_allocation->user_id = $users_array[$markers_array];

            $project_mark_allocation->save();

            // send an email as well to the person


        }

        


    
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
                $user_id_array = array($user->user_id);
            }
        }

        return $user_id_array;
        
    }

}
