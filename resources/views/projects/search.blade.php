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
<form action="{{ route('import.projects') }}" method="post" enctype="multipart/form-data" class="ml-2">
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
