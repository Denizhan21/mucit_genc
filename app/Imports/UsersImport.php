<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'authority' => $row['authority'],
            'school' => $row['school'],
            'class' => $row['class'],
            'branch' => $row['branch'],
            'gender' => $row['gender'],
            'password' => \Hash::make($row['password']),
        ]);
    }
}
