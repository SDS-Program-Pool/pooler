<?php

namespace App\Actions\CodeUpload;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

use App\Models\ProjectSource;
use App\Models\ProjectTeam;


class Upload
{
    public function upload($request, $project)
    {
        
        $source = $request->file('code-upload')->store('public');

        $store = new ProjectSource;
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