<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
'id' => $row[0],
'first_name' => $row[1],
'last_name' => $row[2],
'email' => $row[3],
'password' => $row[4],
'created_at' => $row[5],
'updated_at' => $row[6],
'role_id' => $row[7],
]);
    }
}
