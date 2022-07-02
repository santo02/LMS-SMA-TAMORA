<?php

namespace App\Exports;

use App\Models\Students;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements WithHeadings, FromCollection
{
    use Exportable;

    public function headings(): array
    {
        return [
            'Email',
            'Nama',
            'Nis',
            'Jenis kelamin',
            'No Hanphone',
            'Alamat',
            'Tanggal lahir',
            'Status',
        ];
    }
    public function collection()

    {
        $students = DB::table('students')
        ->join('users', 'user_id', '=', 'users.id')
        ->select('users.email', 'students.name','students.nis','students.gender','students.phone', 'students.address','students.birth_date', 'users.status')
        ->get();

        return $students;
    }
}
