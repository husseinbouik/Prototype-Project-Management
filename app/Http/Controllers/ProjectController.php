<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProjectsExport;
use App\Imports\ProjectsImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Repository\ProjectRepository;
use App\Http\Requests\FormProjectRequest; // Assuming you have a form request for project validation
use Illuminate\Support\Facades\Auth;

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
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        // Validate and handle form submission
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required',
            'end_date' => 'required',
            // Add more validation rules as needed
        ]);

        $this->projectRepository->update($id, $data);


        // Redirect or respond as needed
        return redirect()->route('projects.index')->with('success', 'Project updated successfully');

    }

    public function destroy($id)
    {
        $this->projectRepository->deleteProject($id);

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }

    public function exportProjects()
{
    return Excel::download(new ProjectsExport, 'projects.xlsx');
}
public function importProjects(Request $request)
{
    $file = $request->file('file');
    
    try {
        Excel::import(new ProjectsImport, $file, null, \Maatwebsite\Excel\Excel::XLSX);
        return redirect()->route('home')->with('success', 'Projects imported successfully.');
    } catch (\Exception $e) {
        // Handle the exception (e.g., log it, display an error message)
        return redirect()->route('home')->with('error', 'Error importing projects: ' . $e->getMessage());
    }
}

}
