@extends('layouts.app')

@section('content')
    
    @include('allkeys.allkeys', ['orders' => $orders,])
    
    {!! link_to_route('pickupkeys.index', 'Pickup キーワード詳細ページへGo！', null, ['class' => 'btn btn-primary']) !!}
    
<br>
<br>

<h3>キーワード：{{$selkey}}</h3>

<div class="chart">
    


<canvas id="myChart" width="600" height="100"></canvas>
<script>
var day= JSON.parse('<?php echo json_encode($checkeddays); ?>');

var granking= JSON.parse('<?php echo json_encode($granks_rep); ?>');
var yranking= JSON.parse('<?php echo json_encode($yranks_rep); ?>');

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
            spanGaps: false,
            }, 
            {
            label: "Google Ranking",
            backgroundColor: 'rgb(255, 255, 255)',
            borderColor: 'rgb(54, 162, 235)',
            data: granking,
            fill: false,
            lineTension: 0,             // ペルジェ曲線→直線
            spanGaps: false,
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
                    min: 1,
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

