
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
        'searching': false,
        'ordering': true,

        "order": [],

        scrollX: 600,
        scrollY: 200
    });
});
</script>

        @if(count($orders) > 0)
            <table id="datatables" class="table table-striped">
                <thead>
                    <tr>
                        <th>サイト名</th>
                        <!-- <th>サイトURL</th> -->
                        <th>検索キーワード</th>
                        <th>Yahoo順位</th>
                        <th>Yahoo変化</th>
                        <th>Yahoo件数</th>
                        <th>Yahoo URL</th>
                        <th>Google順位</th>
                        <th>Google変化</th>
                        <th>Google件数</th>
                        <th>Google URL</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->grc_site_name }}</td>
                        <!--<td>{{ $order->grc_site_url }}</td> -->
                            <td>{{ $order->grc_keyword }}</td>
                            <td>{{ $order->y_rank }}</td>
                            <td>{{ $order->y_change }}</td>
                            <td>{{ $order->y_count }}</td>
                            <td>{{ $order->y_url }}</td>
                            <td>{{ $order->g_rank }}</td>
                            <td>{{ $order->g_change }}</td>
                            <td>{{ $order->g_count }}</td>
                            <td>{{ $order->g_url }}</td>
                        </tr>
                    @endforeach
                    
                    {!! $orders->render() !!}
                </tbody>
            </table>
        @else
        <p>本日分のCSVファイルデータがありません。</p>
        <p>CSVファイルをインポートしてください。</p>
        
        @endif


