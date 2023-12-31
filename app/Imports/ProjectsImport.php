<?php

namespace App\Imports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;

class ProjectsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Project([
            'name' => $row[0], // Assuming the name is in the second column
            'description' => $row[1],
            'start_date' => $row[2],
            'end_date' => $row[3],
        ]);
    }
}
