<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // select * from table posts;
        $posts = Post::get();
        //return view dalam folder resources/views/posts/index.blade.php dengan compact kan variable $posts
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        //return view dalam folder resources/views/posts/create.blade.php
        return view('posts.create');
    }

    public function store(Request $request)
    {

        //validate
        $request->validate([
            'title' => 'required|min:5',
            'content'  => 'required|min:10',
        ]);

        //create new object of class Post
        //create ke table posts
        $post              = new Post;
        $post->title       = $request->title;
        $post->content     = $request->content;
        $post->category_id = $request->category_id;
        $post->save();

        session()->flash('success', 'post berjaya dicipta');
        //link documentation : https://laravel.com/docs/5.6/session#introduction

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        //retrieve data daripada database single data
        // code dibawah sama dengan "select * from table posts where id = $id;"
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        // retrieve data from database with id = $id menggunakan Model Post;
        //$post = Post::where('id', $id)->first();
        $post = Post::find($id);
        // return view bersama dengan single Model Post
        return view('posts.edit', compact('post'));
    }
    /**
     * for update we will get request from form
     * and also $id data we want to update
     */
    public function update(Request $request, $id)
    {
        //validate
        $request->validate([
            'title'    => 'required|min:5',
            'content'  => 'required|min:10',
        ]);
        // retrieve data from database with id = $id menggunakan Model Post;
        $post = Post::find($id);
        // update ke database
        $post->title = $request->title;
        $post->content  = $request->content;
        $post->save();
        // session untuk flash berjaya update
        session()->flash('success', 'post berjaya dikemaskini');
        // return view index.blade.php
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        // retrieve data from database with id = $id menggunakan Model Post;
        $post = Post::find($id);
        // delete
        $post->delete();
        // session berjaya delete
        session()->flash('success', 'Post telah berjaya dibuang');
        // return view index
        return redirect()->route('posts.index');
    }
}
