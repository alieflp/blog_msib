@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>

    @if ($post->image)
        <img src="{{ asset('storage/'.$post->image) }}" alt="Post image" class="img-thumbnail" style="width: 300px; height: auto;">
    @else
        <img src="https://via.placeholder.com/300" alt="Default Image" class="img-thumbnail">
    @endif

    <p>{{ $post->content }}</p>
    <p>Category: {{ $post->category->name }}</p>
    <p>Status:
        <span class="badge {{ $post->is_published ? 'bg-success' : 'bg-secondary' }}">
            {{ $post->is_published ? 'Published' : 'Draft' }}
        </span>
    </p>
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
@endsection
