<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\WishlistModel;
use App\Models\ProductModel;
use App\Models\CartModel;

class ShareViewMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $wishlists = WishlistModel::getAll();
        $carts = CartModel::getRecord();
        $count_cart = CartModel::countRecord();
        $total = CartModel::total();
        View::composer('*', function ($view) use($wishlists, $carts, $count_cart, $total) {
            $view->with(['all_cart' => $carts, 'all_wishlist' => $wishlists, 'count_cart' => $count_cart, 'total' => $total]);
        });
        return $next($request);
    }
}
