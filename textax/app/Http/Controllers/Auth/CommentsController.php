<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Thread;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread // Add the correct type hint for the Thread parameter
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Thread $thread)
    {
        $request->validate([
            'body' => 'required|max:500',
        ]);

        $comment = new Comment;
        $comment->user_id = auth()->id();
        $comment->thread_id = $thread->id;
        $comment->body = $request->body;
        $comment->save();

        return redirect()->back();
    }
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }
}
