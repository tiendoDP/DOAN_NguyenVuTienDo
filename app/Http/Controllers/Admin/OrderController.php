<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list() {
        $data['header_title'] = 'Order';
        $data['getRecord'] = Order::list();
        return view('admin.order.list', $data);
    }

    public function showDetail(Request $request) {
        $id = $request->id;
        $data['header_title'] = 'Order detail';
        $data['details'] = OrderDetail::getRecord($id);
        return View('admin.order.detail', $data);
    }

    public function confirmOrder(Request $request) {
        $id = $request->id;
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return redirect()->back()->with('success', 'Xác nhận đơn hàng thành công');
    }

    public function deleteOrder(Request $request) {
        $id = $request->id;
        $order = Order::find($id);
        if($order->status == 2) {
            return redirect()->back()->with('error', 'Bạn không thể hủy đơn hàng đang được giao');
        }
        $order->status = 5;
        $order->save();
        return redirect()->route('order')->with('success', 'Hủy đơn hàng thành công');
    }

    public function successOrder(Request $request) {
        $id = $request->id;
        $order = Order::find($id);
        $order->status = 4;
        $order->save();
        return redirect()->back()->with('success', 'Cảm ơn quý khách.');
    }
}
