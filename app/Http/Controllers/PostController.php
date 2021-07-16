<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::simplepaginate(3);
        return view('posts.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'tags'=>'required|string',
            'category'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $arrtoStr = implode(',', $request->input('category'));
        $path = 'storage/' . $request->image->store('posts', 'public');

        $post = new Post;
        $post->image = $path;
        $post->user_id = Auth::id();
        $post->tags = $request->tags;
        $post->categories = $arrtoStr;
        $post->title = $request->title;
        $post->content = $request->content;
        
        $post->save();
        return redirect('posts');
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
        $post = Post::firstOrFail($id);
        return view('posts.update', compact('post'));
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
        $post = Post::findOrFail();
        $post->title = $request->title;
        $post->content = $request->content;
        $path = 'storage/' . $request->image->store('posts', 'public');
        $post->image = $path;
        $post->save();
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('posts');
    }

    /**
     * Increase number of claps for post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addClap($id)
    {
        $post = Post::findOrFail($id);
        $post->claps = $post->claps + 1;
        $post->save();
    }


    /**
     * Display all posts of logged in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function currUserPosts()
    {
        $posts = Post::where('user_id', Auth::id())->simplepaginate(3);
        return view('dashboard', compact('posts'));

    }
}
