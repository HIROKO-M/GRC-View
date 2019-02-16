<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gdata;

class AllkeysController extends Controller
{

    public function index(Request $request)
    {


//最新データの一覧表
        $date = Gdata::orderBy('created_at', 'desc')->value('check_date');
        $orders = Gdata::orderBy('created_at', 'desc')->where('check_date', '=', $date)->get();    // gdates からcheck_date順に取り出し


// キーワードを選択する場合に利用。まだ不完全
        $selkeys = $request -> all();
        $selkey = Gdata::orderBy('created_at', 'desc')->whereIn('grc_keyword', $selkeys)->value('grc_keyword');

//        error_log(var_dump($date));
//        error_log(var_dump($selkey));
//        error_log(var_dump($selkeys));

 
        // ランキング表示のためのキーワード選択で利用

        //$checkeddays = Gdata::orderBy('created_at', 'asc')->whereIn('grc_keyword', $selkeys)->groupBy('check_date')->get();
        $ranks = Gdata::orderBy('created_at', 'asc')->whereIn('grc_keyword', $selkeys)->get();
        // $ranks = Gdata::orderBy('created_at', 'desc')->whereIn('grc_keyword', $selkeys)->get()->map(function ($item, $key) {
        //     return $item->y_rank;
        // })->all();
        
        // error_log(var_dump($ranks->toArray()));

        
        
        // これでとりあえず配列に出来る。（スマートとは言えないが）
        // $huga = array();
        // foreach($ranks as $day) {
        //    array_push($huga, $day->check_date);
        // }
        
        
        $huga = array();
        $g_array = array();
        $y_array = array();
        foreach($ranks as $rank) {
            array_push($huga, $rank->check_date);
            array_push($y_array, $rank->y_rank);
            array_push($g_array, $rank->g_rank);
        }
        
        $rankday = array();
        $rankday = array_unique($huga);             // check_date の重複を削除
        
        $ranks = array_map(function($value){ return (int)$value; }, $y_array);  //int型に型変更
        $granks = array_map(function($value){ return (int)$value; }, $g_array); //int型に型変更
        
        $ranks_rep = str_replace('0', '100', $ranks);       // Chart表示のため、「0」→「100」へ置き換え
        $granks_rep = str_replace('0', '100', $granks);     // Chart表示のため、「0」→「100」へ置き換え

        // error_log(var_dump($y_array));        
        // error_log(var_dump($ranks));
        // error_log(var_dump($huga));
        // error_log(var_dump($rankday));

        return view('allkeys.index', [
            'orders' => $orders,
            'date' => $date,
            'yranks_rep' => $ranks_rep,
            'granks_rep' => $granks_rep,
            'checkeddays' => $rankday,
            'selkey' => $selkey,
        ]);
        

    }
}
