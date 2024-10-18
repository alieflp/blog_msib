<!-- resources/views/posts/create.blade.php -->

@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Create Post</h1>
        <a href="{{ route('posts.index') }}" class="inline-block bg-gray-500 text-white rounded px-4 py-2 mt-4">Back</a>

        @if ($errors->any())
            <div class="mt-4 bg-red-500 text-white p-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" name="title" id="title" class="block w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                <textarea name="content" id="content" class="block w-full px-3 py-2 border border-gray-300 rounded-md" rows="5"></textarea>
            </div>

            <div>
                <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Author</label>
                <select name="author_id" id="author" class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                <select name="category_id" id="category" class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                    <option value="">Choose</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload Image</label>
                <input type="file" name="image" id="image" class="block w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_published" id="isPublished" class="form-check-input h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="isPublished" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Publish</label>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-indigo-600 text-white rounded-md px-4 py-2">Submit</button>
            </div>
        </form>
    </div>
@endsection
