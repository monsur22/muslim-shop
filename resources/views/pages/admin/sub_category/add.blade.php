@extends('layouts.admin_layout')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Product Add sub Category</h4>
            <h6>Create new product Category</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Parent Category</label>
                        <select class="select">
                            <option>Choose Category</option>
                            <option>Category</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Category Code</label>
                        <input type="text">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                    <a href="subcategorylist.html" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endsection