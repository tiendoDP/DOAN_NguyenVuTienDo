<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use Stripe\Product;

class SearchController extends Controller
{
    public function index(Request $request) {
        $data['keyword'] = $request->search;
        session()->put('keyword', $request->search);
        $data['header_title'] = 'Trang chủ';
        $data['all_cate'] = CategoryModel::getRecord();
        return view('client/components/list-products', $data);
    }

}
