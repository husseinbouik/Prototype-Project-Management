<?php

namespace App\Exports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UsersExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all('first_name','last_name','email','role','created_at','updated_at');
    }
    public function headings(): array
    {
        return [
            'First Name','Last Name' , 'Email','Role', 'Created At', 'Updated At',
        ];
    }
}
