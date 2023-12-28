@forelse($projects as $project)
<tr>
    <td>{{ $project->name }}</td>
    <td>{!! $project->description !!}</td>
    <td>{{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') : '' }}</td>
    <td>{{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') : '' }}</td>

    <td>
@can('manage projects')
    
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-default">
            <i class="fas fa-edit"></i>
        </a>
        @endcan

        <a href="{{ route('tasks.index', ['project_id' => $project->id]) }}" class="btn btn-sm btn-default mx-2">
            View Tasks
        </a> 
        @can('manage projects')

        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this project?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
        </form>
        @endcan

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
        @can('export projects')

          <!-- Your Blade File -->

<button type="button" class="btn btn-default mr-2 swalDefaultQuestion">
    <a href="{{ route('export.projects') }}">
        <i class="fas fa-download"></i> Export
    </a>
</button>

@endcan

@can('import projects')
<form action="{{ route('import.projects') }}" method="post" enctype="multipart/form-data"
id="importForm">
@csrf
<label for="upload" class="btn btn-default btn-sm mb-0 font-weight-normal">
    <i class="fa-solid fa-file-arrow-down"></i>
    {{ __('IMPORTER') }}
</label>
<input type="file" id="upload" name="file" style="display:none;"
    onchange="submitForm()" />
</form>
@endcan

        </div>
    </td>
</tr>
