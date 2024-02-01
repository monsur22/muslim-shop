@extends('layouts.admin_layout')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Product Sub Category list</h4>
            <h6>View/Search product Category</h6>
        </div>
        <div class="page-btn">
            <a href="subaddcategory.html" class="btn btn-added"><img src="{{asset('admin/assets/img/icons/plus.svg')}}" class="me-2" alt="img"> Add Sub Category</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-path">
                        <a class="btn btn-filter" id="filter_search">
                            <img src="{{asset('admin/assets/img/icons/filter.svg')}}" alt="img">
                            <span><img src="{{asset('admin/assets/img/icons/closes.svg')}}" alt="img"></span>
                        </a>
                    </div>
                    <div class="search-input">
                        <a class="btn btn-searchset"><img src="{{asset('admin/assets/img/icons/search-white.svg')}}" alt="img"></a>
                    </div>
                </div>
                <div class="wordset">
                    <ul>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{asset('admin/assets/img/icons/pdf.svg')}}" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{asset('admin/assets/img/icons/excel.svg')}}" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{asset('admin/assets/img/icons/printer.svg')}}" alt="img"></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card" id="filter_inputs">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="select">
                                    <option>Choose Category</option>
                                    <option>Computers</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Sub Category</label>
                                <select class="select">
                                    <option>Choose Sub Category</option>
                                    <option>Fruits</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Code</label>
                                <select class="select">
                                    <option>CT001</option>
                                    <option>CT002</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <a class="btn btn-filters ms-auto"><img src="{{asset('admin/assets/img/icons/search-whites.svg')}}" alt="img"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table  datanew">
                    <thead>
                    <tr>
                        <th>
                            <label class="checkboxs">
                                <input type="checkbox" id="select-all">
                                <span class="checkmarks"></span>
                            </label>
                        </th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Parent category</th>
                        <th>Category Code</th>
                        <th>Description</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>
                            <a class="product-img">
                                <img src="{{asset('admin/assets/img/product/product1.jpg')}}" alt="product">
                            </a>
                        </td>
                        <td>Computers</td>
                        <td>Computers</td>
                        <td>CT001</td>
                        <td>Computers Description</td>
                        <td>Admin</td>
                        <td>
                            <a class="me-3" href="editsubcategory.html">
                                <img src="{{asset('admin/assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection