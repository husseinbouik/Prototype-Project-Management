<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\ProjectRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Project;

class ProjectController extends Controller
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

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

    public function create()
    {
        $this->authorize('create', Project::class);
   
        return view('projects.create');
    }

    public function store(Request $request)
    {
        // Validate and handle form submission
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required',
            'end_date' => 'required',
            // Add more validation rules as needed
        ]);

        $this->projectRepository->createProject($data);

        // Redirect or respond as needed
        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    public function edit($id)
    {
        $project = $this->projectRepository->getProjectById($id);

        // Manually check authorization
        if (Gate::denies('update', $project)) {
            abort(403, 'Unauthorized action.');
        }

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = $this->projectRepository->getProjectById($id);

        // Manually check authorization
        if (Gate::denies('update', $project)) {
            abort(403, 'Unauthorized action.');
        }

        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required',
            'end_date' => 'required',
            // Add more validation rules as needed
        ]);

        $this->projectRepository->updateProject($id, $data);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy($id)
    {
        $project = $this->projectRepository->getProjectById($id);

        // Manually check authorization
        if (Gate::denies('delete', $project)) {
            abort(403, 'Unauthorized action.');
        }

        $this->projectRepository->deleteProject($id);

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}
