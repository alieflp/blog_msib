@extends('layouts.app')

@section('title', 'Authors')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Authors</h1>
    <a href="{{ route('authors.create') }}" class="inline-block bg-indigo-600 text-white rounded px-4 py-2 mt-4">Create New Author</a>

    <div class="mt-6 space-y-4">
        @if (count($authors) > 0)
            @foreach ($authors as $author)
                <div class="flex justify-between items-center p-4 border border-gray-300 rounded-md">
                    <a href="{{ route('authors.show', $author->id) }}" class="text-blue-600 hover:underline">{{ $author->name }}</a>
                    <div>
                        <a href="{{ route('authors.edit', $author->id) }}" class="inline-block bg-yellow-500 text-white rounded px-2 py-1 text-sm">Edit</a>
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block bg-red-600 text-white rounded px-2 py-1 text-sm" onclick="return confirm('Are you sure you want to delete this data?');">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="p-4 border border-gray-300 rounded-md">
                No data
            </div>
        @endif
    </div>
</div>
@endsection
