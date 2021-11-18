<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ProjectMarkAllocation;


class TaskController extends Controller
{
    public function index()
    {
        $marking_array = ProjectMarkAllocation::whereUserId(Auth::id())->get();

        return view('v1.task.student.index', compact('marking_array'));
    }
}
