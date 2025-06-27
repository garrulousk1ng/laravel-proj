@extends('layouts.app')

@section('content')
<h2>Edit Post</h2>

<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Title:</label>
    <input type="text" name="title" value="{{ old('title', $post->title) }}" required>

    <label>Description:</label>
    <textarea name="description" required>{{ old('description', $post->description) }}</textarea>

    <button type="submit">Update</button>
</form>
@endsection
