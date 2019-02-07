@extends('layouts.app') 

@section('content')

    <h1>検索キーワード編集ページ</h1>
    

     <div class="row">
        <div class="col-xs-6">
            {!! Form::model($keyword, ['route' => ['keywords.update', $keyword->id], 'method' => 'put']) !!}
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
                
                {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection