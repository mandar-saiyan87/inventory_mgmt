$(window).resize(function () {
    //Function

});


$(document).ready(function () {

    // Show / hide sidemenu   
    sidemenushow()
    sidemenuclose()
    sidebarcloseouside()

    // Get Product ID to fetch details
    getDetails()


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

function getDetails() {
    $('.getdetails').on('click', function () {
        const prodId = $(this).data('id')
        $.ajax({
            url: "http://localhost:3000/products",
            type: "POST",
            data: {
                action: 'getDetails',
                prodId: prodId

            },
            success: function (response) {
                // console.log(response)
                $('.viewProdDetails').html(response)
            },
            error: function (request, status, error) {
                console.log(request.responseText, error)
            }
        })
    })

    $('.editproduct').on('click', function () {
        const prodId = $(this).data('id')
        $.ajax({
            url: "http://localhost:3000/products",
            type: "POST",
            data: {
                action: 'editDetails',
                prodId: prodId
            },
            success: function (response) {
                // console.log(response)
                let prodDetails = JSON.parse(response)
                $('#eSku').val(prodDetails['sku'])
                $('#eName').val(prodDetails['name'])
                $('#eTextArea').val(prodDetails['description'])
                $('#eStock').val(prodDetails['stock'])
                $('#ePurchase').val(prodDetails['purchase'])
                $('#eSales').val(prodDetails['sales'])
                $('#eQty').val(prodDetails['qty'])
                $('#eCategory').val(prodDetails['category'])
                $('#ePrice').val(prodDetails['price'])
            },
            error: function (request, status, error) {
                console.log(request.responseText, error)
            }
        })
    })
}








