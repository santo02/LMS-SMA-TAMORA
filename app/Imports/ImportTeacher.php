<?php

namespace App\Imports;

use App\Models\Teacher;
use App\Models\Teachers;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;    

class ImportTeacher implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        $id = DB::table('users')->orderBy('id', 'DESC')->limit(1)->get();
        foreach ($id as $i) {
            foreach ($rows as $row) {
                User::create([
                    'email' => $row[1],
                    'password' => bcrypt('guru123'),
                    'role' => 'teacher',
                    'status' => $row[6],
                ]);

                $id_user = $i->id;

                Teachers::create([
                    'user_id' => $id_user,
                    'NIP' => $row[2],
                    'name' => $row[3],
                    'phone' => $row[4],
                    'gender' => $row[5],
                    'birth_date' => $row[7],
                    'address' => $row[8],
                    'foto' => 'profile.png',
                ]);
                return redirect('/list-guru')->with('success', 'Berhasil menambahkan');
            }
        }
    }
}
