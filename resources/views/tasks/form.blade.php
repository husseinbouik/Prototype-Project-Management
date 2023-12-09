@extends('layouts.app')
@section('title', 'Task Management')
@section('content')

<div class="content-wrapper" style="min-height: 1302.4px;">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tasks</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Edit Task</li>
                        <li class="breadcrumb-item"><a href="{{ url('/tasks') }}">Tasks</a> </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ isset($task) ? 'Edit Task' : 'Add Task' }}</h3>
                        </div>
                        <form
                            method="POST"
                            action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}">
                            @csrf
                            <div class="card-body">
                                @if(isset($task))
                                    <div class="form-group">
                                        <label for="taskId">Identifiant</label>
                                        <input type="text" class="form-control" id="taskId" name="taskId"
                                            placeholder="Enter Id" value="{{ $task->id }}" readonly>
                                    </div>
                                @endif
                                @if(isset($projects))
                                <div class="form-group">
                                    <label for="project_id">Project</label>
                                    <select name="project_id" class="form-control" id="project_id">
                                        <option value="">Select Project</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}" {{ isset($task) && $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Enter name" value="{{ isset($task) ? $task->name : old('name') }}">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description">{{ isset($task) ? $task->description : old('description') }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{  route('tasks.index') }}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>
@endsection
