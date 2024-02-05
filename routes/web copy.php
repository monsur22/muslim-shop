<?php

use App\Http\Controllers\admin\ApplicationController;
use App\Http\Controllers\admin\BarcodeController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ExpenseCategoryController;
use App\Http\Controllers\admin\ExpenseController;
use App\Http\Controllers\admin\ImportController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\PurchaseController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\ReturnController;
use App\Http\Controllers\admin\SalesController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\StoreController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\admin\TransferController;
use App\Http\Controllers\admin\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::resource('brands', BrandController::class);
Route::resource('categories', CategoryController::class);
Route::resource('sub-categories', SubCategoryController::class);
Route::resource('products', ProductController::class);
Route::get('product-import',[ ImportController::class,'productImportIndex'])->name('product.import');
Route::get('print-barcode',[ BarcodeController::class,'printBarcode'])->name('print.barcode');
Route::resource('sales', SalesController::class);
Route::resource('purchase', PurchaseController::class);
Route::get('purchase-import',[ ImportController::class,'purchaseImportIndex'])->name('purchase.import');
Route::resource('expense-category', ExpenseCategoryController::class);
Route::resource('expense', ExpenseController::class);
Route::resource('transfer', TransferController::class);
Route::get('transfer-import',[ ImportController::class,'transferImportIndex'])->name('transfer.import');

Route::get('sales-return',[ ReturnController::class,'salesReturnIndex'])->name('salesReturn.index');
Route::get('sales-return-add',[ ReturnController::class,'salesReturnCreate'])->name('salesReturn.create');
Route::get('sales-return-edit/{id}',[ ReturnController::class,'salesReturnEdit'])->name('salesReturn.edit');
Route::get('purchase-return',[ ReturnController::class,'purchaseReturnIndex'])->name('purchaseReturn.index');
Route::get('purchase-return-add',[ ReturnController::class,'purchaseReturnCreate'])->name('purchaseReturn.create');
Route::get('purchase-return-edit/{id}',[ ReturnController::class,'purchaseReturnEdit'])->name('purchaseReturn.edit');

Route::get('purchase-report',[ ReportController::class,'purchaseReport'])->name('purchase.report');
Route::get('inventory-report',[ ReportController::class,'inventoryReport'])->name('inventory.report');
Route::get('sales-report',[ ReportController::class,'salesReport'])->name('sales.report');
Route::get('invoice-report',[ ReportController::class,'invoiceReport'])->name('invoice.report');
Route::get('purchase-order-report',[ ReportController::class,'purchaseOrderReport'])->name('purchase-order.report');
Route::get('supplier-report',[ ReportController::class,'supplierReport'])->name('supplier.report');
Route::get('customer-report',[ ReportController::class,'customerReport'])->name('customer.report');

Route::resource('users', UserController::class);
Route::get('profile', [ UserController::class,'profile'])->name('users.profile');

Route::get('general-setting',[ SettingController::class,'generalSetting'])->name('general.setting');
Route::get('email-setting',[ SettingController::class,'emailSetting'])->name('email.setting');
Route::get('payment-setting',[ SettingController::class,'paymentSetting'])->name('payment.setting');
Route::get('currency-setting',[ SettingController::class,'currencySetting'])->name('currency.setting');
Route::get('group-permission-setting',[ SettingController::class,'groupPermissionSetting'])->name('groupPermission.setting');
Route::get('tax-rates-setting',[ SettingController::class,'taxRatesSetting'])->name('taxRates.setting');
Route::get('add-permission',[ SettingController::class,'addPermissionSetting'])->name('addPermission.setting');
Route::get('edit-permission',[ SettingController::class,'editPermissionSetting'])->name('editPermission.setting');


Route::resource('suppliers', SupplierController::class);
Route::resource('customers', CustomerController::class);
Route::resource('stores', StoreController::class);

Route::get('chat', [ ApplicationController::class,'chat'])->name('chat.application');
Route::get('calender', [ ApplicationController::class,'calender'])->name('calender.application');
Route::get('email', [ ApplicationController::class,'email'])->name('email.application');

Route::resource('notifications', NotificationController::class);
