<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::all();
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

    public function displayOrders(){
        return DB::table('orders')->where('order_status', '=', "ready")->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::findOrFail($request->cart_id);
        $orders = Order::create(["cart_id" => $request->cart_id, "order_status" => null]);
        
        return "Commande validée";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order = Order::findOrFail($order->id);
        return $order->get('order_status');
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
    public function update(Request $request, Order $order)
    {
        $order = Order::findOrFail($order->id);
        if($request->order_status=="accept"){
            $order->update(["order_status" => "accept"]);
            
            return "Commande acceptée";
        }
        if($request->order_status=="refuse"){
            $order->update(["order_status" => "refuse"]);
            
            return "Commande refusée";
        }
        if($request->order_status=="ready"){
            $order->update(["order_status" => "ready"]);
            
            return "Commande prête";
        }
    }

    public function updateShipper(Request $request, Order $order)
    {
        $order = Order::findOrFail($order->id);
        if($request->order_status=="accept"){
            $order->update(["order_status" => "accept"]);
            
            return "Commande acceptée par le livreur";
        }
        if($request->order_status=="refuse"){
            $order->update(["order_status" => "refuse"]);
            
            return "Commande refusée par le livreur";
        }
        if($request->order_status=="shipped"){
            $order->update(["order_status" => "shipped"]);
            
            return "Commande livrée";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order = Order::findOrFail($order->id);
        $order->delete();
        
        return "Commande supprimée";
    }
}
