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
            $searchQuery = $request->input('searchProjects');
            $projects = $this->projectRepository->searchProjects($searchQuery);

            if ($searchQuery !== null) {
                $searchQuery = str_replace(" ", "%", $searchQuery);
    
                $projects = $this->projectRepository->searchProjects($searchQuery);
    
                // Render the search view for AJAX requests
                return view('projects.search', compact('projects'))->render();
            }
            return view('projects.search', compact('projects'))->render();

        }
    
        // Get paginated projects for non-AJAX requests
        $projects = $this->projectRepository->getAllProjects();
    
        // Pass the paginated data to the view
        return view('projects.index', compact('projects'));
    }

    // ... (other methods remain unchanged)
}
