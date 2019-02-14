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
    
    
    @include('rankings.rankings', ['r_orders' => $r_orders,])


<div class="chart">
<h1>Chart.jsのテスト</h1>

<canvas id="myChart" width="600" height="100"></canvas>
        
        
<?php 

$checkday_array = array();
$checkday_array = $checkeddays;

$yranks_array = array();
$yranks_array = $yranks;

$data_list = [3,19,21,9,16,7,11];
?>

<pre>
    <?php
    // var_dump($selkeys);
    // var_dump($checkeddays);
    // print_r($checkeddays);
    // var_dump($yranks);
    var_dump($data_list);
    var_dump($debug);
    ?>
</pre>


<script>
var day = JSON.parse('<?php echo json_encode($checkday_array); ?>');
var yranking= JSON.parse('<?php echo json_encode($yranks_array); ?>');

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [1,2,3,4,5,6,7], //check_dateの値をx軸として表示されるようにしたい
        datasets: [{
            label: "My First dataset",
            backgroundColor: 'rgb(255, 255, 255)',
            borderColor: 'rgb(255, 99, 132)',
            data: [3,19,21,9,16,7,11],
            fill: false,
        }]
    },

    // Configuration options go here
    option:  {
        scales: {
            yAxes: [{
                ticks: {
                  reverse: true, //y軸の反転(1位を上にして昇順で表示)
                  min: 1,  //最小値を1に
                  max: 10,  //最大値を10に
                  callback: function(value){
                     return value+'位';  //labelに「〜位」をつける
                  }
                }
            }]
        }
    },
});
</script>

</div>





    {!! $r_orders->render() !!}
@endsection