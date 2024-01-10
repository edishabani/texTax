<?php
namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Comment;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{

    public function unvoteThread(Request $request, Thread $thread)
    {
        $vote = Vote::where('user_id', auth()->id())
                     ->where('votable_id', $thread->id)
                     ->where('votable_type', 'App\\Models\\Thread')
                     ->first();

        if (!$vote) {
            return response()->json(['error' => 'You have not voted on this thread'], 400);
        }

        $vote->delete();

        return response()->json(['message' => 'Successfully unvoted']);
    }
    public function upvoteThread(Request $request, Thread $thread)
    {
        $vote = Vote::where('user_id', auth()->id())
                     ->where('votable_id', $thread->id)
                     ->where('votable_type', 'App\\Models\\Thread')
                     ->first();

        if ($vote) {
            return response()->json(['error' => 'You have already voted on this thread'], 400);
        }

        $thread->upvotes()->create(['user_id' => auth()->id()]);

        return response()->json(['message' => 'Successfully upvoted']);
    }

    public function downvoteThread(Request $request, Thread $thread)
    {
        $vote = Vote::where('user_id', auth()->id())
                     ->where('votable_id', $thread->id)
                     ->where('votable_type', 'App\\Models\\Thread')
                     ->first();

        if ($vote) {
            return response()->json(['error' => 'You have already voted on this thread'], 400);
        }

        $thread->downvotes()->create(['user_id' => auth()->id()]);

        return response()->json(['message' => 'Successfully downvoted']);
    }

    public function upvoteComment(Comment $comment)
    {
        // Increment the upvotes count on the comment
        $comment->increment('upvotes');

        // Return the new upvotes count
        return response()->json(['upvotes' => $comment->upvotes]);
    }
    public function downvoteComment(Comment $comment)
    {
        // Decrement the upvotes count on the comment
        $comment->decrement('upvotes');

        // Return the new upvotes count
        return response()->json(['upvotes' => $comment->upvotes]);
    }
}
?>
