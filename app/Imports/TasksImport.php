<?php

namespace App\Imports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\ToModel;

class TasksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Task([
            'project_id' => (int) $row[0],
            'name' => $row[1], // Assuming the name is in the second column
            'description' => $row[2],
            'start_date' => $row[3],
            'end_date' => $row[4],
             ]);
    }
}
