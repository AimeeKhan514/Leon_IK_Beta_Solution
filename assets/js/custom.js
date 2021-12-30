/*=========================
TOP NAVBAR 
=========================*/
$(window).scroll(function() {
    $page_scroll = $(document).scrollTop();
    if ($page_scroll > 350) {
        $("#navbar").css({
            "position": "fixed",
            "padding": "0px 0px",
            "width": "100%",
            "transition": "0.5s",
            "background-color": "#333333"
        });
        $("#logo").css({
            "padding": "10px 20px",
            "height": "60px",
            "transition": "0.5s"
        });
    } else {
        $("#navbar").css({
            "position": "static",
            "padding": "25px 0px",
            "width": "auto",
            "transition": "0.5s",
            "background-color": "white"
        });
        $("#logo").css({
            "padding": "0px 0px",
            "height": "92px",
            "transition": "0.5s"
        });
    }
});
$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 25,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 4
        }
    }
});

/*=========================
DELETE BUTTON SWEET ALERT
=========================*/
$("#btn_delete").on('click', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');
    swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
            //closeOnCancel: false

        },
        function() {
            setTimeout(function() {
                swal("Deleted!", "Item is Deleting!", "success");
            }, 500);
            setTimeout(function() {
                window.location.href = link;
            }, 1500);
        });
});
/*=========================
NOTIFICATION ALERT
=========================*/
$(".msg").fadeTo(2500, 500).fadeOut(3500);
/*=========================
COMMENTS
=========================*/
/*=========================
COMMENTS
=========================*/
/*=========================
COMMENTS
=========================*/
/*=========================
COMMENTS
=========================*/
/*=========================
COMMENTS
=========================*/
/*=========================
COMMENTS
=========================*/
/*=========================
COMMENTS
=========================*/