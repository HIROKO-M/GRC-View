@extends('layouts.app')

@section('content')


    <h1>検索キーワード一覧</h1>
    
    @if(count($keywords) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>検索キーワード</th>
                    <th>サイト名</th>
                    <th>サイトURL</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($keywords as $keyword)
                    <tr>
                        <td>{!! link_to_route ('keywords.show', $keyword->id, ['id' => $keyword->id]) !!}</td>
                        <td>{{ $keyword->keyword }}</td>
                        <td>{{ $keyword->site_name }}</td>
                        <td>{{ $keyword->site_url }}</td>
                    </tr>
                @endforeach
            </tbody>
    @endif
    
    


@endsection