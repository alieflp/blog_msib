@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Post</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Author</label>
                <select class="form-select" id="author_id" name="author_id" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ $post->author_id == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <small class="form-text text-muted">Leave empty if you don't want to change the image.</small>
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
