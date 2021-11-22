<?php

namespace App\Http\Controllers\Student;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectMarkAllocation;
use App\Models\Project;


class ProjectMarkController extends Controller
{
    public function show(Request $request)
    {
        $marking_array = Project::whereId($request->route('id'))->with('source')->firstOrFail();

        return view('v1.mark.show', compact('marking_array'));
        
    }

    public function mark(Request $request)
    {

        $marking_array = Project::whereId($request->route('id'))->with('source')->firstOrFail();

        return view('v1.mark.mark', compact('marking_array'));

  
    }

    public function acceptOrReject(Request $request)
    {

        $validated = $request->validate([
            'take_project' => 'required|boolean',
        ]);

        
    

    }

    public function store(Request $request)
    {

    }
}
