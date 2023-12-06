<?php 
namespace App\Repository;

use App\Models\Project;
use App\Repository\BaseRepository;
class ProjectRepository extends BaseRepository {

    public function __construct(Project $model){
        $this->model = $model;
    }

    protected $fieldsProject = [
        'name', 'description'
    ];
    public function searchProjects($searchQuery)
    {
        return Project::where(function ($query) use ($searchQuery) {
            $query->where('name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('description', 'like', '%' . $searchQuery . '%');
        })->get();
    }
       public function getAllProjects()
    {
        return Project::paginate(3);
    }

    public function getFieldData(): array{
        return $this->fieldsProject;
    }

    public function model(): string{
        return Project::class;
    }
}


?>