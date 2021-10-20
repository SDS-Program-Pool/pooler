<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('v1.project.index');
    }

    public function create()
    {
        return view('v1.project.create');
    }

    public function store(Request $request)
    {

        $data = $this->projectStrategy()->create($request);

        return view('v1.project.index');

    }

    public function projectStrategy()
    {

        $team_type = request('team_type');

        $strategy = [

            'individual' => new P2PMailing,
            'team_feature_branch' => new Shiptheory,
            'team' => new Shiptheory,
        ];

        if(! array_key_exists($team_type, $strategy))
        {
            throw new \Exception("Could not find team type strategy");
            
        }

        return($strategy[$team_type]);

    }

}
