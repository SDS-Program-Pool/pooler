<?php

namespace App\Http\Controllers\Student;

use App\Exports\StudentDataExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class DataExportController extends Controller
{
    public function export()
    {
        return Excel::download(new StudentDataExport(), 'data.csv');
    }
}
