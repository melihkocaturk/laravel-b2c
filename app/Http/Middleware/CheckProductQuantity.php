<?php

namespace App\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckProductQuantity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $adjust = false;

        foreach (Cart::content() as $item) {
            if ($item->model->quantity == 0) {
                Cart::remove($item->rowId);
                $adjust = true;
            } elseif ($item->qty > $item->model->quantity) {
                Cart::update($item->rowId, $item->model->quantity);
                $adjust = true;
            }
        }

        if ($adjust) {
            return redirect()->route('cart.index')->with('warning', 'Your cart has been adjusted to the current stock status');
        }

        return $next($request);
    }
}
