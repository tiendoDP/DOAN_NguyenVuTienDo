<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;

class HomeController extends Controller
{
    public function index() {
        $data['header_title'] = 'Trang chủ';
        $data['all_product'] = ProductModel::getRecord();
        $data['new_product'] = ProductModel::newProducts();
        $data['men_record'] = ProductModel::getProductBySex(0);
        $data['women_record'] = ProductModel::getProductBySex(1);
        return view('client/home', $data);
    }
}
