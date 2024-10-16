@extends('layouts.app')

@section('title', 'Edit Author')

@section('content')
<div class="container">
    <h1>Edit Author</h1>
    <a href="{{ route('authors.index') }}" class="btn btn-outline-secondary mb-3">Back</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $author->email) }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $author->phone_number) }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control">{{ old('bio', $author->bio) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
