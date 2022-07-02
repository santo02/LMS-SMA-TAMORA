<?php

namespace App\Http\Controllers;

use App\Exports\GuruExport;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportUsers extends Controller
{
    public function exportsiswa()
    {
        $filename = 'List-siswa'.date('Y-m-d_H-i-s').'.xlsx';
        return (new SiswaExport)->download($filename);
    }
    public function exportguru()
    {
        $filename = 'List-guru'.date('Y-m-d_H-i-s').'.xlsx';
        return (new GuruExport)->download($filename);
    }
}
