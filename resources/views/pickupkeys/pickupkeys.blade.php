<h3>キーワード：{{$checkkeys}}</h3>


<script>
$(function () {
    $('#datatables').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Japanese.json"
        },
        pageLength  : 500,
        paging      : true,     // ページング機能 無効
        lengthChange: false,    // 件数切替機能 無効
        searching   : false,    // 検索機能 無効
        ordering    : true,     // ソート機能 無効

        order: [],

//        scrollX: true,          // 横スクロールバーを有効にする
//        scrollY: 500,            // 縦スクロールバーを有効にする ("500px"など「最大の高さ」を指定)
        scrollX: 730,
        scrollY: 300
    });
});
</script>

@if(count($orders) > 0)
    <table id="datatables"  class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>日付</th>
                <th>サイト名</th>
                <!--<th>サイトURL</th>-->
                <!--<th>検索キーワード</th>-->
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
                    <td>{{ $order->check_date }}</td>
                    <td>{{ $order->grc_site_name }}</td>
                    <!--<td>{{ $order->grc_site_url }}</td>-->
                    <!--<td>{{ $order->grc_keyword }}</td>-->
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

@endif