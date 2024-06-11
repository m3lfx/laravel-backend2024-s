<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Stock;
use App\Models\Customer;
use Storage;
use Carbon\Carbon;
use App\Models\Order;
use DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::withWhereHas('stock')->get();
        // $items = Item::orderBy('item_id', 'DESC')->get();
        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->description = $request->description;
        $item->sell_price = $request->sell_price;
        $item->cost_price = $request->cost_price;
        $files = $request->file('uploads');
        $item->img_path = 'storage/images/' . $files->getClientOriginalName();
        $item->save();

        Storage::put('public/images/' . $files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "item created successfully.", "item" => $item, "status" => 200]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::where('item_id', $id)->first();
        return response()->json($item);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::find($id);
        // dd($request->all(), $id);
        $item->description = $request->description;
        $item->sell_price = $request->sell_price;
        $item->cost_price = $request->cost_price;
        // $item->image_path = 'default.jpg';
        $files = $request->file('uploads');
        $item->img_path = 'storage/images/' . $files->getClientOriginalName();
        $item->save();

        Storage::put('public/images/' . $files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "item updated successfully.", "item" => $item, "status" => 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        if (Item::find($id)) {
            Item::destroy($id);
            $data = array('success' => 'deleted', 'code' => 200);
            return response()->json($data);
        }
        $data = array('error' => 'item not deleted', 'code' => 400);
        return response()->json($data);
    }

    public function postCheckout(Request $request){
    //    dd($request->getContent());
        $items = json_decode($request->getContent(), true);
        // dd($items);
        try {
            
            DB::beginTransaction();
            // dd(Auth::id());
            // $customer =  Customer::where('user_id', Auth::id())->first();
            // $customer =  Customer::where('user_id', 1)->first();
            $order = new Order();
            // $order->customer_id = $customer->customer_id;
            // $order->date_placed = now();
            $customer = Customer::find(3);
            $order->date_placed = Carbon::now();
            $order->date_shipped = Carbon::now();
            $order->shipping = 10.00;
            $order->status = 'Processing';
            // $order->save();
            // $order->customer()->;
            $customer->orders()->save($order);
            // dd($customer->orders());
            foreach ($items as $item) {
                // $id = $item['item_id'];
                $order
                    ->items()
                    ->attach($order->orderinfo_id, [
                        'quantity' => $item['quantity'],
                        'item_id' => $item['item_id'],
                    ]);
               
                $stock = Stock::find($item['item_id']);
                $stock->quantity = $stock->quantity - $item['quantity'];
                $stock->save();
            }
            // dd($order);
        }
        catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return response()->json([
                'status' => 'Order failed',
                'code' => 409,
                'error' => $e->getMessage(),
            ]);
            // return redirect()->route('shoppingCart')->with('error', $e->getMessage());
       }
        DB::commit();
        // OrderCreated::dispatch($order, $customer, Auth::user()->email);
        return response()->json([
            'status' => 'Order Success',
            'code' => 200,
            'orderId' => $order->orderinfo_id,
        ]);
    }
}
