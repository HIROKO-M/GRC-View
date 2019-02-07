@extends('layouts.app')

@section('content')

   <div class="row">
        <aside class="col-xs-4">
        {!! Form::open(['method' => 'post']) !!}
        {{ csrf_field() }}
            <div class="form-group">
                <select multiple="" name="pickupkeys" class="form-control">
                    @foreach ($keys as $key)
                        <option>{{ $key->grc_keyword }}</option>
                    @endforeach
                </select>
            </div>
            {!! Form::submit('検索') !!}
        {!! Form::close() !!}
        </aside>
    </div>
    
    @include('pickupkeys.pickupkeys', ['orders' => $orders,])
    
@endsection