<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class DownloadController extends Controller
{
    public function getDownload(Request $request)
    {
        
        $project_data = Project::whereUserId(Auth::id())->whereId($request->route('id'))->with('source')->firstOrFail();

        return Storage::download($project_data->source->source);

    }
}
