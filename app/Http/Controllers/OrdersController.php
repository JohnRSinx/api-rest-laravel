<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    public function index()
    {
        return Orders::all();
    }

    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $order = Orders::create([
            "name" => $req->name,
            "price" => $req->price,
            "status" => $req->status,
        ]);

        return response()->json($order, 201);
    }

    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $order = Orders::findOrFail($req->id);
        $order->name = $req->name;
        $order->price = $req->price;
        $order->status = $req->status;

        $order->save();

        return response()->json($order, 200);
    }

    public function delete(Request $req)
    {
        $order = Orders::findOrFail($req->id);
        $order->delete();

        return response()->json("Order deleted", 200);
    }
}
