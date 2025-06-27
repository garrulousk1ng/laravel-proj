<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        if (!auth()->check()) {
            return back()->with('error', 'You must be logged in to comment.');
        }

        $request->validate([
            'comment_text' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'comment_text' => $request->comment_text,
        ]);

        return back()->with('success', 'Comment posted.');
    }

    public function destroy(Comment $comment)
    {
        $user = auth()->user();

        if ($comment->user_id === $user->id || $comment->post->user_id === $user->id) {
            $comment->delete();
            return back()->with('success', 'Comment deleted.');
        }

        abort(403, 'Unauthorized');
    }
}
