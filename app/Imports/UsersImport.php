<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

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
            'first_name' => $row[0], // Assuming "First Name" is the first column (index 0)
            'last_name' => $row[1],  // Assuming "Last Name" is the second column (index 1)
            'email' => $row[2],      // Assuming "Email" is the third column (index 2)
            'role' => $row[3],       // Assuming "Role" is the fourth column (index 3)
            'password' => Hash::make('password'), // Set a default password or generate one as needed
            'created_at' => $row[4], // Assuming "Created At" is the fifth column (index 4)
            'updated_at' => $row[5], // Assuming "Updated At" is the sixth column (index 5)
]);
    }
}
