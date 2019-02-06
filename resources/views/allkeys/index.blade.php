@extends('layouts.app')

@section('content')
    
    @include('allkeys.allkeys', ['orders' => $orders,])
    
    {!! link_to_route('pickupkeys.index', 'Pickup キーワード詳細ページへGo！', null, ['class' => 'btn btn-primary']) !!}
    
@endsection