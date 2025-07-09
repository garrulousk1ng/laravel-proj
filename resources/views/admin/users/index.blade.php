@extends('layouts.app')

@section('content')
    <div class="header-bar">
        <h2>User Management</h2>
        <a href="{{ route('admin.users.create') }}" class="action-btn">New User</a>
    </div>

    @if ($users->isEmpty())
        <p>No users found.</p>
    @else
        <div class="post-card">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: left; border-bottom: 2px solid var(--accent);">
                        <th style="padding: 0.5rem;">ID</th>
                        <th style="padding: 0.5rem;">Name</th>
                        <th style="padding: 0.5rem;">Email</th>
                        <th style="padding: 0.5rem;">Role</th>
                        <th style="padding: 0.5rem;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr style="border-bottom: 1px solid #ccc;">
                            <td style="padding: 0.5rem;">{{ $user->id }}</td>
                            <td style="padding: 0.5rem;">{{ $user->name }}</td>
                            <td style="padding: 0.5rem;">{{ $user->email }}</td>
                            <td style="padding: 0.5rem;">{{ ucfirst($user->role->name ?? 'N/A') }}</td>
                            <td style="padding: 0.5rem;">
                                <a href="{{ route('admin.users.show', $user) }}" class="action-btn">View</a>
                                <a href="{{ route('admin.users.edit', $user) }}" class="action-btn">Edit</a>

                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-form" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete" onclick="return confirm('Delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
