<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gdata;

class RankingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
    {


// キーワードをcheckbox で複数選択する場合に利用。まだ不完全
        $selkeys = $request->all();
        $r_orders = Gdata::orderBy('created_at', 'desc')->whereIn('grc_keyword', $selkeys)-> paginate(20);    // gdates からcheck_date順にpickupkeysで洗濯されたデータのみ20個ずつ取り出し



// キーワード選択で利用
        $date = Gdata::orderBy('created_at', 'desc')->value('check_date');
        $keys = Gdata::where('check_date', '=', $date)-> paginate(20);    // gdates からcheck_date順に20個ずつ取り出し

        $checkeddays = Gdata::orderBy('created_at', 'desc')->groupBy('check_date')->select('check_date');
        $yranks = Gdata::orderBy('created_at', 'desc')->whereIn('grc_keyword', $selkeys)->get(['y_rank']);


        return view('rankings.index', [
            'r_orders' => $r_orders,
            'keys' => $keys,
            'selkeys' => $selkeys,
            'checkeddays' => $checkeddays,
            'yranks' => $yranks,
        ]);
        
    }



}
