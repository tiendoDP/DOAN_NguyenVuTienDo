<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\WishlistModel;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index() {
        $data['header_title'] = 'Wishlist';
        return view('client/components/wishlist', $data);
    }

    public function add($id = null) {
        if($id != null) {
            $productInWishlist = WishlistModel::where('product_id', $id)->where('user_id', Auth::user()->id)->first();

            if(empty($productInWishlist)) {
                $product = ProductModel::find($id);
                $productInWishlist = new WishlistModel();
                $productInWishlist->user_id = Auth::user()->id;
                $productInWishlist->product_id = $product->id;
                $productInWishlist->save();
            }
            return redirect()->back()->with('success', 'Yêu thích sản phẩm thành công!');
        }
    }

    public function delete($id) {
        $product = WishlistModel::where('product_id', $id)->first();
        $product->delete();
        return redirect()->back()->with('success', "Bỏ thích sản phẩm thành công");
    }
}
