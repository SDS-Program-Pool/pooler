<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ProjectMarkAllocation;
use App\Models\ProjectMarkReviewAllocation;


class TaskController extends Controller
{
    public function index()
    {
        $marking_array = ProjectMarkAllocation::whereUserId(Auth::id())->with('project')->get();
        $markReviewsArray = ProjectMarkReviewAllocation::whereUserId(Auth::id())->with('project')->get();
        
        return view('v1.task.student.index', compact('marking_array','markReviewsArray'));
    }
}
