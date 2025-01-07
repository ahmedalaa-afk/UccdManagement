<?php

namespace App\Imports;

use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'email' => $row[1],
            'password' => bcrypt($row[2]),
            'gender' => $row[3],
            'disability' => $row[4],
            'national_id' => $row[5],
            'phone' => $row[6],
            'address' => $row[7],
            'university_id' => $row[8],
            'university' => $row[9],
            'faculty' => $row[10],
           'specialization' => $row[11],
            'current_year' => $row[12],
            'graduation_year' => Carbon::parse($row[13]),
            'birth_date' => Carbon::parse($row[14]),
        ]);
    }
}
