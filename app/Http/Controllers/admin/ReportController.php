<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function purchaseReport()
    {
        return view('pages/admin/report/purchase_report');
    }

    public function inventoryReport()
    {
        return view('pages/admin/report/inventory_report');
    }

    public function salesReport()
    {
        return view('pages/admin/report/sales_report');
    }

    public function invoiceReport()
    {
        return view('pages/admin/report/invoice_report');
    }

    public function purchaseOrderReport()
    {
        return view('pages/admin/report/purchase_order_report');
    }


    public function supplierReport()
    {
        return view('pages/admin/report/supplier_report');
    }

    public function customerReport()
    {
        return view('pages/admin/report/customer_report');
    }

    // public function expenseReport()
    // {
    //     return view('pages/admin/report/expense_report');
    // }
}
