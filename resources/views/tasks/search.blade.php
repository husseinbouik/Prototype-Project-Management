@forelse($tasks as $task)
<tr>
    <td>{{ $task->name }}</td>
    <td>{!! $task->description !!}</td>
    <td>{{ $task->start_date ? \Carbon\Carbon::parse($task->start_date)->format('Y-m-d') : '' }}</td>
    <td>{{ $task->end_date ? \Carbon\Carbon::parse($task->end_date)->format('Y-m-d') : '' }}</td>
    
    @can('manage tasks')

    <td>
            
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-default">
            <i class="fas fa-fw fa-pen"></i> <!-- Updated icon class -->
        </a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this task?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button>
        </form>
        
    </td>
    @endcan

</tr>
@empty
<tr>
    <td colspan="3">No tasks found</td>
</tr>
@endforelse



<tr>
    
    <td>        <div class="pagination">
        {{ $tasks->links('pagination::bootstrap-4') }}
    </div></td>
    <td></td>
    <td>
            
        <div class="float-left col-md-6 d-flex justify-content-end" >
            @can('export tasks')
            <button type="button" class="btn btn-default mr-2 swalDefaultQuestion">
                <a href="{{ route('export.tasks') }}">
                    <i class="fas fa-download"></i> Export Tasks
                </a>
            </button>
        @endcan
    
        @can('import tasks')
        <form action="{{ route('import.tasks') }}" method="post" enctype="multipart/form-data" class="ml-2">
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
