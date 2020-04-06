<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'description' => 'required'
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->id,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return back()->with('success', 'Your comment has been saved');
    }
}
