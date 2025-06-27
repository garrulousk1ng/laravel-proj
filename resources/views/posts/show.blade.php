@extends('layouts.app')

@section('content')
<h2>{{ $post->title }}</h2>
<p><strong>Author:</strong> {{ $post->user->name }}</p>
<p>{{ $post->description }}</p>
<a href="{{ route('posts.edit', $post) }}">Edit</a>
<a href="{{ route('posts.index') }}">Back</a>

<h3>Comments</h3>

@if(session('error'))
    <div class="flash-message">{{ session('error') }}</div>
@endif

@auth
<form action="{{ route('comments.store', $post) }}" method="POST">
    @csrf
    <label for="comment_text">Leave a comment:</label>
    <textarea name="comment_text" required></textarea>
    <button type="submit">Comment</button>
</form>
@endauth

@guest
    <p><em>You must be logged in to comment.</em></p>
@endguest

<hr>

@forelse($post->comments as $comment)
    <div class="post-card">
        <p>
            <strong>{{ $comment->user->name }}</strong>
            <small>{{ $comment->created_at->diffForHumans() }}</small>
        </p>
        <p>{{ $comment->comment_text }}</p>

        @auth
            @if(Auth::id() === $comment->user_id || Auth::id() === $post->user_id)
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline-form">
                    @csrf
                    @method('DELETE')
                    <button class="action-btn delete" onclick="return confirm('Delete this comment?')">Delete</button>
                </form>
            @endif
        @endauth
    </div>
@empty
    <p>No comments yet.</p>
@endforelse
@endsection
