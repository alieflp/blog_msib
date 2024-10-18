<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Edit Category</h1>

    @if ($errors->any())
        <div class="mt-4 bg-red-500 text-white p-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-300">Category Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="mt-1 block w-full bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 dark:text-gray-300">Description</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('categories.index') }}" class="bg-gray-500 text-white rounded px-4 py-2">Back</a>
            <button type="submit" class="bg-indigo-600 text-white rounded px-4 py-2">Update</button>
        </div>
    </form>
</div>
@endsection
