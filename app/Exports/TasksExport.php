<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class TasksExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Task::all(['name', 'description', 'start_date', 'end_date']);
    }
    public function headings(): array
    {
        return [
            'Name', 'Description', 'Created At', 'Updated At',
        ];
    }
}
