<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cart::all();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Client::findOrFail($request->client_id);
        $product = Product::findOrFail($request->product_id);
        $cart = Cart::where('client_id', '=', $client->id);
        if ($cart->exists()) {
            DB::table('cart_product')->insert(['cart_id' => $client->id, 'product_id' => $product->id,]);
            
            return "Produit ajouté au panier existant.";
        }
        else{
            Cart::create(["client_id" => $client->id]);
            DB::table('cart_product')->insert(['cart_id' => $client->id, 'product_id' => $product->id,]);
            
            return "Panier créé et produit ajouté";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        foreach ($cart->products as $product) {
            echo $product;
        }
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
