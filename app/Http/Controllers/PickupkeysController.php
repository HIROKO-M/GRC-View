<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AllKey;

class PickupkeysController extends Controller
{
    public function index()
    {


// キーワードをcheckbox で複数選択する場合に利用。まだ不完全
//        $pickupkeys = [];
//        $pickupkeys[] = request()->pickupkey;


// キーワード選択一覧で利用
        $pickupkeys = request()->pickupkey;

        $date = date('Y-m-d');
        $orders = Allkey::orderBy('id', 'desc')->where('grc_keyword', $pickupkeys)-> paginate(20);    // gdates からcheck_date順にpickupkeysで洗濯されたデータのみ20個ずつ取り出し


// 全てのデータ一覧で利用
        //$key = Allkey::all()
        
        
        $date = date('Y-m-d');
        $keys = Allkey::where('check_date', '=', $date)-> paginate(20);    // gdates からcheck_date順に20個ずつ取り出し


        return view('pickupkeys.index', [
            'orders' => $orders,
            'keys' => $keys,
        ] );
        
    }


}
