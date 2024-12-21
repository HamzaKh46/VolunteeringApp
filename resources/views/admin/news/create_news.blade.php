@extends('admin.layouts.layout')
@section('admin_page_title')
Create News
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create News</h5>
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
<form action="{{route('store.news')}}" method="POST" enctype="multipart/form-data"> 
    @csrf
    <label for="title" class="fw-bold mb-2">Title Of The News</label>
    <input type="text" class="form-control" name="title" placeholder="Title" required>

    <label for="image" class="fw-bold mb-2">Upload Your News Image</label>
    <input type="file" class="form-control mb-2" name="image" required>
    
    <label for="content" class="fw-bold mb-2">Content</label>
    <input type="text" class="form-control" name="content" placeholder="Content" required>

    <label for="publication_date " class="fw-bold mb-2">Publication Date</label>
    <input type="date" class="form-control" name="publication_date"  required>

    <button type="submit" class="btn btn-primary w-100 mt-2">Add News</button>
</form>
            </div>
        </div>
    </div>
</div>

@endsection