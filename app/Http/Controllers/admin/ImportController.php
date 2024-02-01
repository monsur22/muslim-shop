<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function productImportIndex()
    {
        return view('pages/admin/product/import_product');
    }

    public function purchaseImportIndex()
    {
        return view('pages/admin/purchase/import');
    }

    public function transferImportIndex()
    {
        return view('pages/admin/purchase/import');
    }

}
