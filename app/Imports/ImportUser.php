<?php

namespace App\Imports;

use App\Models\Students;
use App\Models\User;
use Illuminate\Support\Collection;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            User::create([
                'email' => $row[1],
                'password' => bcrypt('siswa123'),
                'role' => 'student',
                'status' => $row[6],

            ]);
            $id = DB::table('users')->orderBy('id', 'DESC')->limit(1)->get();
            foreach ($id as $i) {
                $id_user = $i->id;
            }
            Students::create([
                'user_id' => $id_user,
                'NIS' => $row[2],
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
