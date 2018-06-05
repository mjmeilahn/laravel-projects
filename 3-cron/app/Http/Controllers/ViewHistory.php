<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ViewHistory extends Controller
{
    function index()
    {
        $dateTime = date("r");
        $entries = DB::table('dateTime')->pluck('dateTimeVal');
        //dd($entries);

        return view('welcome')->with('entries', $entries);
    }
}
