@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
    <h1>User Profile</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Phone Number: {{ $user->phone_number }}</p>
            <p class="card-text">Joined at: {{ $user->created_at->format('d M Y') }}</p>
        </div>
    </div>
@endsection
