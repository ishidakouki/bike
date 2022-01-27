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

        $attachments = ['','','','','']; // DB保存用に投稿画像保存時のパスを格納する配列を用意
        foreach ($request->file('attachments') as $index => $e) {
        $ext = $e['photo']->guessExtension(); // 拡張子を取得
        $filename = date('YmdHis') . $index .'.'. $ext; // 保存時のファイル名を決定（今回は、日時+連番を指定）
        $uploadPath = $e['photo']->storeAs('public/uploads', $filename); // 画像保存　&　保存パス取得
        $attachments[$index] = $uploadPath; // 保存パスをセット
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
                'attachment1'  => $attachments[0],
                'attachment2'  => $attachments[1],
                'attachment3'  => $attachments[2],
                'attachment4'  => $attachments[3],
                'attachment5'  => $attachments[4],
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
