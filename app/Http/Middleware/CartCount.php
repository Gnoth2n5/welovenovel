<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;


class CartCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            $userId = Auth::user()->id;
            $count_product_of_userId = Cart::where('user_id', $userId)->count();
            view()->share('count_product_of_userId', $count_product_of_userId);
        }
        return $next($request);
    }
}
