<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Actions\Team\IndividualTeamCreation;
use App\Actions\Team\FeatureBranchTeamCreation;
use App\Actions\Team\TeamCreation;
use App\Actions\CodeUpload\Upload;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
      
        return view('v1.project.index');

        // We need a DB call here in order to show existing projects.
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
        
            // Project Creation Function
            
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

}
