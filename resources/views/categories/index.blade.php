@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Categories</h1>

        <!-- Button to create new category -->
        <a href="{{ route('categories.create') }}" class="inline-block bg-indigo-600 text-white rounded px-4 py-2 mt-4">
            Create Category
        </a>

        <div class="mt-6">
            @if ($categories->count() > 0)
                <div class="space-y-4">
                    @foreach ($categories as $category)
                        <div class="flex justify-between items-center bg-white dark:bg-gray-800 shadow rounded-md p-4">
                            <!-- Category name and link -->
                            <a href="{{ route('categories.show', $category->id) }}" class="text-lg text-gray-900 dark:text-gray-200">
                                {{ $category->name }}
                            </a>

                            <!-- Edit and Delete actions -->
                            <div class="space-x-2">
                                <a href="{{ route('categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                    Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300" onclick="return confirm('Are you sure you want to delete this category?');">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="flex justify-center items-center bg-white dark:bg-gray-800 shadow rounded-md p-4">
                    <span class="text-gray-500 dark:text-gray-400">No categories found.</span>
                </div>
            @endif
        </div>
    </div>
@endsection
