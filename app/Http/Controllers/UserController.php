<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repository\UserRepository;
use App\Http\Requests\FormUserRequest; // Assuming you have a form request for User validation
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($request->ajax()) {
            $searchQuery = $request->input('searchUsers');
            $users = $this->UserRepository->searchUsers($searchQuery);

            if ($searchQuery !== null) {
                $searchQuery = str_replace(" ", "%", $searchQuery);

                $users = $this->UserRepository->searchUsers($searchQuery);

                // Render the search view for AJAX requests
                return view('users.search', compact('users'))->render();
            }

            return view('users.search', compact('users'))->render();
        }

        // Get paginated Users for non-AJAX requests
        $users = $this->UserRepository->getAllUsers();

        // Pass the paginated data to the view
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
{
    // Validate and handle form submission
    $data = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|email|unique:users',
        'role' => 'required|in:leader,member',
        'password' => 'required|string|min:8', // Add any password validation rules as needed
    ]);

    // Hash the password
    $data['password'] = bcrypt($data['password']);

    $this->UserRepository->createUser($data);

    // Redirect or respond as needed
    return redirect()->route('users.index')->with('success', 'User created successfully');
}


    public function edit($id)
    {
        $user = $this->UserRepository->getUserById($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate and handle form submission
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:leader,member',
            'password' => 'nullable|string|min:8', // Use nullable for password
            // Add more validation rules as needed
        ]);
    
        // Check if the password is provided
        if (!empty($data['password'])) {
            // Hash the password
            $data['password'] = bcrypt($data['password']);
        } else {
            // If password is not provided, remove it from the data array
            unset($data['password']);
        }
    
        $this->UserRepository->update($id, $data);
    
        // Redirect or respond as needed
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    

    public function destroy($id)
    {
        $this->UserRepository->deleteUser($id);

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
