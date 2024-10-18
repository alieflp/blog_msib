<!-- resources/views/posts/show.blade.php -->

@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <h1 class="text-3xl font-semibold text-gray-900 dark:text-gray-100 mb-6">{{ $post->title }}</h1>

        @if ($post->image)
            <img src="{{ asset('storage/'.$post->image) }}" alt="Post image" class="w-full max-w-md rounded-md shadow-lg mb-6">
        @else
            <img src="https://via.placeholder.com/300" alt="Default Image" class="w-full max-w-md rounded-md shadow-lg mb-6">
        @endif

        <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">{{ $post->content }}</p>

        <p class="text-gray-500 dark:text-gray-400">
            Category: <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $post->category->name }}</span>
        </p>

        <p class="mt-2 text-gray-500 dark:text-gray-400">
            Status:
            <span class="inline-block px-3 py-1 text-sm font-medium {{ $post->is_published ? 'bg-green-500 text-white' : 'bg-gray-500 text-white' }} rounded">
                {{ $post->is_published ? 'Published' : 'Draft' }}
            </span>
        </p>

        <div class="mt-6 space-x-2">
            <a href="{{ route('posts.edit', $post->id) }}" class="inline-block bg-yellow-500 text-white px-4 py-2 rounded-md">Edit</a>

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block bg-red-500 text-white px-4 py-2 rounded-md" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
            </form>

            <a href="{{ route('posts.index') }}" class="inline-block bg-gray-500 text-white px-4 py-2 rounded-md">Back</a>
        </div>
    </div>
@endsection
