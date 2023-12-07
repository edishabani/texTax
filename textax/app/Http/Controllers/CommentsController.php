<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment; // Add this import statement

class CommentsController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'thread_id' => 'required',
            'content' => 'required',
        ]);

        $comment = new Comment([
            'thread_id' => $request->get('thread_id'),
            'content' => $request->get('content'),
        ]);

        $comment->save();

        return response()->json('Comment Added Successfully.');
    }
}
