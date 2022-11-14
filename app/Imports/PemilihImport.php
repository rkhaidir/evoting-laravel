<?php

namespace App\Imports;

use App\Models\Pemilih;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class PemilihImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pemilih([
            'nomor_pemilih' => $row[1],
            'nama_pemilih' => $row[2],
            'password' => Hash::make($row[2])
        ]);
    }
}
