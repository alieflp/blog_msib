@extends('layouts.app')

@section('title', 'Create Author')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Create Author</h1>
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

    <form action="{{ route('authors.store') }}" method="POST" class="mt-6 space-y-6">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <input type="text" name="name" id="name" class="block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" name="email" id="email" class="block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div>
            <label for="phone_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="block w-full px-3 py-2 border border-gray-300 rounded-md">
        </div>

        <div>
            <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bio</label>
            <textarea name="bio" id="bio" class="block w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-indigo-600 text-white rounded-md px-4 py-2">Create</button>
        </div>
    </form>
</div>
@endsection
