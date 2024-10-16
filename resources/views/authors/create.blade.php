@extends('layouts.app')

@section('title', 'Create Author')

@section('content')
<div class="container">
    <h1>Create Author</h1>
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

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control">
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Create</button>
    </form>
</div>
@endsection
