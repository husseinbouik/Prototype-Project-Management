<?php 
use App\Models\Task;
use App\Repository\BaseRepository;


class TaskRepository extends BaseRepository
{
    public function __construct(Task $task)
    {
        parent::__construct($task);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function getTasks()
    {
        return $this->all();
    }
}

?>
