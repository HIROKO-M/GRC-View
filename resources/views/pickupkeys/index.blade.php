@extends('layouts.app')

@section('content')

   

   <div class="row">
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
        

{{--キーワードをcheckbox で複数選択する場合に利用。まだ不完全 --}}
{{--
        <aside class="col-xs-4">
        {!! Form::open(['method' => 'post']) !!}
        {{ csrf_field() }}
            <div class="form-group">
                    @foreach ($keys as $key)
                        <input type="checkbox" name="pickupkey[]" value="" {{ is_array(old("$pickkeys")) && in_array("1", old("$pickkeys"), true)? 'checked="checked"' : ''}}>{{ $key->grc_keyword }}
                    @endforeach
                </select>
            </div>
            {!! Form::submit('検索') !!}
        {!! Form::close() !!}
        </aside>
--}}

    </div>
    
    
    @include('pickupkeys.pickupkeys', ['orders' => $orders,])
    
    {!! $orders->render() !!}
@endsection