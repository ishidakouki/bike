@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="form-wrap col-xs-6 col-lg-4">
            <div class="form-group text-center">
                <h2 class="logo-img mx-auto">
                新規登録
                </h2>
            </div>
            {!! Form::open(['route'=>'signup.post']) !!}
            @csrf
            <div class="form-group col-mb-5">
                <div class="form-group">
                    {!! Form::email('email', old('email'), ['class' => 'form-control','placeholder' => 'メールアドレス']) !!}
                </div>

                <div class="form-group">
                    {!! Form::text('name', old('name'), ['class' => 'form-control','placeholder' => 'ユーザー名']) !!}
                </div>

                <div class="form-group">
                    {!! Form::password('password',['class' => 'form-control','placeholder' => 'パスワード']) !!}
                </div>

                <div class="form-group">
                    {!! Form::password('password_confirmation',['class' =>'form-control','placeholder' =>'パスワード再確認']) !!}
                </div>
            </div>

                <div class="actions text-center">
                    {!! Form::submit('新規登録',['class' => 'btn btn-danger w-auto']) !!}
                </div>
            {!! Form::close() !!}
            <br>
                <p class="devise-link text-center mb-5">アカウントを既にお持ちの場合⇨{!! link_to_route('login', 'ログインする') !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection
