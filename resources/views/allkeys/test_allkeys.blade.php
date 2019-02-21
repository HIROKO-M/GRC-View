
<script type="text/javascript">
$(function () {
    $('#datatables').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Japanese.json"
        },
        paging: false,
        lengthChange: false,
        searching: true,
        ordering: true,
  
//        type: 'currency', 
        
        columnDefs : [
            { 'title':'ランク', 'data':'rank', 'targets':3,
                ordable: true,              // --> カラムのソート可
                orderDataType: 'test_data', // --> ソート名称
                type: 'num-html',
            },
        ],
        
        order: [],

        stateSave: true,
        scrollX: true,
        scrollY: 300,

    });
});


$.fn.dataTable.ext.order['dom-date'] = function (data){
  return this.api().column("3", {order:'index'}).nodes().map(function (td, i) {
    if ($(td).html() == null) return 200;
    
  });
}

</script>
            
<?php
 $orders = array();
 $orders = array(   
1=>array("saite_name"=>'+',"keyword"=>null,"chenge"=>1,"rank"=>null), 
2=>array("saite_name"=>'-',"keyword"=>'↑1',"chenge"=>'↓11',"rank"=>100), 
3=>array("saite_name"=>+1,"keyword"=>'↓',"chenge"=>2,"rank"=>3), 
4=>array("saite_name"=>null,"keyword"=>'↑2',"chenge"=>20,"rank"=>2), 
5=>array("saite_name"=>-1,"keyword"=>'↓1',"chenge"=>3,"rank"=>10), 
6=>array("saite_name"=>+10,"keyword"=>'↑11',"chenge"=>100,"rank"=>20), 
7=>array("saite_name"=>+2,"keyword"=>'↑',"chenge"=>100,"rank"=>1), 

);
error_log(var_dump($orders));
?>

<table id="datatables" class="table table-striped" width="100%">
    <thead>
                    <tr>
                        <th>サイト名</th>
                        <th>キーワード</th>
                        <th>変化</th>
                        <th>ランク</th>
                    </tr>
                </thead>
    <tbody>
<?php
foreach($orders as $order_arr){
    
        echo  "<tr>\n";
        echo  "<td>".$order_arr['saite_name']."</td>\n";
        echo  "<td>".$order_arr['keyword']."</td>\n";
        echo  "<td>".$order_arr['chenge']."</td>\n";
        echo  "<td>".$order_arr['rank']."</td>\n";
        echo  "</tr>\n";
}
?>
</tbody>


</table>