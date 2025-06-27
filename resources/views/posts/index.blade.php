@extends('layouts.app')

@section('content')
    <div class="header-bar">
        <h2>All Posts</h2>
        @auth
            <a href="{{ route('posts.create') }}" class="action-btn">Create New Post</a>
        @else
            <a href="{{ route('login') }}" class="action-btn" onclick="alert('Please log in to create a post.')">Create New Post</a>
        @endauth
    </div>

    @forelse ($posts as $post)
        <div class="post-card">
            <div class="post-header">
                <h3>{{ $post->title }}</h3>
                <p><strong>Author:</strong> {{ $post->user->name }}</p>

                @auth
                    @if ($post->user_id === auth()->id())
                        <div class="action-group">
                            <a href="{{ route('posts.edit', $post) }}" class="action-btn">Edit</a>

                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete">Delete</button>
                            </form>
                        </div>
                    @endif
                @endauth

            </div>

            <p>{{ Str::limit($post->description, 120) }}</p>
            <a href="{{ route('posts.show', $post->id) }}" class="read-more">Read more →</a>
        </div>
    @empty
        <div class="post-card">
            <p>No blog posts found.</p>
        </div>
    @endforelse
@endsection
