<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function getDownload(Request $request)
    {
        $project_data = Project::whereId($request->route('id'))->with('source')->firstOrFail();

        return Storage::download($project_data->source->source);
    }
}
