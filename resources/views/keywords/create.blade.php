@extends('layouts.app')

@section('content')

    <h1>検索キーワード追加ページ</h1>

    <div class="row">
        <div class="col-xs-6">
            {!! Form::model($keyword, ['route' => 'keywords.store']) !!}
                <div class="form-group">
                    {!! Form::label('keyword', '検索キーワード：') !!}
                    {!! Form::text('keyword', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('site_name', 'サイト名：') !!}
                    {!! Form::text('site_name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('site_url', 'サイトURL：') !!}
                    {!! Form::text('site_url', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection