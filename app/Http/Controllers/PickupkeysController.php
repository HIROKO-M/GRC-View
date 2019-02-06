<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AllKey;

//use Request;

class PickupkeysController extends Controller
{
    public function index()
    {
        $pickupkeys = 'オンソコーヒー';
        $orders = Allkey::orderBy('check_date', 'desc')->where('grc_keyword', $pickupkeys)-> paginate(20);    // gdates からcheck_date順に20個ずつ取り出し

        return view('pickupkeys.index', ['orders' => $orders,] );            // gdatas をTopページに表示

    }

/*    public function Index()
    {
        // 検索するテキスト取得
        //$search = Request::get('s');
        $query = Allkey::query();
        // 検索するテキストが入力されている場合のみ
        if(!empty($search)) {
            $query->where('grc_keyword');
        }
        $orders = $query->get();
        return view('grc_keyword.index', ['orders' => $orders,]);
    }
*/

}
