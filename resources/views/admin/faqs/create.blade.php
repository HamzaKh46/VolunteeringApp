@extends('admin.layouts.layout')
@section('admin_page_title')
Edit FAQ
@endsection
@section('admin_layout')
<div class="container">
    <h1>Add FAQ</h1>
    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" name="question" id="question" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea name="answer" id="answer" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Add FAQ</button>
    </form>
</div>
@endsection
