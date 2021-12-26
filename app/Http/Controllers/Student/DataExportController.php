<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Exports\StudentDataExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class DataExportController extends Controller
{
    public function export() 
    {
        return Excel::download(new StudentDataExport, 'data.csv');
    }
}
