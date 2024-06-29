<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

/**
 * All the methods required to CRUD a post resource
 *
 * https://laravel.com/docs/7.x/eloquent
 */

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
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
            $request->title => 'required',
            $request->slug => 'required',
            $request->image => 'required',
            $request->content => 'required',
            $request->published_at => 'required'
        ]);

         Post::create($request->all());

         return response()->json([
            "message" => "Post Created successfully!";
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response()->json([
            "message" => "success!",
        "post" => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return response()->json([
            "message" => "Post updated successfully!",
            "post" => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            "message" => "Post deleted successfully!",
        ]);

    }
}
