<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        return Orders::all();
    }
    public function store(Request $req){
        $order = Orders::create([
            "name"=> $req->name,
            "price"=> $req->price,
            "status"=> $req->status
        ]);
        return response()->json($order, 201); 
    }
    public function update(Request $req){ 
        $order = Orders::find($req->id);
        $order->name = $req->name;
        $order->price = $req->price;
        $order->status = $req->status;

        $order-> save();
        return response()->json($order, 200); 
    }

    public function delete(Request $req){
        $order = Orders::find($req->id);
        $order -> delete();

        return response("Order deleted",200);
    }


}
