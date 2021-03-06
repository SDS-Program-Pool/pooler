<?php

namespace App\Actions\CodeUpload;

use App\Models\ProjectSource;
use Illuminate\Support\Facades\Auth;

class Upload
{
    public function handleZipUpload($request, $project)
    {
        $source = $request->file('code-upload')->store('public');

        $store = new ProjectSource();
        $store->user_id = Auth::id();
        $store->project_id = $project->id;
        $store->source = $source;

        $store->save();

        return $store;
    }
}
