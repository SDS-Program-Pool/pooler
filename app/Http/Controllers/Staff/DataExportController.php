<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataExportController extends Controller
{
    public function index()
    {

        $users = User::all();
        

        return view('v1.staff.dataexport.index', compact('users')); 

    }
}
