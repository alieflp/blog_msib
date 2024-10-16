@extends('layouts.app')

@section('title', 'Author Details')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ $author->name }}</h1>
            <p class="card-text"><strong>Email:</strong> {{ $author->email }}</p>
            @if($author->phone_number)
                <p class="card-text"><strong>Phone Number:</strong> {{ $author->phone_number }}</p>
            @endif
            @if($author->bio)
                <p class="card-text"><strong>Bio:</strong> {{ $author->bio }}</p>
            @endif

            <div class="mt-3">
                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Edit Author</a>

                <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this author?');">Delete</button>
                </form>

                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back to Authors List</a>
            </div>
        </div>
    </div>
</div>
@endsection
