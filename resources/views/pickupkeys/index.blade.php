@extends('layouts.app')

@section('content')

   <div class="row">
{{-- スクロール表示　--}}
{{--
        <aside class="col-xs-4">
        {!! Form::open(['method' => 'post']) !!}
        {{ csrf_field() }}
            <div class="form-group">
                <select multiple="" name="pickupkey" class="form-control">
                    @foreach ($keys as $key)
                        <option>{{ $key->grc_keyword }}</option>
                    @endforeach
                </select>
            </div>
            {!! Form::submit('検索') !!}
        {!! Form::close() !!}
        </aside>
--}}        

{{-- チェックボックス表示　--}}
        <aside class="col-xs-4">
        {!! Form::open(['method' => 'post']) !!}
        {{ csrf_field() }}
            <div class="form-group">
                    @foreach ($keys as $key)
                        <input type="checkbox" name="checkkey[]" value="{{$key->grc_keyword}}">{{ $key->grc_keyword }}
                    @endforeach
            </div>
            {!! Form::submit('検索') !!}
        {!! Form::close() !!}
        </aside>
    </div>
    
    
    @include('pickupkeys.pickupkeys', ['orders' => $orders,])
    
<pre>
    <?php
    var_dump($checkkeys);
    var_dump($orders);
    ?>
</pre>


    {!! $orders->render() !!}
@endsection