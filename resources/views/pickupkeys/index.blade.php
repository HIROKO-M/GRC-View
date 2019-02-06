@extends('layouts.app')

@section('content')

{!! Form::open(['method' => 'GET']) !!}
    {{ csrf_field() }}
    {!! Form::text('s', null) !!}
    {!! Form::submit('検索') !!}
{!! Form::close() !!}
    
    @include('pickupkeys.pickupkeys', ['orders' => $orders,])
    
@endsection