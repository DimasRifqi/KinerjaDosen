<?php

namespace App\Imports;

use App\Models\Universitas;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UniversitasImport implements ToModel, WithHeadingRow
{
    private $rowCount = 0;
    private $maxRows = 10;

    public function model(array $row)
    {
        // if ($this->rowCount >= $this->maxRows) {
        //     return null;
        // }

        // $this->rowCount++;

        return Universitas::firstOrCreate([
            'kode_pt' => $row['kode'],
            'nama_universitas' => $row['nama'],

        ]);
    }
}
