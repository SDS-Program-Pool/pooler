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

    public function first_allocation()
    {

        $project_data = Project::get('id');
        $project_allocation_data = ProjectMarkAllocation::all('project_id');
    
       foreach($project_data as $data)
       {
           $project_id_array[] = ($data->id);
       }

       foreach($project_allocation_data as $data)
       {
           $project_alloc_id_array[] = ($data->project_id);
       }

       $diff = array_diff($project_id_array, $project_alloc_id_array); // Projects that have NOT been allocated i.e not in our ProjectAlloc table

       // Time to Allocate
    
       // find the users who are in team_members who are on this proj.
       // Search users table to generate array
       // Remove those working on it from the array
       // random allocate provided that they have not got more than 3 (weighting system.)


       // We know what projects have not been allocated
       // We need to run a sql query and get all data e.g user_id

        $all_users = User::get('id');

        foreach($all_users as $user)
        {
            
        }

        $test = Project::with('team_members')->get();

        foreach($test as $data)
        {
            foreach($data->team_members as $team_members)
            {
               $members[] = $team_members->user_id;
            }

            //dump($data->team_members);
        }

        $diff2 = array_diff($all_users, $members);

        dd($diff2);

    //dump($test);
    
    }

}
