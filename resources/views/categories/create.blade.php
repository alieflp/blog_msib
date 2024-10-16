<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Edit Category</h1>
    <a href="{{ route('categories.index') }}" class="inline-block bg-gray-500 text-white rounded px-4 py-2 mt-4">Back</a>

    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="mt-6 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
            <input type="text" name="description" id="description" value="{{ $category->description }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-indigo-600 text-white rounded-md px-4 py-2">Update</button>
        </div>
    </form>
</div>
@endsection
