<!-- resources/views/posts/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Edit Post</h1>
        <a href="{{ route('posts.index') }}" class="inline-block bg-gray-500 text-white rounded px-4 py-2 mt-4">Back</a>

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                <textarea name="content" id="content" class="block w-full px-3 py-2 border border-gray-300 rounded-md" rows="5" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <div>
                <label for="author_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Author</label>
                <select name="author_id" id="author_id" class="block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ $post->author_id == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                <select name="category_id" id="category_id" class="block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                <input type="file" name="image" id="image" class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                <small class="block text-sm text-gray-500 dark:text-gray-400 mt-1">Leave empty if you don't want to change the image.</small>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-indigo-600 text-white rounded-md px-4 py-2">Update Post</button>
                <a href="{{ route('posts.index') }}" class="ml-2 bg-gray-500 text-white rounded-md px-4 py-2">Cancel</a>
            </div>
        </form>
    </div>
@endsection
