<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cart::all(); //harusnya cek id user dulu nanti
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
        $input = $request->all();
        // $input['user_id'] = Auth::user()->id;
        // nanti cek apakah cart yang dengan user id tertentu udah ada. kalo udah ada, 
        // maka update, jika belum ada, maka insert
        // if (Cart::where('user_id', Auth::user()->id)->first())
        $addedCart = Cart::where('product_id', $input['product_id'])->first();
        if ($addedCart) {
            $addedCart->quantity += $input['quantity'];
            $addedCart->save();
            return $addedCart;
        }
        $cart = Cart::create($input);
        return $cart;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $cart->update($request->quantity);
        return $cart;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return $cart;
    }

    public function checkout(Request $request)
    {
        $input = $request->all();
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cart->update($input);
        return $cart;
    }

    // public function addQuantity(Request $request, $id)
    // {
    //     // $cart = Cart::where('product_id', $request->product_id)->first();
    //     $cart = Cart::find($id)->first();
    //     $cart->quantity += 1;
    //     $cart->save();
    //     return $cart;
    // }
}
