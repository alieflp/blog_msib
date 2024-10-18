@extends('layouts.app')

@section('title', 'Author Details')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-dark shadow rounded-lg p-6">
        <h1 class="text-2xl font-semibold text-gray-100">{{ $author->name }}</h1>
        <p class="mt-4 text-gray-300"><strong>Email:</strong> {{ $author->email }}</p>
        @if($author->phone_number)
            <p class="mt-2 text-gray-300"><strong>Phone Number:</strong> {{ $author->phone_number }}</p>
        @endif
        @if($author->bio)
            <p class="mt-2 text-gray-300"><strong>Bio:</strong> {{ $author->bio }}</p>
        @endif

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('authors.edit', $author->id) }}" class="inline-block bg-yellow-500 text-white rounded px-4 py-2">Edit</a>

            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block bg-red-600 text-white rounded px-4 py-2" onclick="return confirm('Are you sure you want to delete this author?');">Delete</button>
            </form>

            <a href="{{ route('authors.index') }}" class="inline-block bg-gray-500 text-white rounded px-4 py-2">Back</a>
        </div>
    </div>
</div>
@endsection
