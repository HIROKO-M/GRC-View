<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gdata;

class AllkeysController extends Controller
{

    public function index()
    {
        $date = Gdata::orderBy('created_at', 'desc')->value('check_date');
        $orders = Gdata::orderBy('created_at', 'desc')->where('check_date', '=', $date)-> paginate(20);    // gdates からcheck_date順に20個ずつ取り出し

        return view('allkeys.index', [
            'orders' => $orders,
            'date' => $date,
        ] );            // gdatas をTopページに表示

    }
    

}
