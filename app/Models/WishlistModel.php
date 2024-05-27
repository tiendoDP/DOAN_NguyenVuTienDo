<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class WishlistModel extends Model
{
    use HasFactory;

    protected $table = 'wishlists'; 

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    static public function getAll() {
        if(Auth::check()) {
            return self::select('wishlists.product_id as product_id','products.quantity as quantity', 'products.name as product_name', 'products.image as image','products.price as price')->join('products', 'wishlists.product_id', '=', 'products.id')->where('user_id', '=', Auth::user()->id)->get();
        }
        return []; 
    }
}
