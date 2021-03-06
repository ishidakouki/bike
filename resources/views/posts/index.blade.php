@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-2 mx-auto">
  @if(session('error'))
       <p class="alert alert-danger">{{ session('error') }}<p>
  @endif

  @include('commons.error_messages')
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
                        <button type="submit" class="btn btn-size btn-danger" rel="nofollow" ><i class="far fa-trash-alt"></i>削除</button>
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
                <div class="mb-5">
                    {{ $post->attachment1 }}
                    <img src="{{ Storage::url($post->attachment1) }}"/>
                </div>
                <div class="mb-5">
                    {{ $post->attachment2 }}
                    <img src="{{ Storage::url($post->attachment2) }}"/>
                </div>
                <div class="mb-5">
                    {{ $post->attachment3 }}
                    <img src="{{ Storage::url($post->attachment3) }}"/>
                </div>
                <div class="mb-5">
                    {{ $post->attachment4 }}
                    <img src="{{ Storage::url($post->attachment4) }}"/>
                </div>
                <div class="mb-5">
                    {{ $post->attachment5 }}
                    <img src="{{ Storage::url($post->attachment5) }}"/>
                </div>
                <div class="mb-5">
                    {{ $post->explanation }}
                </div>
                <section>


                <!-- コメント --
                <div id="comment-post-1">っy
                    <!-- コメントをここに挿入 -->
                    <div id="comment-post-1">
                        <div class="m-4">
                            <form class="w-100" action="{{ route('comments.store') }}" method="post">
                                @csrf
                                    <input name="utf8" type="hidden" value=""/>
                                    <input value="" type="hidden" name="user_id" />
                                    <input value="{{ $post->id }}" type="hidden" name="post_id" />
                                    <input name="comments[{{ $post->id }}]" value="{{ old("comments.$post->id") }}" class="form-control comment-input border border-light mx-auto" placeholder="コメントを入力する">
                                    </input>
                                    <div class="text-right">
                                        <input type="submit" value="&#xf075;コメント送信" class="far fa-comment btn btn-default btn-sm">
                                        </input>
                                    </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </section>

@endforeach

@endsection
