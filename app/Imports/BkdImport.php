<?php

namespace App\Imports;

use App\Models\Bkd;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BkdImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)
    // {

    // }

    private $rowCount = 0;
    private $maxRows = 100;
    private $id_periode;

    public function __construct($id_periode)
    {
        $this->id_periode = $id_periode; // Set nilai id_periode
    }

    public function model(array $row)
    {
        if ($this->rowCount >= $this->maxRows) {
            return null;
        }

        $this->rowCount++;

        $user = User::where('nidn', $row['nidn'])->first();

        return new Bkd([
            'id' => $user ? $user->id : null, // Set user_id jika ditemukan
            'id_periode' => $this->id_periode ,
            'nidn' => $row['nidn'],
            'nama_dosen' => $row['nama_dosen'],
            'no_serdos' => $row['no_sertifikat'],
            'pt' => $row['pt'],
            'prodi' => $row['prodi'],
            'status' => $row['status'],
            'AB' => $row['ab'],
            'C' => $row['c'],
            'D' => $row['d'],
            'E' => $row['e'],
            'jumlah' => $row['jumlah'],
            'kesimpulan_bkd' => $row['kesimpulan_bkd'],
            'kewajiban_khusus' => $row['kewajiban_khusus'],
            'kesimpulan' => $row['kesimpulan'],
        ]);
    }

}
