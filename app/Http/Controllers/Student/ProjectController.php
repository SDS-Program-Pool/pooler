<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Actions\Team\IndividualTeamCreation as IndividualTeamCreation;
use App\Actions\Team\FeatureBranchTeamCreation as FeatureBranchTeamCreation;
use App\Actions\Team\TeamCreation as TeamCreation;

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

        // Validate the ZIP File

        // Upload the ZIP File

        // Error Handling for ZIP File

        // Pass over to projectStrategy

        $projectStrategy = $this->projectStrategy()->create($request);

    //  $demo = new IndividualTeamCreation;

      //$test = $demo->hello();

      //print_r($test);

       // $data = $this->projectStrategy()->create($request);


      dd($request['team_type']);

       // return view('v1.project.index');

    }

    public function projectStrategy()
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
