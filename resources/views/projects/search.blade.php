@foreach($projects as $project)
<tr>
    <td>{{ $project->name }}</td>
    <td>{{ $project->description }}</td>
    <td>
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-default">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="{{ route('tasks.index', ['project_id' => $project->id]) }}"
            class="btn btn-sm btn-default mx-2">View Tasks</a>
        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
        </form>
    </td>
</tr>
@endforeach
