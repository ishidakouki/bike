@extends('layouts.app')

@section('content')

<div class="panel-body">
    <div class="d-flex flex-column align-items-center mt-5">
        <div class="col-xl-7 col-lg-8 col-md-10 col-sm-11 post-card">
        @include('commons.error_messages')
            <div class="card">
                <div class="card-header">
                出品作成
                </div>
                <div class="card-body">
                    <form class="upload" id="new_post" enctype="multipart/form-data" action="{{ route('post.store') }}" accept-charset="UTF-8" method="POST">
                    @method('POST')
                    {{csrf_field()}}
                        <div class="md-form">
                            <input class="form-control" placeholder="車両名" name="name" value=""/>
                        </div>
                        <div class="md-form">
                            <input class="form-control" placeholder="年式" name="year" value=""/>
                        </div>
                        <div class="md-form">
                            <input class="form-control" placeholder="価格" name="price" value=""/>
                        </div>
                        <div class="md-form">
                            <input class="form-control" type="file"  placeholder="" name="attachment[]" multiple value=""  >
                        </div>
                        <div class="form-group">
                            <textarea name="explanation" class="form-control" rows="10" placeholder="説明"></textarea>
                        </div>
                        <div class="text-center">
                            <input type="submit" name="commit" value="出品する" class="btn btn-primary w-25" data-disable-with="投稿する"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
