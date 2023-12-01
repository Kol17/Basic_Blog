<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description,50);

        $newName = "cover_".uniqid().".".$request->file('cover')->getClientOriginalExtension();
        $request->file('cover')->storeAs("public/cover",$newName);
        $post->cover = $newName;

        $post->user_id = Auth::id();
        $post->save();

        // return $post->cover;
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return redirect()->route('post.detail',$post->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // return $request;
        $post->title = $request->title;
        $post->slug = Str::slug($post->title);

        $post->description = $request->description;
        $post->excerpt = Str::words($post->description,50);

        if($request->hasFile('cover')){
            $newName = "cover_".uniqid().".".$request->file('cover')->extension();
            $request->file('cover')->storeAs('public/cover',$newName);
            $post->cover = $newName;
        }
        $post->user_id = Auth::id();

        $post->update();

        // return $post;

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post){
            $post->delete();
        }
        return redirect()->route('index');
    }
}
