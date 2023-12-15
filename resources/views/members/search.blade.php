@forelse($members as $member)
<tr>
    <td>{{ $member->first_name.''.$member->last_name }}</td>
    <td>{{ $member->email }}</td>    
        

    <td>
        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-default">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this member?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
        </form>
        
    </td>
</tr>
@empty
<tr>
    <td colspan="3">No members found</td>
</tr>
@endforelse



<tr>
    
    <td>        <div class="pagination">
        {{ $members->links('pagination::bootstrap-4') }}
    </div></td>
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
