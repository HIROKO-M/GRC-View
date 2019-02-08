<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AllKey;

class AllkeysController extends Controller
{

    public function index()
    {
        
        $date = AllKey::orderBy('check_date', 'dec')->value('check_date');
        
//        $date = date('Y-m-d');
        $orders = Allkey::where('check_date', '=', $date)-> paginate(20);    // gdates からcheck_date順に20個ずつ取り出し

        return view('allkeys.index', ['orders' => $orders,] );            // gdatas をTopページに表示

    }


    public function show($id)
    {
  //      $site = Allkey::first();
  //    return view('allkeys.show', ['site' => $site, ]);
    }


}
