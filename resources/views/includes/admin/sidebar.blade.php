<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active default-active">
                    <a href="{{route('dashboard')}}"><img src="{{asset('admin/assets/img/icons/dashboard.svg')}}" alt="img"><span>
                            Dashboard</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('admin/assets/img/icons/product.svg')}}" alt="img"><span>
                            Product</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('products.index')}}">Product List</a></li>
                        <li><a href="{{route('products.create')}}">Add Product</a></li>
                        <li><a href="{{route('categories.index')}}">Category List</a></li>
                        <li><a href="{{route('categories.create')}}">Add Category</a></li>
                        <li><a href="{{route('sub-categories.index')}}">Sub Category List</a></li>
                        <li><a href="{{route('sub-categories.create')}}">Add Sub Category</a></li>
                        <li><a href="{{route('brands.index')}}">Brand List</a></li>
                        <li><a href="{{route('brands.create')}}">Add Brand</a></li>
                        <li><a href="{{route('product.import')}}">Import Products</a></li>
                        <li><a href="{{route('print.barcode')}}">Print Barcode</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('admin/assets/img/icons/sales1.svg')}}" alt="img"><span>
                            Sales</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('sales.index')}}">Sales List</a></li>
                        <li><a href="pos.html">POS</a></li>
                        <li><a href="{{route('sales.create')}}">New Sales</a></li>
                        {{-- <li><a href="salesreturnlists.html">Sales Return List</a></li>
                        <li><a href="createsalesreturns.html">New Sales Return</a></li> --}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('admin/assets/img/icons/purchase1.svg')}}" alt="img"><span>
                            Purchase</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('purchase.index')}}">Purchase List</a></li>
                        <li><a href="{{route('purchase.create')}}">Add Purchase</a></li>
                        <li><a href="{{route('purchase.import')}}">Import Purchase</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('admin/assets/img/icons/expense1.svg')}}" alt="img"><span>
                            Expense</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('expense.index')}}">Expense List</a></li>
                        <li><a href="{{route('expense.create')}}">Add Expense</a></li>
                        <li><a href="{{route('expense-category.index')}}">Expense Category</a></li>
                        <li><a href="{{route('expense-category.create')}}">Add Expense Category</a></li>

                    </ul>
                </li>
                {{-- <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('admin/assets/img/icons/quotation1.svg')}}" alt="img"><span>
                            Quotation</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="quotationList.html">Quotation List</a></li>
                        <li><a href="addquotation.html">Add Quotation</a></li>
                    </ul>
                </li> --}}
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('admin/assets/img/icons/transfer1.svg')}}" alt="img"><span>
                            Transfer</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('transfer.index')}}">Transfer List</a></li>
                        <li><a href="{{route('transfer.create')}}">Add Transfer </a></li>
                        <li><a href="{{route('transfer.import')}}">Import Transfer </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('admin/assets/img/icons/return1.svg')}}" alt="img"><span>
                            Return</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('salesReturn.index')}}">Sales Return List</a></li>
                        <li><a href="{{route('salesReturn.create')}}">Add Sales Return </a></li>
                        <li><a href="{{route('purchaseReturn.index')}}">Purchase Return List</a></li>
                        <li><a href="{{route('purchaseReturn.create')}}">Add Purchase Return </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('admin/assets/img/icons/users1.svg')}}" alt="img"><span>
                            People</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('customers.index')}}">Customer List</a></li>
                        <li><a href="{{route('customers.create')}}">Add Customer </a></li>
                        <li><a href="{{route('suppliers.index')}}">Supplier List</a></li>
                        <li><a href="{{route('suppliers.create')}}">Add Supplier </a></li>
                        {{-- <li><a href="{{route('purchase.index')}}">User List</a></li>
                        <li><a href="{{route('purchase.index')}}">Add User</a></li> --}}
                        <li><a href="{{route('stores.index')}}">Store List</a></li>
                        <li><a href="{{route('stores.create')}}">Add Store</a></li>
                    </ul>
                </li>
                {{-- <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('admin/assets/img/icons/places.svg')}}" alt="img"><span>
                            Places</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('purchase.index')}}">New Country</a></li>
                        <li><a href="{{route('purchase.index')}}">Countries list</a></li>
                        <li><a href="{{route('purchase.index')}}">New State </a></li>
                        <li><a href="{{route('purchase.index')}}">State list</a></li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <a href="components.html"><i data-feather="layers"></i><span> Components</span> </a>
                </li>
                <li>
                    <a href="blankpage.html"><i data-feather="file"></i><span> Blank Page</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="alert-octagon"></i> <span> Error Pages
                        </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="error-404.html">404 Error </a></li>
                        <li><a href="error-500.html">500 Error </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="box"></i> <span>Elements </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="sweetalerts.html">Sweet Alerts</a></li>
                        <li><a href="tooltip.html">Tooltip</a></li>
                        <li><a href="popover.html">Popover</a></li>
                        <li><a href="ribbon.html">Ribbon</a></li>
                        <li><a href="clipboard.html">Clipboard</a></li>
                        <li><a href="drag-drop.html">Drag & Drop</a></li>
                        <li><a href="rangeslider.html">Range Slider</a></li>
                        <li><a href="rating.html">Rating</a></li>
                        <li><a href="toastr.html">Toastr</a></li>
                        <li><a href="text-editor.html">Text Editor</a></li>
                        <li><a href="counter.html">Counter</a></li>
                        <li><a href="scrollbar.html">Scrollbar</a></li>
                        <li><a href="spinner.html">Spinner</a></li>
                        <li><a href="notification.html">Notification</a></li>
                        <li><a href="lightbox.html">Lightbox</a></li>
                        <li><a href="stickynote.html">Sticky Note</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="bar-chart-2"></i> <span> Charts </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="chart-apex.html">Apex Charts</a></li>
                        <li><a href="chart-js.html">Chart Js</a></li>
                        <li><a href="chart-morris.html">Morris Charts</a></li>
                        <li><a href="chart-flot.html">Flot Charts</a></li>
                        <li><a href="chart-peity.html">Peity Charts</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="award"></i><span> Icons </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                        <li><a href="icon-feather.html">Feather Icons</a></li>
                        <li><a href="icon-ionic.html">Ionic Icons</a></li>
                        <li><a href="icon-material.html">Material Icons</a></li>
                        <li><a href="icon-pe7.html">Pe7 Icons</a></li>
                        <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
                        <li><a href="icon-themify.html">Themify Icons</a></li>
                        <li><a href="icon-weather.html">Weather Icons</a></li>
                        <li><a href="icon-typicon.html">Typicon Icons</a></li>
                        <li><a href="icon-flag.html">Flag Icons</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="columns"></i> <span> Forms </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                        <li><a href="form-input-groups.html">Input Groups </a></li>
                        <li><a href="form-horizontal.html">Horizontal Form </a></li>
                        <li><a href="form-vertical.html"> Vertical Form </a></li>
                        <li><a href="form-mask.html">Form Mask </a></li>
                        <li><a href="form-validation.html">Form Validation </a></li>
                        <li><a href="form-select2.html">Form Select2 </a></li>
                        <li><a href="form-fileupload.html">File Upload </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="layout"></i> <span> Table </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="tables-basic.html">Basic Tables </a></li>
                        <li><a href="data-tables.html">Data Table </a></li>
                    </ul>
                </li> --}}

                {{-- Application --}}
                {{-- <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('admin/assets/img/icons/product.svg')}}" alt="img"><span>
                            Application</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('chat.application')}}">Chat</a></li>
                        <li><a href="{{route('calender.application')}}">Calendar</a></li>
                        <li><a href="{{route('email.application')}}">Email</a></li>
                    </ul>
                </li> --}}
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('admin/assets/img/icons/time.svg')}}" alt="img"><span>
                            Report</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('purchase-order.report')}}">Purchase order report</a></li>
                        <li><a href="{{route('inventory.report')}}">Inventory Report</a></li>
                        <li><a href="{{route('sales.report')}}">Sales Report</a></li>
                        <li><a href="{{route('invoice.report')}}">Invoice Report</a></li>
                        <li><a href="{{route('purchase.report')}}">Purchase Report</a></li>
                        <li><a href="{{route('supplier.report')}}">Supplier Report</a></li>
                        <li><a href="{{route('customer.report')}}">Customer Report</a></li>
                        {{-- <li><a href="{{route('expense.report')}}">Expense Report</a></li> --}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('admin/assets/img/icons/users1.svg')}}" alt="img"><span>
                            Users</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('users.create')}}">New User </a></li>
                        <li><a href="{{route('users.index')}}">Users List</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('admin/assets/img/icons/settings.svg')}}" alt="img"><span>
                            Settings</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('general.setting')}}">General Settings</a></li>
                        <li><a href="{{route('email.setting')}}">Email Settings</a></li>
                        <li><a href="{{route('payment.setting')}}">Payment Settings</a></li>
                        <li><a href="{{route('currency.setting')}}">Currency Settings</a></li>
                        <li><a href="{{route('groupPermission.setting')}}">Group Permissions</a></li>
                        <li><a href="{{route('taxRates.setting')}}">Tax Rates</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
