@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $category->name }}</h1>
                <p class="card-text">{{ $category->description }}</p>

                <div class="mt-3">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit Category</a>

                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                    </form>

                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Category List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
