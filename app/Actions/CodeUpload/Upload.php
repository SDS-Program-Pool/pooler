<?php

namespace App\Actions\CodeUpload;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Upload
{
    public function upload()
    {
        $file_uuid = Str::uuid()->toString();


        Storage::disk('local')->put('example.txt', 'Contents');

        dd($file_uuid);
        dd("Hello upload ");
        return "Hello";

        // Automatically generate a unique ID for filename...
       // $path = Storage::putFile('photos', new File('/path/to/photo'));

    }

    private function store()
    {
        // Upload to object storage
    }

}




// Validate the ZIP File

// Upload the ZIP File

// Error Handling for ZIP File