<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class ThreadsController extends Controller
{
    // Only authenticated users can create, edit, update, and delete threads.
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    // Display a listing of the threads.
    public function index()
    {
        // Fetch 15 threads per page
        $threads = Thread::paginate(15);
        return view('threads.index', compact('threads'));
    }


    // Show the form for creating a new thread.
    public function create()
    {
        return view('threads.create');
    }

    // Store a newly created thread in the database.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $thread = Thread::create($validatedData);

        return redirect()->route('threads.show', $thread);
    }

    // Display the specified thread.
    public function show(Thread $thread)
    {
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

        return redirect()->route('threads.show', $thread);
    }

    // Remove the specified thread from the database.
    public function destroy(Thread $thread)
    {
        $thread->delete();

        return redirect()->route('threads.index');
    }
}
?>
