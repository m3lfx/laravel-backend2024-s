<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function titleChart() {
        $customer = DB::table('customer')->groupBy('addressline')->orderBy('total')->pluck(DB::raw('count(addressline) as total'),'addressline')->all();
        // dd($customer);
        $labels = (array_keys($customer));
        $data= array_values($customer);
        // dd($customer, $data, $labels);
        return response()->json(array('data' => $data, 'labels' => $labels));
    }
}
