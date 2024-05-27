<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        $data['header_title'] = 'My Order';
        $data['allOrder'] = Order::allOrder();
        return View('client/components/order', $data);
    }

    public function orderDetail($id) {
        $data['header_title'] = 'My Order';
        $data['details'] = OrderDetail::getRecord($id);
        return View('client/components/orderDetail', $data);
    }
}
