<!-- resources/views/categories/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <div class="bg-white dark:bg-gray-800 shadow rounded-md p-6">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $category->name }}</h1>
            <p class="mt-4 text-gray-700 dark:text-gray-300">{{ $category->description }}</p>

            <div class="mt-6 space-x-4">
                <a href="{{ route('categories.edit', $category->id) }}" class="bg-yellow-500 text-white rounded px-4 py-2">Edit</a>

                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white rounded px-4 py-2" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                </form>

                <a href="{{ route('categories.index') }}" class="bg-gray-500 text-white rounded px-4 py-2">Back</a>
            </div>
        </div>
    </div>
@endsection
