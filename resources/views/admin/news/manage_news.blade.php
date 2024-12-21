@extends('admin.layouts.layout')
@section('admin_page_title')
Manage News
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-11">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">All News</h5>
            </div>
            @if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>

@endif
            <div class="card-body">
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>News Title</th>
            <th>Image</th>
            <th>Content</th>
            <th>Publication Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news as $new)
            <tr>
                <td>{{ $new->id }}</td>
                <td>{{ $new->title }}</td>
                <td><img class="h-auto w-64 mx-auto" src="{{ asset('storage/' . $new->image) }}" alt="{{ $new->title }}" /></td>
                <td>{{ $new->content }}</td>
                <td>{{ $new->publication_date }}</td>
                <td>
                    <a href="{{ route('show.news', $new->id) }}" class="btn btn-info">Edit</a>
                    <form action="{{ route('delete.news', $new->id) }}" method="POST" style="display:inline;">
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