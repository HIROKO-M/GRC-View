
<h3>最終データ更新日：{{$date}}</h3>



<script>
$(function () {
    $('#datatables').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Japanese.json"
        },
        'pageLength'  : 50,
        'paging'      : true,
        'lengthChange': false,
        'searching': true,
        'ordering': true,

        "order": [],

        scrollX: 730,
        scrollY: 300
    });
});
</script>

        @if(count($orders) > 0)
            <form method="post">
                 {!! csrf_field() !!}
            <table id="datatables" class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>サイト名</th>
                        <!-- <th>サイトURL</th> -->
                        <th>検索キーワード</th>
                        <!-- <th></th> -->
                        <th>Yahoo順位</th>
                        <th>Yahoo変化</th>
                        <th>Yahoo件数</th>
                        <!-- <th>Yahoo URL</th> -->
                        <th>Google順位</th>
                        <th>Google変化</th>
                        <th>Google件数</th>
                        <!-- <th>Google URL</th> -->
                    </tr>
                </thead>
            
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->grc_site_name }}</td>
                        <!--<td>{{ $order->grc_site_url }}</td> -->
                            <td>
                                {!! Form::open(['method' => 'post']) !!}
                                {{ csrf_field() }}
                                    <input type="hidden" name="checkkey" value="{{$order->grc_keyword}}">{{ $order->grc_keyword }}
                                {!! Form::submit('検索') !!}
                                {!! Form::close() !!}
                            </td>
                            
                            <!--<td><input type="hidden" name="checkkey" value="{{$order->grc_keyword}}">{{$order->grc_keyword}}</td>
                            <td><input type="submit" value="選択"></td>-->
                            <td>{{ $order->y_rank }}</td>
                            <td>{{ $order->y_change }}</td>
                            <td>{{ $order->y_count }}</td>
                            <!-- <td>{{ $order->y_url }}</td> -->
                            <td>{{ $order->g_rank }}</td>
                            <td>{{ $order->g_change }}</td>
                            <td>{{ $order->g_count }}</td>
                            <!-- <td>{{ $order->g_url }}</td> -->
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            </form>
        @else
        <p>本日分のCSVファイルデータがありません。</p>
        <p>CSVファイルをインポートしてください。</p>
        
        @endif
        
        
            


