<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function generalSetting()
    {
        return view('pages/admin/setting/generalsettings');

    }

    public function emailSetting()
    {
        return view('pages/admin/setting/emailsettings');

    }
    public function paymentSetting()
    {
        return view('pages/admin/setting/paymentsettings');

    }

    public function currencySetting()
    {
        return view('pages/admin/setting/currencysettings');

    }
    public function groupPermissionSetting()
    {
        return view('pages/admin/setting/grouppermissions');

    }
    public function taxRatesSetting()
    {
        return view('pages/admin/setting/taxrates');

    }
    public function addPermissionSetting()
    {
        return view('pages/admin/permission/createpermission');

    }
    public function editPermissionSetting()
    {
        return view('pages/admin/permission/editpermission');

    }

}