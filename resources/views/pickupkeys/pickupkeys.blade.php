@if(count($orders) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>チェックした日</th>
                <th>サイト名</th>
                <th>サイトURL</th>
                <th>検索キーワード</th>
                <th>Yahoo順位</th>
                <th>Yahoo変化</th>
                <th>Yahoo件数</th>
                <th>Yahoo URL</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->check_date }}</td>
                    <td>{{ $order->grc_site_name }}</td>
                    <td>{{ $order->grc_site_url }}</td>
                    <td>{{ $order->grc_keyword }}</td>
                    <td>{{ $order->y_rank }}</td>
                    <td>{{ $order->y_change }}</td>
                    <td>{{ $order->y_count }}</td>
                    <td>{{ $order->y_url }}</td>
                </tr>
            @endforeach
                    
            {!! $orders->render() !!}
        </tbody>
    </table>
@endif