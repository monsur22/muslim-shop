@extends('layouts.admin_layout')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Store List</h4>
            <h6>Manage your Store</h6>
        </div>
        <div class="page-btn">
            <a href="addstore.html" class="btn btn-added"><img src="{{asset('admin/assets/img/icons/plus.svg')}}" alt="img" class="me-2">Add Store</a>
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
                                <input type="text" placeholder="Store Name">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <input type="text" placeholder="Enter Phone">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <input type="text" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <select class="select">
                                    <option>Disable</option>
                                    <option>Enable</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                            <div class="form-group">
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
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </th>
                        <th>Store name </th>
                        <th>User name </th>
                        <th>Phone</th>
                        <th>email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox" id="select-all">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Thomas</td>
                        <td>Thomas21 </td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b3c7dbdcded2c0f3d6cbd2dec3dfd69dd0dcde">[email&#160;protected]</a></td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user1" class="check">
                                <label for="user1" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="{{asset('admin/assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Benjamin</td>
                        <td>504Benjamin </td>
                        <td>123-456-888</td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0c6f797f786361697e4c69746d617c6069226f6361">[email&#160;protected]</a></td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user2" class="check" checked="">
                                <label for="user2" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="{{asset('admin/assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>James</td>
                        <td>James 524 </td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4329222e263003263b222e332f266d202c2e">[email&#160;protected]</a></td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user3" class="check" checked="">
                                <label for="user3" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="{{asset('admin/assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Bruklin</td>
                        <td>Bruklin2022</td>
                        <td>123-456-888</td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="701202051b1c191e301508111d001c155e131f1d">[email&#160;protected]</a></td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user4" class="check" checked="">
                                <label for="user4" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="{{asset('admin/assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Franklin</td>
                        <td>BeverlyWIN25</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ca88afbcafb8a6b38aafb2aba7baa6afe4a9a5a7">[email&#160;protected]</a></td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user5" class="check">
                                <label for="user5" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="{{asset('admin/assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>B. Huber	</td>
                        <td>BeverlyWIN25</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="662e1304031426031e070b160a034805090b">[email&#160;protected]</a></td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user6" class="check">
                                <label for="user6" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="{{asset('admin/assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Alwin</td>
                        <td>Alwin243</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a0c3d5d3d4cfcdc5d2e0c5d8c1cdd0ccc58ec3cfcd">[email&#160;protected]</a></td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user7" class="check">
                                <label for="user7" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="{{asset('admin/assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Fred john</td>
                        <td>FredJ25</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="fc96939492bc99849d918c9099d29f9391">[email&#160;protected]</a></td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user15" class="check">
                                <label for="user15" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="{{asset('admin/assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Rasmussen	</td>
                        <td>Cras56</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d88ab9abb5adababbdb698bda0b9b5a8b4bdf6bbb7b5">[email&#160;protected]</a></td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user9" class="check" checked="">
                                <label for="user9" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="{{asset('admin/assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Grace	</td>
                        <td>Grace2022</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e1829492958e8c8493a18499808c918d84cf828e8c">[email&#160;protected]</a></td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user10" class="check" checked="">
                                <label for="user10" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="{{asset('admin/assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Rasmussen	</td>
                        <td>Cras56</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="277546544a525454424967425f464a574b420944484a">[email&#160;protected]</a></td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user19" class="check" checked="">
                                <label for="user19" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="{{asset('admin/assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Grace	</td>
                        <td>Grace2022</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="11726462657e7c7463517469707c617d743f727e7c">[email&#160;protected]</a></td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user18" class="check" checked="">
                                <label for="user18" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
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
