@extends('admin.layouts.layout')
@section('admin_page_title')
Create Category
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create Category</h5>
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
<form action="{{route('store.category')}}" method="POST"> 
    @csrf
    <label for="name" class="fw-bold mb-2">Name Of the Category</label>
    <input type="text" class="form-control" name="name" placeholder="name" required>

    </select>

    <button type="submit" class="btn btn-primary w-100 mt-2">Add Category</button>
</form>
            </div>
        </div>
    </div>
</div>

@endsection