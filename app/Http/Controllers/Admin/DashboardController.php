<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TopSellingExport;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class DashboardController extends Controller
{
    public function dashboard(Request $request) {
        $topSellingIn = 1;
        if(isset($request->topSellingIn)) $topSellingIn = $request->topSellingIn;
        $data['header_title'] = 'Dashboard';
        $data['totalIncomeData'] = OrderDetail::getTotalIncomeLast6Months();
        $data['topSelling'] = OrderDetail::getProductTopSelling($topSellingIn);

        return view('admin.dashboard', $data);
    }

    public function exportTopSelling(Request $request) {
        $topSellingIn = 1;
        if(isset($request->topSellingIn)) $topSellingIn = $request->topSellingIn;
        return Excel::download(new TopSellingExport($topSellingIn), 'top-Selling-In-'. $topSellingIn . '.xlsx');
    }
}
