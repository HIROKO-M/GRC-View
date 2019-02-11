<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AllKey;

class PickupkeysController extends Controller
{
    public function index(Request $request)
    {


// キーワードをcheckbox で複数選択する場合に利用。まだ不完全
        $checkedkeys = $request->all();
//        $cnt = count($checkedkeys);
//        for($i = 0 ; $i < count($checkedkeys); $i++){
            $orders = Allkey::orderBy('created_at', 'desc')->whereIn('grc_keyword', $checkedkeys)-> paginate(20);    // gdates からcheck_date順にpickupkeysで洗濯されたデータのみ20個ずつ取り出し
//        }

// キーワード選択で利用
        $date = AllKey::orderBy('created_at', 'desc')->value('check_date');
        $keys = Allkey::where('check_date', '=', $date)-> paginate(20);    // gdates からcheck_date順に20個ずつ取り出し

// キーワード選択後の一覧表示で利用
//        $pickupkeys = request()->pickupkey;
//        $orders = Allkey::orderBy('created_at', 'desc')->where('grc_keyword', $pickupkeys)-> paginate(20);    // gdates からcheck_date順にpickupkeysで洗濯されたデータのみ20個ずつ取り出し


        return view('pickupkeys.index', [
            'orders' => $orders,
            'keys' => $keys,

        ]);
        
    }


}
