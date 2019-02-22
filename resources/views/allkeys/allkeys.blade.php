
<script>
$(function () {
    $('#datatables').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Japanese.json"
        },
        paging: false,
        lengthChange: false,
        searching: true,
        ordering: true,
        
        stateSave: true,
        stateDuration: -1,
        
        order: [],

        scrollX: true,
        scrollY: 300,

    });
});


</script>

        @if(count($orders) > 0)

            <table id="datatables" class="table table-striped" width="100%">

                <thead>
                    <tr>
                        <th>サイト名</th>
                        <!-- <th>サイトURL</th> -->
                        <th>検索キーワード</th>
                        <th></th>
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
                            </td>
                            <td>    
                                {!! Form::submit('Check!') !!}
                                {!! Form::close() !!}
                            </td>
                            
                            <!--<td>
                                <a href="" onclick="document.formA.submit">{{$order->grc_keyword}}</a>
                                <form style="display:none;" name="formA" method="get">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="checkkey" value="{{$order->grc_keyword}}">
                                </form>
                            </td>>-->
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
            
           
        @else
        <p>本日分のCSVファイルデータがありません。</p>
        <p>CSVファイルをインポートしてください。</p>
        
        @endif