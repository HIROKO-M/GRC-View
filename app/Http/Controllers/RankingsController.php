<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AllKey;

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
        $r_orders = Allkey::orderBy('created_at', 'desc')->whereIn('grc_keyword', $selkeys)-> paginate(20);    // gdates からcheck_date順にpickupkeysで洗濯されたデータのみ20個ずつ取り出し



// キーワード選択で利用
        $date = AllKey::orderBy('created_at', 'desc')->value('check_date');
        $keys = Allkey::where('check_date', '=', $date)-> paginate(20);    // gdates からcheck_date順に20個ずつ取り出し

// キーワード選択後の一覧表示で利用
//        $pickupkeys = request()->pickupkey;
//        $r_orders = Allkey::orderBy('created_at', 'desc')->where('grc_keyword', $pickupkeys)-> paginate(20);    // gdates からcheck_date順にpickupkeysで洗濯されたデータのみ20個ずつ取り出し


        return view('rankings.index', [
            'r_orders' => $r_orders,
            'keys' => $keys,
            'selkeys' => $selkeys,
        ]);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
