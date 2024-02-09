    <script src="{{asset('admin/assets/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/feather.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/apexchart/chart-data.js')}}"></script>


    <script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/sweetalert/sweetalerts.min.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fullcalendar/jquery.fullcalendar.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery-ui.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/script.js')}}"></script>
    <script src="{{asset('admin/assets/js/modify.js')}}"></script>


    {{-- script for menu active --}}
    {{-- <script>
        $(document).ready(function() {
            // Get the current URL
            var currentUrl = window.location.href;

            // Loop through each submenu item
            $(".submenu > ul > li").each(function() {
                // Get the href attribute of the submenu item
                var menuItemUrl = $(this).find('a').attr('href');

                // Check if the current URL contains the menu item URL
                if (currentUrl.includes(menuItemUrl)) {

                    // Remove the "active" class from all other submenu items
                    $(".submenu > ul > li > a").removeClass("active");

                    // Add the "active" class to the selected submenu item
                    $(this).find('a').addClass("active");

                    // Add the "active" class to the parent submenu item
                    $(this).closest('.submenu').find('> a').addClass("active");

                    // Add the "subdrop" class to the parent submenu item
                    $(this).closest('.submenu').find('> a').addClass("subdrop");

                    // Add the "active" class to the <a> element within <li>
                    $(this).find('a').addClass("active");

                    // Remove the "active" class from the default active menu item
                    $(".default-active").removeClass("active");
                }
            });
        });
    </script> --}}