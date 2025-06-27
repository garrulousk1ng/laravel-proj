@extends('layouts.app')

@section('content')
<h2>Create Post</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <label>Title:</label>
    <input type="text" name="title" value="{{ old('title') }}" required>

    <label>Description:</label>
    <textarea name="description" required>{{ old('description') }}</textarea>

    <button type="submit">Save</button>
</form>
@endsection
