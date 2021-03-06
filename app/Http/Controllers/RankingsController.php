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

        $selkey = Gdata::orderBy('created_at', 'desc')->whereIn('grc_keyword', $selkeys)->value('grc_keyword');


// キーワード選択で利用
        $date = Gdata::orderBy('created_at', 'desc')->value('check_date');
        $keys = Gdata::where('check_date', '=', $date)-> paginate(20);    // gdates からcheck_date順に20個ずつ取り出し

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
        
        return view('rankings.index', [
            'r_orders' => $r_orders,
            'keys' => $keys,
            'yranks' => $yranks,
            'granks' => $granks,
            'checkeddays' => $huga,
            'selkey' => $selkey,
        ]);
        
    }



}
