<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpenSourceController extends Controller
{
    public function index()
    {
        return view('v1.opensource.index');
    }
}
