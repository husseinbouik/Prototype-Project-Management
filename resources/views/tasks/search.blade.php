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
                <i class="fas fa-download"></i> export
            </button>
            @endcan
        @can('import tasks')
    
            <button type="button" class="btn btn-default swalDefaultQuestion">
                <i class="fas fa-file-import"></i> import
            </button>
            @endcan

        </div>
    </td>
</tr>
