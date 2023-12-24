@extends('layouts.app')
@section('title', 'User Management')
@section('content')

<div class="content-wrapper" style="min-height: 1302.4px;">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Edit User</li>
                        <li class="breadcrumb-item"><a href="{{ url('/users') }}">User</a> </li>
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
                            <h3 class="card-title">{{ isset($user) ? 'Edit User' : 'Add User' }}</h3>
                        </div>
                        <form
                            method="POST"
                            action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
                            @csrf
                            @if(isset($user))
                                @method('PUT')
                            @endif
                            <div class="card-body">
                                @if(isset($user))
                                    <div class="form-group">
                                        <label for="userId">User ID</label>
                                        <input type="text" class="form-control" id="userId" name="userId"
                                            placeholder="Enter User ID" value="{{ $user->id }}" readonly>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                     <input name="first_name" type="text" class="form-control" id="first_name"
                                       placeholder="Enter First Name" value="{{ isset($user) ? $user->first_name : old('first_name') }}">
                                    @error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input name="last_name" type="text" class="form-control" id="last_name"
                                        placeholder="Enter Last Name" value="{{ isset($user) ? $user->last_name : old('last_name') }}">
                                    @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control" id="email"
                                        placeholder="Enter Email" value="{{ isset($user) ? $user->email : old('email') }}">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                 <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-control" id="role">
                                        <option value="leader" {{ isset($user) && $user->role == 'leader' ? 'selected' : '' }}>Leader</option>
                                        <option value="member" {{ isset($user) && $user->role == 'member' ? 'selected' : '' }}>Member</option>
                                    </select>
                                    @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" id="password"
                                        placeholder="Enter Password">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
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
