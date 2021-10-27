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
use App\Models\User;


class ProjectController extends Controller
{
    public function index()
    {

        $project_data = Project::whereUserId(Auth::id())->get();

        // tldr need to setup some more relations to get more project data

        return view('v1.project.index', compact('project_data'));

    }

    public function create()
    {

        return view('v1.project.create');

    }

    public function store(Request $request)
    {
        // Upload Zip

            // Code Upload Function pass the zip to it


        // Trigger Project Creation
        
        $projectStrategy = $this->projectStrategy()->create($request);

        dd($project_data);
            
        // Trigger Team Creation

        $teamStrategy = $this->teamStrategy()->create($request);

        // Allocate Zip file to Team

        // Return View to user with success or errors.

       // return view('v1.project.index');

    }

    public function teamStrategy()
    {

        // Strategy Pattern to call correct function for business logic

        $team_type = request('team_type');
        
        $strategy = [

            'individual' => new IndividualTeamCreation,
            'team_feature_branch' => new FeatureBranchTeamCreation,
            'team_individual' => new TeamCreation,
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
