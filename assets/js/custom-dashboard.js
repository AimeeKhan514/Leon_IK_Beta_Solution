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