<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class ProfileController extends Controller
{
    public function index() {
        $data['header_title'] = 'Profile';
        $data['allOrder'] = Order::allOrder();
        return View("client.components.profile", $data);
    }
}
