<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements WithHeadings, FromCollection
{
    use Exportable;

    public function headings(): array
    {
        return [
            'Email',
            'Nama',
            'NiP',
            'Jenis kelamin',
            'No Hanphone',
            'Alamat',
            'Tanggal lahir',
            'Status',
        ];
    }
    public function collection()

    {
        $teachers = DB::table('teachers')
        ->join('users', 'user_id', '=', 'users.id')
        ->select('users.email', 'teachers.name','teachers.nip','teachers.gender','teachers.phone', 'teachers.address','teachers.birth_date', 'users.status')
        ->get();

        return $teachers;
    }

}
