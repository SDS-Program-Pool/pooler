<?php

namespace App\Http\Controllers\Student;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectMarkAllocation;


class ProjectMarkController extends Controller
{
    public function index()
    {

        $mark_data = ProjectMarkAllocation::whereUserId(Auth::id())->get();

        return view('v1.mark.index', compact('mark_data'));
    }
}
