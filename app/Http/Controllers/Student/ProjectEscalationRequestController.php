<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectEscalationRequestController extends Controller
{
    public function store(Request $request)
    {
        dd($request->route('id'));
        // Allow a user to esalate their proejct to the upper marking team.
    }
}
