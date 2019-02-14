@extends('layouts.app')

@section('content')

  <div id="wrapper" class="clearfix">
    
    <aside id="sidebar">

        {{-- スクロール表示　--}}

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

   

        {{-- チェックボックス表示　--}}
        {{--
                {!! Form::open(['method' => 'post']) !!}
                {{ csrf_field() }}
                    {!! Form::submit('検索') !!}
                    <div class="form-group">
                        <ol>
                            @foreach ($keys as $key)
                                <li><input type="checkbox" name="checkkey[]" value="{{$key->grc_keyword}}">{{ $key->grc_keyword }}</li>
                            @endforeach
                        </ol>
                    </div>
                {!! Form::close() !!}
        --}}     
    </aside>  
      
    <div id="main">
            @include('pickupkeys.pickupkeys', ['orders' => $orders,])
    </div>


  </div> 

    {!! $orders->render() !!}
@endsection