<?php

namespace App\Imports;

use App\Models\Soal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SoalImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function  __construct(string $id) {
        $this->id= $id;
    }
    public function model(array $row)
    {


        return new Soal([
            'quiz_id' => $this->id,
            'no' => $row['no'],
            'soal' => $row['soal'],
            'a' => $row['a'],
            'b' => $row['b'],
            'c' => $row['c'],
            'd' => $row['d'],
            'jawaban' => @$row['benar'],
        ]);
    }
}
