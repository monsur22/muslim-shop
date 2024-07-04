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

    /// search input
    function toggleFilterInputs() {
        $("#filter_inputs").slideToggle("slow");
    }
    $("#filter_search").on("click", function() {
        console.log("click filter search button")
        toggleFilterInputs();
        $(this).toggleClass("setclose");
    });

});

// // Define a function to handle filter search toggling
// function toggleFilterSearch(searchId, inputsId) {
//     $(document).on("click", searchId, function() {
//         console.log("click filter");
//         $(inputsId).slideToggle("slow");
//         $(searchId).toggleClass("setclose");
//     });
// }

// $(document).ready(function() {
//     // Get the current URL
//     var currentUrl = window.location.href;
//     console.log("hello from test");
//     // Loop through each submenu item
//     $(".submenu > ul > li").each(function() {
//         // Get the href attribute of the submenu item
//         var menuItemUrl = $(this).find('a').attr('href');

//         // Check if the current URL contains the menu item URL
//         if (currentUrl.includes(menuItemUrl)) {

//             // Remove the "active" class from all other submenu items
//             $(".submenu > ul > li > a").removeClass("active");

//             // Add the "active" class to the selected submenu item
//             $(this).find('a').addClass("active");

//             // Add the "active" class to the parent submenu item
//             $(this).closest('.submenu').find('> a').addClass("active");

//             // Add the "subdrop" class to the parent submenu item
//             $(this).closest('.submenu').find('> a').addClass("subdrop");

//             // Add the "active" class to the <a> element within <li>
//             $(this).find('a').addClass("active");

//             // Remove the "active" class from the default active menu item
//             $(".default-active").removeClass("active");
//         }
//     });

//     // Call the function for each filter search
//     toggleFilterSearch("#filter_search", "#filter_inputs");
//     toggleFilterSearch("#filter_search1", "#filter_inputs1");
//     toggleFilterSearch("#filter_search2", "#filter_inputs2");
// });
