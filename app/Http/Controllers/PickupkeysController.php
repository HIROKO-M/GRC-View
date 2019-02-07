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
        $pickupkeys = request()->pickupkeys;

        $orders = Allkey::orderBy('check_date', 'desc')->where('grc_keyword', $pickupkeys)-> paginate(20);    // gdates からcheck_date順に20個ずつ取り出し

        $date = date('Y-m-d');
        $keys = Allkey::whereDate('check_date', '=', $date)-> paginate(20);    // gdates からcheck_date順に20個ずつ取り出し

        return view('pickupkeys.index', [
            'orders' => $orders,
            'keys' => $keys,
        ] );
        
    }


}
