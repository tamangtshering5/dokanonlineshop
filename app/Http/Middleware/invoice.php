<?php

namespace App\Http\Middleware;
use Gloudemans\Shoppingcart\Facades\Cart;
use Closure;

class invoice
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
        if (count(Cart::content())>0){
            return $next($request);
        }
        else{
            return redirect('/')->with('success','nothing added to cart');
        }

    }
}
