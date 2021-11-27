<?php

namespace App\Actions\CodeUpload;

use App\Models\ProjectSource;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;

class Upload
{
    public function upload($request, $project)
    {
        $source = $request->file('code-upload')->store('public');

        $store = new ProjectSource();
        $store->user_id = Auth::id();
        $store->project_id = $project->id;
        $store->source = $source;

        $store->save();

        return $store;

        // Validate is zip is tar and is size req
        // Rename and upload to S3
    }
}

// Validate the ZIP File

// Upload the ZIP File

// Error Handling for ZIP File
