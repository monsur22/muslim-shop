<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    //
    public function chat(){
        return view('pages/admin/application/chat');

    }
    public function calender(){
        return view('pages/admin/application/calender');

    }
    public function email(){
        return view('pages/admin/application/email');

    }
}
