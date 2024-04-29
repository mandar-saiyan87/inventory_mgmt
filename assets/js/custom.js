$(window).resize(function () {
    //Function

});


$(document).ready(function () {

    // Show / hide sidemenu   
    sidemenushow()
    sidemenuclose()
    sidebarcloseouside()


});

function sidemenushow(e) {
    $('#hbmenu').on('click', function () {
        $('.header_wrapper').addClass('header_wrapper_show')
    })
}

function sidemenuclose() {
    $('.nav_button').on('click', function () {
        $('.header_wrapper').removeClass('header_wrapper_show')
    })
}

function sidebarcloseouside() {
    $(document).on('click', function (e) {
        if (!$(e.target).is('#hbmenu') && !$(e.target).closest('.header_wrapper').length && !$(e.target).closest('#menubtn').length) {
            $('.header_wrapper').removeClass('header_wrapper_show')
        }
    })
}









