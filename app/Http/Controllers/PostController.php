<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable store all the blog post from database
        $posts = Post::all();

        // return view and pass the variable above
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            // rules
            'title' => 'required|max:190',
            'body'  => 'required'
        ));

        // store in the database
        $post = new Post;

        $post->title    = $request->title;
        $post->body     = $request->body;

        $post->save();

        Session::flash('success', 'The blog post was successfully save!');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find post in database and store in a variable
        $post = Post::find($id);

        // return the view and pass in the variable
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the data
        $this->validate($request, array(
            // rules
            'title' => 'required|max:190',
            'body'  => 'required'
        ));

        // save the data to database
        $post = Post::find($id);

        $post->title    = $request->input('title');
        $post->body     = $request->input('body');

        $post->save();

        // set flash success message
        Session::flash('success', 'This post was successfully updated!');

        // redirect with flash message to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find data want to delete
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post was successfully deleted!');

        return redirect()->route('posts.index');
    }
}
