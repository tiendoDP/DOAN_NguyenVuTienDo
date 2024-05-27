<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders'; 

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone',
        'country',
        'province',
        'street_address',
        'notes',
        'status',
    ];

    public static function allOrder() {
        return self::select('orders.*', 'payments.amount as amount')
        ->join('payments', 'payments.order_id', '=', 'orders.id')
        ->where('orders.user_id', '=', Auth::user()->id)
        ->orderBy('id', 'desc')
        ->get();
    }

    public static function list() {
        return self::select('orders.*', 'payments.amount as amount')
        ->join('payments', 'payments.order_id', '=', 'orders.id')
        ->orderBy('id', 'desc')
        ->get();
    }

    
}
