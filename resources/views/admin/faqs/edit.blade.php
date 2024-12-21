@extends('admin.layouts.layout')
@section('admin_page_title')
Edit FAQ
@endsection
@section('admin_layout')
<div class="container">
    <h1>Edit FAQ</h1>
    <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $faq->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" name="question" id="question" value="{{ $faq->question }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea name="answer" id="answer" class="form-control" required>{{ $faq->answer }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update FAQ</button>
    </form>
</div>
@endsection
