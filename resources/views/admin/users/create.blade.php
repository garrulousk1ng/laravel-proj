@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New User</h2>

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

    {{-- Create Form --}}
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <label for="name">Name:</label>
        <input id="name" name="name" placeholder="Full Name" required>

        <label for="email">Email:</label>
        <input id="email" name="email" placeholder="Email Address" required type="email">

        <label for="password">Password:</label>
        <input id="password" name="password" placeholder="Password" required type="password">

        <label>Role</label>
        <select name="role_id" required>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ $role->name === 'user' ? 'selected' : '' }}>
                    {{ ucfirst($role->name) }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="action-btn" style="margin-top: 1rem;">Create User</button>
    </form>
</div>
@endsection
