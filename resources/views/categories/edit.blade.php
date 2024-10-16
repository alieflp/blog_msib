<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Categories</h1>
    <a href="{{ route('categories.create') }}" class="inline-block bg-indigo-600 text-white rounded px-4 py-2 mt-4">Create Category</a>

    @if (session('success'))
        <div class="mt-4 bg-green-500 text-white p-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-4">
        @if (count($categories) > 0)
            <ul>
                @foreach ($categories as $category)
                    <li class="flex justify-between items-center border-b py-2">
                        <span>{{ $category->name }}</span>
                        <div>
                            <a href="{{ route('categories.edit', $category->id) }}" class="bg-yellow-500 text-white rounded px-2 py-1">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white rounded px-2 py-1" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div>No categories found.</div>
        @endif
    </div>
</div>
@endsection
