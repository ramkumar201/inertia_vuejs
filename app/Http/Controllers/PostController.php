<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use App\Repositories\Post\PostRepositories;
use App\Traits\verifyStoreImage;


class PostController extends Controller
{
    // Using Traits - Video
     use verifyStoreImage;

    protected $post;

    # Repository
    public function __contruct(PostRepositories $post)
    {
        $this->post = $post;
    }

    #index method
    public function index()
    {
        $posts = Post::all();
        return Inertia::render('Posts/index', ['posts' => $posts]);
    }

    #create view
    public function create()
    {
        return Inertia::render('Posts/add');
    }

    #store method
    public function store(PostCreateRequest $request)
    {
        #new store method
        Post::create($request->all());
        // $post = $this->post->create($request->all());
        $posts = Post::all();
        return Inertia::render('Posts/index',[
                'posts'=>$posts,
                'success' => 'Post Created Successfully.'
            ]);
    }

    #show method
    public function show($id)
    {
        $post = Post::findorFail($id);
        return Inertia::render('Posts/view',['post'=>$post]);
    }

    #edit view
    public function edit($id)
    {
        $post = Post::findorFail($id);
        return Inertia::render('Posts/edit', ['post' => $post]);
    }

    #update method
    public function update(Post $post,PostCreateRequest $request)
    {
        // $this->post->update($request->id, $request->all());
        $post->update($request->all());
        return redirect()->route('posts.index')->with(['success' => 'Post Updated.']);
    }

    #delete method
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('success','Post Deleted.');
    }
}
