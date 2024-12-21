@extends('admin.layouts.layout')
@section('admin_page_title')
Edit News
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit News</h5>
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
<form action="{{ route('update.news', $news_info->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="title" class="fw-bold mb-2">Title</label>
    <input type="text" class="form-control" name="title" value="{{ $news_info->title }}">

    <label for="image" class="fw-bold mb-2 mt-3">Image</label>
    <input type="file" name="image" value="{{ $news_info->image }}">
    <img class="h-auto max-w-lg rounded-lg" src="{{ asset('storage/' . $news_info->image) }}" alt="{{ $news_info->title }}" />



    <label  for="content" class="fw-bold mb-2 mt-3">Content</label>
    <textarea class="form-control" name="content" placeholder="Leave blank to keep current content"></textarea>


    <label for="publication_date" class="fw-bold mb-2 mt-3">Publication Date</label>
    <input type="date" class="form-control" name="publication_date" value="{{ $news_info->publication_date }}">

    <button type="submit" class="btn btn-primary w-100 mt-2">Update News</button>
</form>
            </div>
        </div>
    </div>
</div>

@endsection