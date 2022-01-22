@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-2 mx-auto">
  エラー表示
</div>

@foreach ($posts as $post)
<div class="col-md-8 col-md-2 mx-auto">
    <div class="card-wrap">
        <div class="card mt-3">
            <div class="card-header align-items-center d-flex">
                <a class="no-text-decoration" href="">
                    <i class="fas fa-user-circle fa-2x mr-1"></i>
                </a>
                <a class="black-color" title="" href="">
                    <strong>
                      出品者
                    </strong>
                </a>
            </div>
            <div class="card-body">
                <div class="post_edit text-right">
                    <form class="btn btn-primary btn-sm" href="">
                        <i class="far fa-edit"></i>編集
                    </form>
                    <form class="edit_button" method="post" action="{{ route('posts.destroy', $post->id )}}" accept-charset="UTF-8">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-size btn-danger" rel="nofollow" >
                            <i class="far fa-trash-alt"></i>削除</button>
                    </form>
                </div>

                <h3 class="h5 title">
                    {{ $post->name }}
                </h3>
                <div class="mb-5">
                    {{ $post->year }}
                </div>
                <div class="mb-5">
                    {{ $post->price }}
                </div>
                @foreach((array)$post->attachment as $attachment)
                <div class="mb-5">
                    <img src="{{ $attachment->url??'' }}"/>
                </div>
                @endforeach
                <div class="mb-5">
                    {{ $post->explanation }}
                </div>
    <section>


                <!-- コメント --
                <div id="comment-post-1">っy
                    <!-- コメントをここに挿入 -->
                        <div class="m-4">
                            <form class="w-100" action="" method="post">
                                {{ csrf_field() }}
                                    <input name="utf8" type="hidden" value=""/>
                                    <input value="" type="hidden" name="user_id" />
                                    <input value="" type="hidden" name="post_id" />
                                    <input name="" value="" class="form-control comment-input border border-light mx-auto" placeholder="コメントを入力する">
                                    </input>
                                    <div class="text-right">
                                        <input type="submit" value="&#xf075;コメント送信" class="far fa-comment btn btn-default btn-sm">
                                        </input>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endforeach

@endsection
