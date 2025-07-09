@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Details</h2>

    <div class="post-card">
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst($user->role->name ?? 'N/A') }}</p>
        <p><strong>Registered at:</strong> {{ $user->created_at->format('F j, Y h:i A') }}</p>

        <div class="action-group">
            <a href="{{ route('admin.users.edit', $user) }}" class="action-btn">Edit</a>

            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="action-btn delete" onclick="return confirm('Delete this user?')">Delete</button>
            </form>
        </div>
    </div>

    <a href="{{ route('admin.users.index') }}" class="read-more">← Back to User List</a>
</div>
@endsection
