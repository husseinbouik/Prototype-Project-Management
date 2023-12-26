

@extends('layouts.app')
@section('title','Menmber managment')
@section('content')

<div class="content-wrapper" style="min-height: 1302.4px;">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List of tasks</h1>
                </div>
                <div class="col-sm-6">
                    @can('manage tasks')

                    <div class="float-sm-right">
                        <a href="{{ url('/tasks/create') }}" class="btn btnAdd">Add New</a>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header col-md-12">
                            <div class="d-flex justify-content-between">
                                <div class="dropdown">
                                    <i class="fas fa-filter" style="color: #000505;"></i>
                                    <button class="btn btn-sm mr-3 dropdown-toggle btnAddSelect" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if(isset($selectedProject))
                                            {{ $selectedProject->name }}
                                        @else
                                            Select Project
                                        @endif
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach($projects as $project)
                                            <a class="dropdown-item project-dropdown-item" href="#" data-project-id="{{ $project->id }}">
                                                {{ $project->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                
                                

                                <div class="p-0">
                                    <form class="" method="GET" action="{{ route('tasks.index') }}">
                                        <div class="input-group input-group-sm float-sm-right col-md-6 p-0">
                                            <input type="search" class="form-control form-control-lg" name="searchTasks" id="searchTasks"
                                                placeholder="Recherche" value="{{ !empty($search) ? $search : '' }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        

                        <div class="card-body table-responsive p-0">
                            @include('tasks.table') {{-- Include the table partial --}}

                        </div>
                        {{-- <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="d-flex align-items-center mb-2 ml-2 mt-2">
                                <button type="button" class="btn  btn-default btn-sm">
                                    <i class="fa-solid fa-file-arrow-down"></i>
                                    IMPORT</button>
                                <button type="button" class="btn  btn-default btn-sm mt-0 mx-2">
                                    <i class="fa-solid fa-file-export"></i>
                                    EXPORT</button>
                            </div>
                            <div class="">
                                <ul class="pagination  m-0 float-right mr-5">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>

    </section>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
     $(document).ready(function () {
        // Initialize selected project based on URL parameter
        var urlParams = new URLSearchParams(window.location.search);
        var projectIdFromUrl = urlParams.get('project_id');
        if (projectIdFromUrl !== null) {
            var selectedProject = $('.project-dropdown-item[data-project-id="' + projectIdFromUrl + '"]');
            if (selectedProject.length > 0) {
                $('.dropdown-toggle').data('project-id', projectIdFromUrl);
                $('.dropdown-toggle').html(selectedProject.text());
            }
        }

        function fetch_data(page, search, projectId) {
        // Include projectId in the URL only if it is defined
        var url = "{{ route('tasks.index') }}?page=" + page + "&searchTasks=" + search;

        // Include projectId in the URL only if it is selected
        if (projectId !== undefined && projectId !== null) {
            url += "&projectId=" + projectId;
        }


            $.ajax({
                url: url,
                success: function (data) {
                    $('tbody').html(data);
                }
            });
        }

    $('body').on('click', '.pagination a', function (param) {
        param.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var search = $('#searchTasks').val();
        var projectId = $('.dropdown-toggle').data('project-id');
        fetch_data(page, search, projectId);
    });

    $('body').on('keyup', '#searchTasks', function () {
        var search = $('#searchTasks').val();
        var page = $('#hidden_page').val();
        var projectId = $('.dropdown-toggle').data('project-id');
        fetch_data(page, search, projectId);
    });

    $('body').on('click', '.dropdown-item', function () {
        var projectId = $(this).data('project-id');
        $('.dropdown-toggle').data('project-id', projectId);
        $('.dropdown-toggle').html($(this).text());
        var search = $('#searchTasks').val();
        var page = $('#hidden_page').val();
        fetch_data(page, search, projectId);
    });

    fetch_data(1, '', null); // Pass null when initializing to show all tasks
});

</script>

@endsection