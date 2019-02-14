@extends('layouts.app')

@section('content')
    
    @include('allkeys.allkeys', ['orders' => $orders,])
    
    {!! link_to_route('pickupkeys.index', 'Pickup キーワード詳細ページへGo！', null, ['class' => 'btn btn-primary']) !!}
    
    {!! link_to_route('rankings.index', 'Pickup キーワード日別一覧ページへGo！', null, ['class' => 'btn btn-default']) !!}
   
   
    
@endsection

