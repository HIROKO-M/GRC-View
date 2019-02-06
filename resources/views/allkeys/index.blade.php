@extends('layouts.app')

@section('content')

    @include('allkeys.allkeys', [ 'orders' => $orders, ])
    
@endsection