<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class ThreadsController extends Controller
{
/**
 * Display a listing of the threads.
 *
 * @return \Illuminate\Contracts\View\View
 */
public function index()
{
    $threads = Thread::all();

    return view('threads.index', compact('threads'));
}

    /**
     * Store a newly created thread in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $thread = new Thread([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);

        $thread->save();

        return redirect('/threads')->with('success', 'Thread Added Successfully.');
    }
}
