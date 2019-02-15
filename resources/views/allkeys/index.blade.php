@extends('layouts.app')

@section('content')
    
    @include('allkeys.allkeys', ['orders' => $orders,])
    
    {!! link_to_route('pickupkeys.index', 'Pickup キーワード詳細ページへGo！', null, ['class' => 'btn btn-primary']) !!}
    
    {{-- {!! link_to_route('rankings.index', 'Pickup キーワード日別一覧ページへGo！', null, ['class' => 'btn btn-default']) !!}--}}

<br>
<br>
   
<div id="wrapper" class="clearfix">
    <aside id="sidebar">
    {{-- チェックボックス表示　--}}

        {!! Form::open(['method' => 'post']) !!}
        {{ csrf_field() }}
            <div class="form-group">
                    @foreach ($keys as $key)
                        <input type="checkbox" name="checkkey" value="{{$key->grc_keyword}}">{{ $key->grc_keyword }}
                    @endforeach
            </div>
            {!! Form::submit('検索') !!}
        {!! Form::close() !!}
    </aside>
</div>

<h3>キーワード：{{$selkey}}</h3>

<div class="chart">
    
<!--    <pre>
        < ?php
            var_dump($yranks);

            $data_list = [1,2,3,4];
            
            var_dump($data_list);

        ?>
    </pre>
-->

<canvas id="myChart" width="600" height="100"></canvas>
<script>
var day= JSON.parse('<?php echo json_encode($checkeddays); ?>');

var granking= JSON.parse('<?php echo json_encode($granks); ?>');
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
            }, {
            label: "Google Ranking",
            backgroundColor: 'rgb(255, 255, 255)',
            borderColor: 'rgb(54, 162, 235)',
            data: granking,
            fill: false,
            lineTension: 0,             // ペルジェ曲線→直線
        }
        ]
    },

    // Configuration options go here
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    reverse: true,//reverse: true, //y軸の反転(1位を上にして昇順で表示)
                    max: 10,
                    min: 0,
                    stepSize: 1,
                    callback: function(value){
                     return value+'位';  //labelに「〜位」をつける
                    } 
                }
            }],
            xAxes: [{
                ticks: {
                    reverse: false, //x軸は反転しない
                }
            }]
        }
    },
});
</script>
</div>


@endsection

