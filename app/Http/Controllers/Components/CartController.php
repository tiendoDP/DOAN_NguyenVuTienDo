<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\Color;
use App\Models\Size;
use App\Models\WishlistModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request) {
        //dd($request->all());
        $id = $request->id;
        if($id != null) {
            $cart = CartModel::getProductInCart($id, $request->size, $request->color);
            $product = ProductModel::find($id);
            if($request->quantity > $product->quantity) {
                return redirect()->back()->with('error', 'Rất tiếc, trong kho không đủ hàng.');
            }
            if ($cart->isEmpty()) {      
                $cartNew = new CartModel;
                $cartNew->product_id = $product->id;                  
                $cartNew->quantity = $request->quantity ? $request->quantity : 1;
                $cartNew->money = $product->discount == null ? (int) $cartNew->quantity * (int) $product->price : (int) $product->price - ((int) $cartNew->quantity * (int) $product->price * (int) $product->discount / 100);
                $cartNew->user_id = Auth::user()->id;
                $cartNew->size_id = $request->size ?  $request->size : Size::first()->id;
                $cartNew->color_id = $request->color ? $request->color : Color::first()->id;
                $cartNew->save();
            } else {       
                $cartFirst = $cart->first();
                $data['quantity'] = $request->quantity ? $cartFirst->quantity + $request->quantity : $cart->quantity + 1;
                $data['money'] = (int) $product->price * (int) $data['quantity'] - (int) $data['quantity'] * (int) $product->price * (int) $product->discount / 100;
                $data['size_id'] = $request->size ?  $request->size : Size::first()->id;
                $data['color_id'] = $request->color ? $request->color : Color::first()->id;
                DB::table('carts')->where('id', $cartFirst->id)->update($data);
            }
            return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ thành công!');
        }
    }
    

    public function view_cart() {
        $data['header_title'] = 'View Cart';
        $data['total'] = CartModel::total();
        session()->put('fntotal', $data['total']);
        session()->put('type_shipping', 'Miễn phí giao hàng');      
        return view('client/components/cart', $data);
    }

    public function delete($id) {
        $cart = CartModel::find($id);
        $cart->delete();
        return redirect()->back()->with('success', "Xóa sản phẩm thành công!");
    }

}
