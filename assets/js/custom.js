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