<?php

namespace App\Imports;

use App\User;
use Illuminate\Database\Eloquent\Model;
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

      /*  $deg =$row['email'];
        $user_mails = User::where('email', 'like', "%$deg%")->get();

        if (empty($user_mails)) {*/

                return new User([
                    'name'     => $row['name'],
                    'email'    => $row['email'],
                    'authority' => $row['authority'],
                    'school' => $row['school'],
                    'class' => $row['class'],
                    'branch' => $row['branch'],
                    'gender' => $row['gender'],
                    'comment_authority' => $row['comment_authority'],
                    'password' => \Hash::make($row['password']),
                ]);

     /*   }else {
            exit(redirect()->back()->with('alertsd', 'alertsd'));
        }*/





        }

}
