<?php
// app/Http/Controllers/ThreadController.php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ThreadController extends Controller
{
    public function index()
    {
        $threads = Thread::latest()->get();
        return Inertia::render('threads/index', [
            'threads' => $threads,
        ]);
    }

    public function create()
    {
        return view('threads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            // Add any additional validation rules based on your needs
        ]);
    
        $thread = Thread::create([
            'user_id' => auth()->id(), // Assuming you have a user_id column in your threads table
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            // Add any additional fields you have in your threads table
        ]);
    
        return redirect()->route('threads.show', $thread)->with('success', 'Thread created successfully.');
    }
    

    public function show(Thread $thread)
    {
        return view('threads.show', compact('thread'));
    }

    public function edit(Thread $thread)
    {
        return view('threads.edit', compact('thread'));
    }

    public function update(Request $request, Thread $thread)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            // Add any additional validation rules based on your needs
        ]);
    
        $thread->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            // Add any additional fields you have in your threads table
        ]);
    
        return redirect()->route('threads.show', $thread)->with('success', 'Thread updated successfully.');
    }
    

    public function destroy(Thread $thread)
    {
        // Perform any additional checks, e.g., if the authenticated user is the thread owner
        $this->authorize('delete', $thread);
    
        $thread->delete();
    
        return redirect()->route('threads.index')->with('success', 'Thread deleted successfully.');
    }
    
}
