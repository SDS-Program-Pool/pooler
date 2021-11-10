<?php

namespace App\Http\Controllers\Student;

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

class ProjectController extends Controller
{
    public function index()
    {


        $project_data = Project::get('id');
        $project_allocation_data = ProjectMarkAllocation::all('project_id');
    
       foreach($project_data as $data)
       {
           $project_id_array[] = ($data->id);
       }

       foreach($project_allocation_data as $data)
       {
           dump($data);
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

        $test = Project::with('team_members')->get();

        dump($test);
    
        
       





        






        //$project_data = Project::whereUserId(Auth::id())->get();

        // tldr need to setup some more relations to get more project data

        //return view('v1.project.index', compact('project_data'));

    }

    public function create()
    {

        return view('v1.project.create');

    }

    public function store(Request $request)
    {

        // Trigger Project Creation
        $projectStrategy = $this->projectStrategy()->create($request);
            
        // Trigger Team Creation
        $teamStrategy = $this->teamStrategy()->create($request, $projectStrategy);

        // Upload Zip
        $upload = new Upload;
        $upload = $upload->upload($request, $projectStrategy);

        // How do we handle this if the upload zip fails?? auto delete project stratgey automagically, let user delete, cron job deletion??

        // Send an email notif to the user to let them know all is okay.

        // Allocate Code


        $project_data = Project::whereUserId(Auth::id())->get();

        return redirect()->route('projects.index')->with('message', 'Project Created!');

    }

    public function show(Request $request)
    {

        $project_data = Project::whereUserId(Auth::id())->whereId($request->route('id'))->firstOrFail();

        return view('v1.project.show', compact('project_data'));

    }

    public function teamStrategy()
    {

        // Validate that the team type exists do this... C.T 

        // Strategy Pattern to call correct function for business logic

        $team_type = request('team_type');
        
        $strategy = [

            'IndividualTeamCreation' => new IndividualTeamCreation,
            'FeatureBranchTeamCreation' => new FeatureBranchTeamCreation,
            'TeamCreation' => new TeamCreation,
        ];

        if(! array_key_exists($team_type, $strategy))
        {
            throw new \Exception("Could not find team type strategy");
            
        }

        return($strategy[$team_type]);

    }

    public function projectStrategy()
    {

        // Do not technically *need* this, but keeping if team creation types ever changes.
        // Could refactor to upload style...??

        $team_type = 'create';
        
        $strategy = [

            'create' => new ProjectCreate,

        ];

        if(! array_key_exists($team_type, $strategy))
        {
            throw new \Exception("Could not find project create strategy");
            
        }

        return($strategy[$team_type]);

    }

}
