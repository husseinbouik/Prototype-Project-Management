<?php

namespace App\Repository;

use App\Models\Project;
use App\Repository\BaseRepository;

class ProjectRepository extends BaseRepository
{
    protected $perPage = 4;
    protected $fieldsProject = ['name', 'description'];

    public function __construct(Project $model)
    {
        parent::__construct($model);
    }

    public function searchProjects($searchQuery)
    {
        return $this->model
            ->where(function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%')
                    ->orWhere('description', 'like', '%' . $searchQuery . '%');
            })
            ->paginate($this->perPage);
    }

    public function getAllProjects()
    {
        return $this->model->paginate($this->perPage);
    }
    public function createProject(array $data)
    {
        return $this->create($data);
    }

    public function getProjectById($id)
    {
        return $this->find($id);
    }

    // public function updateProject($id, array $data)
    // {
    //     return $this->update($id, $data);
    // }

    public function deleteProject($id)
    {
        return $this->delete($id);
    }
    public function getFieldData(): array
    {
        return $this->fieldsProject;
    }
}

?>
