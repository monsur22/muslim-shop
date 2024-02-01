@extends('layouts.admin_layout')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Edit Purchase Return</h4>
            <h6>Add/Update Purchase Return</h6>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Supplier</label>
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-10">
                                <select class="select ">
                                    <option>Apex Computers</option>
                                    <option>Supplier</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                <div class="add-icon">
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('admin/assets/img/icons/plus1.svg')}}" alt="img">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Quotation Date</label>
                        <div class="input-groupicon">
                            <input type="text" value="2/27/2022" class="datetimepicker">
                            <div class="addonset">
                                <img src="{{asset('admin/assets/img/icons/calendars.svg')}}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Reference No.</label>
                        <input type="text" value="555444">
                    </div>
                </div>
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Product</label>
                        <div class="input-groupicon">
                            <input type="text" placeholder="Scan/Search Product by code and select...">
                            <div class="addonset">
                                <img src="{{asset('admin/assets/img/icons/scanners.svg')}}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product </th>
                            <th>Net Unit Price($)	</th>
                            <th>Stock</th>
                            <th>QTY	</th>
                            <th>Discount($)	</th>
                            <th>Tax % </th>
                            <th>Subtotal ($)	</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="productimgname">
                                <a class="product-img">
                                    <img src="{{asset('admin/assets/img/product/product7.jpg')}}" alt="product">
                                </a>
                                <a href="javascript:void(0);">Apple Earpods</a>
                            </td>
                            <td>10.00</td>
                            <td>2000.00</td>
                            <td>500.00</td>
                            <td>0.00</td>
                            <td>50</td>
                            <td>20000.00</td>
                            <td>
                                <a href="javascript:void(0);" class="delete-set"><img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="svg"></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="productimgname">
                                <a class="product-img">
                                    <img src="{{asset('admin/assets/img/product/product6.jpg')}}" alt="product">
                                </a>
                                <a href="javascript:void(0);">Macbook Pro</a>
                            </td>
                            <td>10.00</td>
                            <td>2000.00</td>
                            <td>1500.00</td>
                            <td>0.00</td>
                            <td>150</td>
                            <td>20000.00</td>
                            <td>
                                <a href="javascript:void(0);" class="delete-set"><img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="svg"></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 float-md-right">
                    <div class="total-order">
                        <ul>
                            <li>
                                <h4>Order Tax</h4>
                                <h5>$10.00 (10.00 %)</h5>
                            </li>
                            <li>
                                <h4>Discount	</h4>
                                <h5>$100.00</h5>
                            </li>
                            <li>
                                <h4>Shipping</h4>
                                <h5>$10.00</h5>
                            </li>
                            <li class="total">
                                <h4>Grand Total</h4>
                                <h5>$250.00</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Order Tax</label>
                        <input type="text" value="10">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Discount</label>
                        <input type="text" value="20">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Shipping</label>
                        <input type="text" value="10">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="select">
                            <option>Sent</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <a class="btn btn-submit me-2">Update</a>
                    <a href="purchasereturnlist.html" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endsection