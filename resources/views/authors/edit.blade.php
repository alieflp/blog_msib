@extends('layouts.app')

@section('title', 'Edit Author')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Edit Author</h1>
    <a href="{{ route('authors.index') }}" class="inline-block bg-gray-500 text-white rounded px-4 py-2 mt-4">Back</a>

    @if ($errors->any())
        <div class="mt-6">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('authors.update', $author->id) }}" method="POST" class="mt-6 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $author->email) }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div>
            <label for="phone_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $author->phone_number) }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md">
        </div>

        <div>
            <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bio</label>
            <textarea name="bio" id="bio" class="block w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('bio', $author->bio) }}</textarea>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-indigo-600 text-white rounded-md px-4 py-2">Update</button>
        </div>
    </form>
</div>
@endsection
