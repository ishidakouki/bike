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
        $attachment = $request->attachment;
            //アップロードに成功しているか確認
        if($request->file('attachment')->isValid())
        if($attachment){
            $attachmentPath = $attachment->store('public/uploads');
        }else{
            $attachmentPath = "";
        }

        $user = Auth::user();
        if ($user->id) {
            $userId = $user->id;
        }

        if (isset($user_id) && isset($attachment))
            $post = [
                'user_id'      => $request->user_id,
                'name'         => $request->name,
                'year'         => $request->year,
                'price'        => $request->price,
                'attachment1'  => $request->attachment1,
                'attachment2'  => $request->attachment2,
                'attachment3'  => $request->attachment3,
                'attachment4'  => $request->attachment4,
                'attachment5'  => $request->attachment5,
                'explanation'       => $request->explanation,
                'user_id'           => $userId,
                'resist_date'       => date('Y-m-d H:i:s'),
                //DBにはファイルパスを保存！！！！！！
                'attachment'     => $attachmentPath,
                'delete_flag'       => '',
            ];

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
