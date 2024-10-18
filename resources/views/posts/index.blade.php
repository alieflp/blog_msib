<!-- resources/views/posts/index.blade.php -->

@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Posts</h1>
        <a href="{{ route('posts.create') }}" class="inline-block bg-indigo-600 text-white rounded px-4 py-2 mt-4">Create Post</a>

        <div class="mt-6">
            @if (count($posts) > 0)
                <div class="space-y-4">
                    @foreach ($posts as $post)
                        <div class="flex justify-between items-center bg-white dark:bg-gray-800 shadow rounded-md p-4">
                            <div class="flex items-start">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="w-24 h-24 rounded-md mr-4">
                                @else
                                    <img src="https://via.placeholder.com/100" alt="Default Image" class="w-24 h-24 rounded-md mr-4">
                                @endif

                                <div>
                                    <h6 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                    </h6>
                                    <p class="text-gray-500 dark:text-gray-400">in category {{ $post->category->name }}</p>
                                    <p>
                                        Status:
                                        <span class="inline-block px-2 py-1 text-sm font-medium {{ $post->is_published ? 'bg-green-500 text-white' : 'bg-gray-500 text-white' }} rounded">
                                            {{ $post->is_published ? 'Published' : 'Draft' }}
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <div class="flex space-x-2">
                                <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 shadow rounded-md p-4 text-center">
                    <p class="text-gray-500 dark:text-gray-400">No posts available.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
