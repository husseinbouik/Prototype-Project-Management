

@extends('layouts.app')
@section('title','Menmber managment')
@section('content')

<div class="content-wrapper" style="min-height: 1302.4px;">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List of tasks</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="{{ url('/tasks/create') }}" class="btn btnAdd">Add New</a>
                    </div>
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
                                    <i class="fa-solid fa-filter" style="color: #000505;"></i>
                                    <button class="btn btn-sm mr-3 dropdown-toggle btnAddSelect" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Project1
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                            href="/projects/tasks">Project2</a>
                                        <a class="dropdown-item"
                                            href="/projects/tasks">Project3</a>

                                    </div>
                                </div>
                                <div class=" p-0">
                                    <div class="input-group input-group-sm ">
                                        <input type="text" name="table_search" class="form-control"
                                            placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Name task</th>
                                        <th>Name project</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>tache 1</td>
                                        <td>
                                            Project1
                                        </td>
                                        <td>Description</td>
                                        <td>
                                            <a href="./edit.html" class="btn btn-sm btn-default"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>tache 2</td>
                                        <td>
                                            Project1
                                        </td>
                                        <td>Description</td>
                                        <td>
                                            <a href="./edit.html" class="btn btn-sm btn-default"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>tache 3</td>
                                        <td>
                                            Project1
                                        </td>
                                        <td>Description</td>
                                        <td>
                                            <a href="./edit.html" class="btn btn-sm btn-default"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-2">
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
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
</div>

@endsection