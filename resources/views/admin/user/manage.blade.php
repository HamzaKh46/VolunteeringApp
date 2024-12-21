@extends('admin.layouts.layout')
@section('admin_page_title')
Manage Users
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">All Users</h5>
            </div>
            @if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>

@endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('show.user', $user->id) }}" class="btn btn-info">Edit</a>
                    <form action="{{ route('delete.user', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection