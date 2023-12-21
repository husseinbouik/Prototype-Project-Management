@forelse($projects as $project)
<tr>
    <td>{{ $project->name }}</td>
    <td>{!! $project->description !!}</td>
    <td>{{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') : '' }}</td>
    <td>{{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') : '' }}</td>

    <td>
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-default">
            <i class="fas fa-edit"></i>
        </a>
        <a href="{{ route('tasks.index', ['project_id' => $project->id]) }}" class="btn btn-sm btn-default mx-2">
            View Tasks
        </a>
        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this project?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
        </form>
        
    </td>
</tr>
@empty
<tr>
    <td colspan="3">No projects found</td>
</tr>
@endforelse

<tr>
    <td>        
        <div class="pagination">
            {{ $projects->links('pagination::bootstrap-4') }}
        </div>
    </td>
    <td></td>
    <td></td>
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
