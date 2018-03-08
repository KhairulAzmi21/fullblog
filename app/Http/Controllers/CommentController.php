<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->body    = $request->comment;
        $comment->save();

        session()->flash('success', 'comment berjaya dicipta');

        return redirect()->route('posts.show', $request->post_id);
    }
}
