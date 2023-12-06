<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Repository\ProjectRepository;
use App\Http\Requests\FormProjectRequest; // Assuming you have a form request for project validation

class ProjectController extends Controller
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $searchProjects = $request->get('searchProjects');
            $searchProjects = str_replace(" ", "%", $searchProjects);

            $projects = $this->projectRepository->searchProjects($searchProjects);

            return view('projects.search', compact('projects'))->render();
        }

        $projects = $this->projectRepository->getAllProjects();

        return view('projects.index', ['projects' => $projects]);
    }

    // ... (other methods remain unchanged)
}
