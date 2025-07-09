@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User</h2>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="flash-message" style="background: #ffecec; color: #a94442;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="margin-bottom: 0.3rem;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

        <label>Password: <small>(Leave blank to keep current)</small></label>
        <input type="password" name="password" placeholder="New password (optional)">

        <label>Role:</label>
        <select name="role_id" required>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                    {{ ucfirst($role->name) }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="action-btn" style="margin-top: 1rem;">Update User</button>
    </form>
</div>
@endsection