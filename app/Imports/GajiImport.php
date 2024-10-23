<?php

namespace App\Imports;

use App\Models\Gapok;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class GajiImport implements ToModel, WithHeadingRow
{
    private $rowCount = 0;
    private $maxRows = 10;

    public function model(array $row)
    {
        // if ($this->rowCount >= $this->maxRows) {
        //     return null;
        // }

        // $this->rowCount++;

        return new Gapok([
            'golongan' => $row['golongan'],
            'gaji' => $row['gaji'],
        ]);
    }
}
