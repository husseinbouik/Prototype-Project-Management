@forelse($tasks as $task)
<tr>
    <td>{{ $task->name }}</td>
    <td>{!! $task->description !!}</td>
    <td>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-default">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="{{ route('tasks.index', ['task_id' => $task->id]) }}" class="btn btn-sm btn-default mx-2">
            View Tasks
        </a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this task?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
        </form>
        
    </td>
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
            <button type="button" class="btn btn-default mr-2 swalDefaultQuestion">
                <i class="fas fa-download"></i> export
            </button>
            <button type="button" class="btn btn-default swalDefaultQuestion">
                <i class="fas fa-file-import"></i> import
            </button>
        </div>
    </td>
</tr>
