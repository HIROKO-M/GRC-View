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


// キーワードをcheckbox で複数選択する場合に利用。まだ不完全
        $selkeys = $request -> all();

        $selkey = Gdata::orderBy('created_at', 'desc')->whereIn('grc_keyword', $selkeys)->value('grc_keyword');

        error_log(var_dump($date));
        error_log(var_dump($selkey));

// ランキング表示のためのキーワード選択で利用

        $checkeddays = Gdata::orderBy('created_at', 'asc')->whereIn('grc_keyword', $selkeys)->groupBy('check_date')->get();
        $yranks = Gdata::orderBy('created_at', 'desc')->whereIn('grc_keyword', $selkeys)->get();
        // $yranks = Gdata::orderBy('created_at', 'desc')->whereIn('grc_keyword', $selkeys)->get()->map(function ($item, $key) {
        //     return $item->y_rank;
        // })->all();
        
        // error_log(var_dump($yranks->toArray()));

        
        
        // これでとりあえず配列に出来る。（スマートとは言えないが）
        $huga = array();
        foreach($checkeddays as $day) {
            array_push($huga, $day->check_date);
        }
        
        
        $g_array = array();
        $y_array = array();
        foreach($yranks as $yrank) {
            array_push($y_array, $yrank->y_rank);
            array_push($g_array, $yrank->g_rank);
        }
        
        $yranks = array_map(function($value){ return (int)$value; }, $y_array);
        $granks = array_map(function($value){ return (int)$value; }, $g_array);
        
        $yranks_rep = str_replace('0', '100', $yranks);
        $granks_rep = str_replace('0', '100', $granks);
        
//error_log(var_dump($yranks));

        return view('allkeys.index', [
            'orders' => $orders,
            'date' => $date,
            'yranks' => $yranks_rep,
            'granks' => $granks_rep,
            'checkeddays' => $huga,
            'selkey' => $selkey,
        ]);
    }
}
