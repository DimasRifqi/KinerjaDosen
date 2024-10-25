<?php

namespace App\Imports;

use App\Models\Span;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SpanImport implements ToModel, WithHeadingRow
{
    private $rowCount = 0;
    private $maxRows = 100;

    public function model(array $row)
    {
        // if ($this->rowCount >= $this->maxRows) {
        //     return null;
        // }

        // $this->rowCount++;


        return new Span([
            'no_rekening' => $row['no_rekening'],
            'nama_penerima' => $row['nama_penerus_pinjaman'],
            'npwp' => $row['npwp'],
            'nama_pemilik_rekening' => $row['nama_pemilik_rekening'],
        ]);
    }
}
