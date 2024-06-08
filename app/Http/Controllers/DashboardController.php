<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function titleChart()
    {
        $customer = DB::table('customer')->groupBy('addressline')->orderBy('total')->pluck(DB::raw('count(addressline) as total'), 'addressline')->all();
        // dd($customer);
        $labels = (array_keys($customer));
        $data = array_values($customer);
        // dd($customer, $data, $labels);
        return response()->json(array('data' => $data, 'labels' => $labels));
    }

    public function salesChart()
    {

        $sales = DB::table('item as i')
            ->join('orderline as ol', 'i.item_id', '=', 'ol.item_id')
            ->join('orderinfo as oi', 'ol.orderinfo_id', '=', 'oi.orderinfo_id')
            ->select(DB::raw('monthname(oi.date_placed) as month, sum(ol.quantity * i.sell_price) as total'))
            ->groupBy('oi.date_placed')
            ->pluck('total', 'month')
            ->all();

        // dd($sales);
        $labels = (array_keys($sales));

        $data = array_values($sales);
        // dd($sales, $data, $labels);
        return response()->json(array('data' => $data, 'labels' => $labels));
    }

    public function itemsChart() {
        
        $items = DB::table('item as i')
                    ->join('orderline as ol', 'i.item_id', '=', 'ol.item_id')
                    ->select(DB::raw('i.description as items, sum(ol.quantity) as total'))
                    ->groupBy('i.description')
                    ->pluck('total','items')
                    ->all();
                    
        // dd($items);
        $labels = (array_keys($items));
        
        $data= array_values($items);
        // dd($items, $data, $labels);
        return response()->json(array('data' => $data, 'labels' => $labels));
    }
}
