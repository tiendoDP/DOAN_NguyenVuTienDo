<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartModel extends Model
{
    use HasFactory;

    protected $table = 'carts'; 

    
    static public function getCartByProductId($id){
        return DB::select('SELECT * FROM carts WHERE product_id = '.$id.' and user_id = '. Auth::user()->id);
    }

    static public function getProductInCart($id, $size, $color) {
        return DB::table('carts')
            ->where('product_id', $id)
            ->where('user_id', Auth::id())
            ->where('size_id', $size)
            ->where('color_id', $color)
            ->get();
    }

    static public function getRecord() {
        if(Auth::check()) {
            return self::select('carts.*', 'products.name as product_name', 'products.image as image',
                         'products.price as price', 'products.discount as discount', 'colors.name as color', 'sizes.name as size')
                       ->join('products', 'carts.product_id', '=', 'products.id')
                       ->join('colors', 'carts.color_id', '=', 'colors.id')
                       ->join('sizes', 'carts.size_id', '=', 'sizes.id')
                       ->where('user_id', '=', Auth::user()->id)
                       ->get();
        }
        return []; 
    }

    static public function getRecordById($id) {
    
        if(Auth::check()) {
            return self::where('user_id', '=', Auth::user()->id)->where('id', $id)->first();
        }
        return [];
    }

    static public function countRecord() {
        if(Auth::check()) {
            $d = self::where('user_id', '=', Auth::user()->id)->count();
            return $d;
        }
        else return 0;
    }

    static public function total() {
        if(Auth::check()) {
            $d = self::where('user_id', '=', Auth::user()->id)->sum('money');
            return $d;
        }
        else return 0;
    }
}
