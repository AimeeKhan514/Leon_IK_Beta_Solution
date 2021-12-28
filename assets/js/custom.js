/*=========================
TOP NAVBAR 
=========================*/
$(window).scroll(function() {
    $page_scroll = $(document).scrollTop();
    if ($page_scroll > 100) {
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
/*=========================
TOP NAVBAR 
=========================*/