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
                </select>
            </div>
            {!! Form::submit('検索') !!}
        {!! Form::close() !!}
        </aside>
    </div>
    
    
{{--    @include('rankings.rankings', ['r_orders' => $r_orders,])　--}}


<div class="chart">
<h3>{{$key->grc_keyword}}のRanking Chart</h3>

<canvas id="myChart" width="600" height="100"></canvas>
        

<!--<pre>
    <?php
    
    var_dump($selkeys);

    var_dump($yranks);
    var_dump($checkeddays);
    
    
    ?>
</pre>-->


<script>
var day= JSON.parse('<?php echo json_encode($checkeddays); ?>');
var yranking= JSON.parse('<?php echo json_encode($yranks); ?>');

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: day, //check_dateの値をx軸として表示されるようにしたい
        datasets: [{
            label: "Yahoo Ranking",
            backgroundColor: 'rgb(255, 255, 255)',
            borderColor: 'rgb(255, 99, 132)',
            data: yranking,
            fill: false,
            lineTension: 0,             // ペルジェ曲線→直線
        }]
    },

    // Configuration options go here
    option:  {
        scales: {
            yAxes: [{
                ticks: {
                  reverse: true, //y軸の反転(1位を上にして昇順で表示)
                  
                }
            }]
        }
    },
});
</script>

</div>





    {!! $r_orders->render() !!}
@endsection