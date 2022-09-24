<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Faker\Generator as Faker;

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
        $posts = Post::where('user_id', Auth::id())->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $tags = Tag::all();
        return view('admin.posts.create', compact('post','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faker $faker)
    {
        $sentData = $request->all();
        $post = new Post();
        $sentData['post_image'] = $faker->imageUrl();
        $post->create($sentData);
        return redirect()->route('admin.posts.index',compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $tags = $post->tags;
        return view('admin.posts.show', compact('post', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Faker $faker)
    {
        $sentData = $request->all();
        $post = Post::findOrFail($id);
        $sentData['post_image'] = $faker->imageUrl();
        $post->update($sentData);
        $post->tags()->sync($sentData['tags']);
        return redirect()->route('admin.posts.index',compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id',$id)->first();
        Post::destroy($post->id);
        return redirect()->route('admin.posts.index');
    }
}
