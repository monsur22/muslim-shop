<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function printBarcode(){
        return view('pages/admin/product/print_barcode');

    }
}