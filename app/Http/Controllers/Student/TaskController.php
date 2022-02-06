<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ProjectMarkAllocation;
use App\Models\ProjectMarkReviewAllocation;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    public function index()
    {
        $marking_array = ProjectMarkAllocation::whereUserId(Auth::id())->whereNull('marked')->with('project')->get();
        $markReviewsArray = ProjectMarkReviewAllocation::whereUserId(Auth::id())->whereNull('marked')->with('project')->get();

        // Change these to getToMarkReviewAttribute etc later

        return view('v1.task.student.index', compact('marking_array', 'markReviewsArray'));
    }
}
