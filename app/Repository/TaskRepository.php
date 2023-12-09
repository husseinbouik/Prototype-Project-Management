<?php

namespace App\Repository;

use App\Models\Task;
use App\Repository\BaseRepository;

class TaskRepository extends BaseRepository
{
    protected $perPage = 10;
    protected $fieldsTask = ['name', 'description'];

    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

    public function searchTasks($searchQuery)
    {
        return $this->model
            ->where(function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%')
                    ->orWhere('description', 'like', '%' . $searchQuery . '%');
            })
            ->paginate($this->perPage);
    }

    public function getAllTasks()
    {
        return $this->model->paginate($this->perPage);
    }

    public function createTask(array $data)
    {
        return $this->create($data);
    }

    public function getTaskById($id)
    {
        return $this->find($id);
    }

    public function updateTask($id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteTask($id)
    {
        return $this->delete($id);
    }

    public function getFieldData(): array
    {
        return $this->fieldsTask;
    }
}

?>
