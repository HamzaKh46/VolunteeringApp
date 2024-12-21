@extends('admin.layouts.layout')
@section('admin_page_title')
Edit User
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit User</h5>
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
<form action="{{ route('update.user', $user_info->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name" class="fw-bold mb-2">Username</label>
    <input type="text" class="form-control" name="name" value="{{ $user_info->name }}">

    <label for="email" class="fw-bold mb-2 mt-3">Email</label>
    <input type="email" class="form-control" name="email" value="{{ $user_info->email }}">

    <label for="password" class="fw-bold mb-2 mt-3">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Leave blank to keep current password">

    <label for="role" class="fw-bold mb-2 mt-3">Role</label>
    <select class="form-control" name="role">
        <option value="user" {{ $user_info->role == 'user' ? 'selected' : '' }}>User</option>
        <option value="admin" {{ $user_info->role == 'admin' ? 'selected' : '' }}>Admin</option>
    </select>

    <button type="submit" class="btn btn-primary w-100 mt-2">Update User</button>
</form>
            </div>
        </div>
    </div>
</div>

@endsection