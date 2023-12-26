<table class="table table-striped text-nowrap ">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            @can('manage tasks')
            <th>Actions</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @include('tasks.search')
    </tbody>
</table>
<input type="hidden" id="hidden_page" value="1">
