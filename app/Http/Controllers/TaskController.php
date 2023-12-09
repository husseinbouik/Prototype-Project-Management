<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

use App\Repository\TaskRepository;
use App\Http\Requests\FormTaskRequest; // Assuming you have a form request for task validation

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index(Request $request)
    {
        $projects = Project::all();

        if ($request->ajax()) {
            $searchQuery = $request->input('searchTasks');
            $tasks = $this->taskRepository->searchTasks($searchQuery);

            if ($searchQuery !== null) {
                $searchQuery = str_replace(" ", "%", $searchQuery);
    
                $tasks = $this->taskRepository->searchTasks($searchQuery);
    
                // Render the search view for AJAX requests
                return view('tasks.search', compact('tasks'))->render();
            }
            return view('tasks.search', compact('tasks'))->render();
        }
    
        $tasks = $this->taskRepository->getAllTasks();
    
        // Pass the paginated data to the view
        return view('tasks.index', compact('tasks','projects'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        // Validate and handle form submission
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            // Add more validation rules as needed
        ]);

        $this->taskRepository->createTask($data);

        // Redirect or respond as needed
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function edit($id)
    {
        $task = $this->taskRepository->getTaskById($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        // Validate and handle form submission
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            // Add more validation rules as needed
        ]);

        $this->taskRepository->update($id, $data);

        // Redirect or respond as needed
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy($id)
    {
        $this->taskRepository->deleteTask($id);

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
