<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function salesReturnIndex(){
        return view('pages/admin/sales/return_list');
    }

    public function salesReturnCreate(){
        return view('pages/admin/sales/return_add');
    }

    public function salesReturnEdit($id){
        return view('pages/admin/sales/return_edit');
    }

    //purchase return

    public function purchaseReturnIndex(){
        return view('pages/admin/purchase/return_list');
    }

    public function purchaseReturnCreate(){
        return view('pages/admin/purchase/add_purchase_return');
    }

    public function purchaseReturnEdit($id){
        return view('pages/admin/purchase/edit_purchase_return');
    }
}
