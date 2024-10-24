<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DosenImport implements ToModel, WithHeadingRow
{
    private $rowCount = 0;
    private $maxRows = 100;

    public function model(array $row)
    {

        if ($this->rowCount >= $this->maxRows) {
            return null;
        }

        $this->rowCount++;


        return new User([
            'nidn' => $row['nidn'],
            'name' => $row['name'],
            'id_role' => 5,
            'id_jabatan_fungsional' => 1,
            'id_universitas' => 1,
            'id_prodi' => 1,
            'id_pangkat_dosen' => 1,
            'id_gelar_depan' => 1,
            'id_gelar_belakang' => 1,
            'id_bank' => 1,
            'status' => 'aktif',
            'email' => $row['email'],
            'password' => bcrypt('password') // Ensure to hash the password
        ]);
    }
}
