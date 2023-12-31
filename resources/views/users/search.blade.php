@forelse($users as $user)
    <tr>
        <td>{{ $user->first_name.''.$user->last_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>    
        <td>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-default">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3">No users found</td>
    </tr>
@endforelse

<tr>
    <td>
        <div class="pagination">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </td>
    <td></td>
    <td></td>

<td>
    <div class="float-left col-md-10 d-flex justify-content-end">
            @can('export users')
            <button type="button" class="btn btn-default">
                <a href="{{ route('export.users') }}">
                    <i class="fas fa-download"></i> Export 
                </a>
            </button>
            @endcan
        
            @can('import users')
                <form action="{{ route('import.users') }}" method="post" enctype="multipart/form-data" class="ml-2">
                    @csrf
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="importFile" name="file" accept=".csv, .xls, .xlsx" required>
                            <label class="custom-file-label" for="importFile">Choose a file</label>
                        </div>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-upload"></i> Import
                            </button>
                        </div>
                    </div>
                    <small class="form-text text-muted">
                        Accepted file formats: CSV, XLS, XLSX. Maximum file size: 10MB.
                    </small>
                </form>
        
                <!-- JavaScript to update file label -->
                <script>
                    document.getElementById('importFile').addEventListener('change', function (e) {
                        var fileName = e.target.files[0].name;
                        var fileLabel = document.querySelector('.custom-file-label');
                        fileLabel.textContent = fileName;
                    });
                </script>
            @endcan
    </div>
        
        
        
</td>
</tr>


<!-- Include necessary CSS and JavaScript files for the icons library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
