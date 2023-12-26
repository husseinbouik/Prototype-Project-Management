
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
                    <h1>List of projects</h1>
                </div>
                <div class="col-sm-6">
                    @can('manage projects')
                        
                    <div class="float-sm-right">
                        <a href="{{ route('projects.create') }}" class="btn btnAdd">Add New</a>
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
                            <div class=" p-0">
                                    <form class="" method="GET" action="{{ route('projects.index') }}">
                                        <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                            <input type="search" class="form-control form-control-lg" name="searchProjects" id="searchProjects" placeholder="Recherche" value="{{ !empty($search) ? $search : '' }}">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                    </form>
                            
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            @include('projects.table') {{-- Include the table partial --}}
                        </div>

                        {{-- <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="d-flex align-items-center mb-2">
                                <button type="button" class="btn  btn-default btn-sm">
                                    <i class="fa-solid fa-file-arrow-down"></i>
                                    IMPORT</button>
                                <button type="button" class="btn  btn-default btn-sm mt-0 mx-2">
                                    <i class="fa-solid fa-file-export"></i>
                                    EXPORT</button>
                            </div>
                            <div class="pagination">
                                {{ $projects->links('pagination::bootstrap-4') }}
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
        function fetch_data(page, search) {
            $.ajax({
                url: "{{ route('projects.index') }}?page=" + page + "&searchProjects=" + search,
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        }

        $('body').on('click', '.pagination a', function (param) {
            param.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var search = $('#searchProjects').val();
            fetch_data(page, search);
        });

        $('body').on('keyup', '#searchProjects', function () {
            var search = $('#searchProjects').val();
            var page = $('#hidden_page').val();
            fetch_data(page, search);
        });

        fetch_data(1, '');
    });
</script>



@endsection

       

