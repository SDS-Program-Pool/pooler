<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentDataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Project::all();
    }
}
