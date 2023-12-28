<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use Illuminate\Support\Facades\Log;

class ThreadsController extends Controller
{
    // Only authenticated users can create, edit, update, and delete threads.
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    // Display a listing of the threads.
    public function index(Request $request)
    {
        $query = Thread::query();

        if ($request->has('filter')) {

                }

        if ($request->has('sort')) {
            // Apply your sort logic here
        }

        $threads = $query->paginate(30);

        return view('threads.index', compact('threads'));
    }


    // Show the form for creating a new thread.
    public function create()
    {
        return view('threads.create');
    }
    // Show my threads.
    public function myThreads()
    {

        $userId = auth()->id();
        Log::info("Authenticated user ID: $userId");

        $threads = Thread::where('user_id', $userId)->get();

        foreach ($threads as $thread) {
        Log::info("Thread ID: {$thread->id}, User ID: {$thread->user_id}");
        }

        return view('threads.my', compact('threads'));
    }

    // Store a newly created thread in the database.
    public function store(Request $request)
    {
    try {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $thread = Thread::create([
            'user_id' => auth()->id(),
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
        ]);

        // Flash a success message to the session
        session()->flash('message', 'Thread successfully created.');

        return redirect()->route('threads.my', $thread);
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return back()->withInput()->withErrors('An error occurred while creating the thread.');
    }
    }

    // Display the specified thread.
    public function show($id)
    {
        $thread = Thread::with('comments.user')->find($id);
        return view('threads.show', compact('thread'));
    }

    // Show the form for editing the specified thread.
    public function edit(Thread $thread)
    {
        return view('threads.edit', compact('thread'));
    }

    // Update the specified thread in the database.
    public function update(Request $request, Thread $thread)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $thread->update($validatedData);

        return redirect()->route('threads.update', $thread);
    }

    // Remove the specified thread from the database.
    public function destroy(Request $request, Thread $thread)
    {

        $thread->delete();

        return redirect('my-threads');
    }
}

?>

