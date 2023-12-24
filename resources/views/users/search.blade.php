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
    <td>
        <div class="float-left col-md-6 d-flex justify-content-end" >
            <button type="button" class="btn btn-default mr-2 swalDefaultQuestion">
                <i class="fas fa-download"></i> export
            </button>
            <button type="button" class="btn btn-default swalDefaultQuestion">
                <i class="fas fa-file-import"></i> import
            </button>
        </div>
    </td>
</tr>

<!-- Include necessary CSS and JavaScript files for the icons library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
