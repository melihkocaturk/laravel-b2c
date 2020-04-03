<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::count() == 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $discount = session()->get('coupon')['discount'] ?? 0;
        $subtotal = Cart::subtotal() - $discount;
        $tax = $subtotal * (config('cart.tax') / 100);
        $total = $subtotal + $tax;

        return view('checkout.index')->with([
            'discount' => $discount,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'address' => 'required|min:10',
            'country' => 'required',
            'state' => 'required',
            'zip' => 'required|digits:5',
            'paymentMethod' => 'required',
        ]);

        Cart::destroy();
        session()->forget('coupon');

        return view('checkout.complete');
    }
}
