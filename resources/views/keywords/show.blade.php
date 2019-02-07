@extends('layouts.app')

@section('content')

    <h1>検索キーワード詳細ページ</h1>
    
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $keyword->id }}</td>
        </tr>
        <tr>
            <th>検索キーワード</th>
            <td>{{ $keyword->keyword }}</td>
        </tr>
        <tr>
            <th>サイト名</th>
            <td>{{ $keyword->site_name }}</td>
        </tr>
        <tr>
            <th>サイトURL</th>
            <td>{{ $keyword->site_url }}</td>
        </tr>
    </table>
    
    {!! link_to_route('keywords.edit', 'このキーワードを編集する', ['id' => $keyword->id], ['class' => 'btn btn-default']) !!} 
    
    {!! Form::open(['route' => ['keywords.destroy', $keyword->id], 'method' => 'delete']) !!}
        {!! Form::submit("削除",  ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}


@endsection