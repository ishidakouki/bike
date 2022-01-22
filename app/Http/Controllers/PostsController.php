<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', ['posts' => $posts]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(PostRequest $request)
    {
        $post = new Post;
        $post->name = $request->name;
        $post->year = $request->year;
        $post->price = $request->price;
        $post->attachment = implode(',',$request->attachment);
        $post->explanation = $request->explanation;
        $post->user_id = \Auth::id();
        $post->save();

        return redirect()->route('index');
    }
    public function delete($id)
    {
        $post = post::find($id);

        if(Auth::id() == $post->user_id)
        {
            $post -> delete();

            return redirect()->route('index');
        }
        return redirect()->route('index')->with('error','許可されていない操作です');
        }
}
