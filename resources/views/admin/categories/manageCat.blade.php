@extends('admin.layouts.layout')
@section('admin_page_title')
Manage Category
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">All Categories</h5>
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
            <th>Category Name</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>

                <td>
                    <a href="{{ route('show.category', $category->id) }}" class="btn btn-info">Edit</a>
                    <form action="{{ route('delete.category', $category->id) }}" method="POST" style="display:inline;">
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