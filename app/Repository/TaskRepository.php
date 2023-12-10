<?php

namespace App\Repository;

use App\Models\Task;
use App\Repository\BaseRepository;

class TaskRepository extends BaseRepository
{
    protected $perPage = 5;
    protected $fieldsTask = ['name', 'description'];

    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

public function searchTasks($searchQuery, $projectId = null)
{
    $query = $this->model->where(function ($query) use ($searchQuery) {
        $query->where('name', 'like', '%' . $searchQuery . '%')
              ->orWhere('description', 'like', '%' . $searchQuery . '%');
    });

    if ($projectId !== null) {
        $query->where('project_id', $projectId);
    }

    return $query->paginate($this->perPage);
}

public function getTasksByProject($projectId)
{
    return $this->model->where('project_id', $projectId)->paginate($this->perPage);
}


    public function getAllTasks()
    {
        return $this->model->paginate($this->perPage);
    }

    public function createTask(array $data, $projectId)
    {
        // Ensure that your Eloquent model is set up to handle the project relationship
        // and the project_id is assigned properly before saving.
    
        $task = new Task($data);
        $task->project_id = $projectId;
        $task->save();
    
        return $task;
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
