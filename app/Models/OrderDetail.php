<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Comment;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details'; 

    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'price',
    ];

    public static function getRecord($id) {
        $details =  self::select('orders.*', 
        'products.image as image', 'products.name as product_name',
        'order_details.quantity as quantity', 'order_details.price as price', 'order_details.product_id as product_id',
        'payments.payment_method as payment_method', 'payments.amount as amount', 'payments.status as payment_status') 
        ->join('orders', 'orders.id', '=', 'order_details.order_id')
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->join('payments', 'payments.order_id', '=', 'orders.id')
        ->where('order_details.order_id', '=', $id)
        ->get();
        return $details;
    }

    public static function getTotalIncomeLast6Months()
    {
        // Mảng chứa tổng thu nhập của 6 tháng gần nhất
        $totalIncomes = [];

        // Lặp qua 12 tháng gần nhất
        for ($i = 11; $i >= 0; $i--) {
            // Tính thời gian đầu tiên của tháng
            $startOfMonth = Carbon::now()->subMonths($i)->startOfMonth();

            // Tính thời gian cuối của tháng
            $endOfMonth = Carbon::now()->subMonths($i)->endOfMonth();

            // Lấy tổng thu nhập của tháng hiện tại
            $totalIncome = self::selectRaw('IFNULL(SUM(price), 0) AS total_amount')
                ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->first();

            // Thêm tổng thu nhập vào mảng
            $totalIncomes[] = $totalIncome->total_amount;
        }

        return $totalIncomes;
    }

    public static function getProductTopSelling($monthAgo) {
        $search = Carbon::now()->subMonths($monthAgo);
        $listProducts = OrderDetail::selectRaw('products.*, SUM(order_details.quantity) AS total_quantity')
                        ->join('products', 'products.id', '=', 'order_details.product_id')
                        ->where('order_details.created_at', '>=', $search)
                        ->orderByDesc('total_quantity')
                        ->groupBy('order_details.product_id')
                        ->limit(5)
                        ->get();
                        
        return $listProducts;
    }
}
