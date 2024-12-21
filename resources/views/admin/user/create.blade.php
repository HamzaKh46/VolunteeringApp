@extends('admin.layouts.layout')
@section('admin_page_title')
Create User
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create User</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>

@endif
<form action="{{route('store.event')}}" method="POST"> 
    @csrf
    <label for="name" class="fw-bold mb-2">Name Of The User</label>
    <input type="text" class="form-control" name="name" placeholder="User" required>

    <label for="email" class="fw-bold mb-2">Email Address</label>
    <input type="email" class="form-control" name="email" placeholder="Email" required>

    <label for="password" class="fw-bold mb-2">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password" required>

    <label for="role" class="fw-bold mb-2">Assign Role</label>
    <select name="role" class="form-control">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>

    <button type="submit" class="btn btn-primary w-100 mt-2">Add User</button>
</form>
            </div>
        </div>
    </div>
</div>

@endsection