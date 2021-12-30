<?php
require("../inc/config.php");
require_once("../inc/function.php");
$msg="";
if(isset($_POST["btn_submit"])){
   $email = get_safe_value($con,$_POST["email"]);
if(empty($email)){
    $msg="<div class='alert alert-danger top100px msg-login  text-center text-capitalize'>Please Enter Email..!</div>";
}else{
    $sql = "SELECT * FROM `admin` WHERE `email`='$email'";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_array($res);
        $_SESSION["ADMIN_NAME"]=$row["name"];
        $_SESSION["ADMIN_EMAIL"]=$row["email"];
        $_SESSION["ADMIN_ID"]=$row["id"];
        //$_SESSION["ADMIN_PASSWORD"]=md5($row["password"]);
        //$OTP = rand(111111,999999);
        //$_SESSION["OTP"]=$OTP;
        //mysqli_query($con,"UPDATE `users` SET `otp`='$OTP' WHERE `email`='$email' AND `id`='".$_SESSION['USER_ID']."'");
        $_SESSION["msg"]="<div class='alert alert-success top100px msg-login  text-center text-capitalize'>Welcome..!&nbsp;&nbsp;<strong class='text-uppercase'>".$_SESSION['USER_NAME']."</strong><br>Please Reset Your Password..!</div>";
        header("Location:password-verify");
    }
    else{
        $msg="<div class='alert alert-danger top100px msg-login  text-center text-capitalize'>Please Enter Correct Email..!</div>";
    }
}
}
if ( isset( $_SESSION["msg"] ) ) {
    echo $_SESSION["msg"];
    unset( $_SESSION["msg"] );
}
require("../inc/top-dashboard.php");
?>
<body class="">
    <div class="container p-lg-5 p-3">
        <div class="col-md-6 offset-md-3 shadow p-lg-5 p-3 bg-light rounded">
            <?php echo $msg;?>
            <a href="index">
                    <div class="img-container col-4 m-auto pt-3 pb-3 mb-3">
                <img src="../img/logo.png" class="img-fluid" alt="">
            </div>
            </a>
            <h1 class="h4 text-center">Forget Password</h1>
            <form action="" method="post">
                <div class="col-12 mb-3 mt-3 p-3">
                    <input id="email" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required name="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="col-12 mb-3 mt-3 p-3 div_otp">
                    <input id="otp" type="text" pattern="[0-9]{4}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter 4 Digit OTP'" required class="form-control input_otp" placeholder="Enter 4 Digit OTP">
                </div>
                 <div class="col-12 mb-3 mt-3 p-3 div_otp_msg">
                </div>
                <div class="col-12 mb-3 mt-3 p-3">
                    <button class="btn btn-block btn-lg btn-primary btn_otp" type="button">Send OTP</button>
                    <button class="btn btn-block btn-lg btn-primary btn_otp_verify" type="button">Verify Otp</button>
                    <button class="btn btn-block btn-lg btn-primary btn_sub" name="btn_submit" type="submit">Submit Email</button>
                </div>
            </form>
        </div>
    </div>
    <?php require("../inc/footer-dashboard.php");?>
<script>
$(".div_otp").hide();
$(".div_otp_msg").hide();
$(".btn_sub").hide();
$(".btn_otp_verify").hide();
$(".btn_otp").click(function() {
    var email = $("#email").val();
    if (email == "") {
        $("#email").css({
            "border": "1px solid red"
        });
    } else {
        $("#email").css({"border": "0px"});
        $("#email").attr('readonly', true);
        $(".div_otp_msg").show().html('<p class="text-uppercase text-info mt-2 mb-0">Sending..!</p>');
        $.ajax({
        url: "send_otp.php",
        type: "POST",
        data: 'email='+email,
        success: function(result) {
        if(result == 'done') {
        $(".div_otp").show();
        $(".btn_otp").hide();
        $(".btn_otp_verify").show();
        //alert("yes");
        $(".div_otp_msg").html('<p class="text-uppercase text-success mt-2 mb-0">Check Email.!</p>');
        } else {
           // alert("No");
       $(".div_otp_msg").html('<p class="text-uppercase text-danger mt-2 mb-0">Fail To Send.!</p>');
                    }
                }
            });
    }
});
$(".btn_otp_verify").click(function() {
    var verify_email = $("#otp").val();
    if (verify_email == "") {
        $("#otp").css({
            "border": "1px solid red"
        });
    } else {
        $("#otp").css({
            "border": "0px"
        });
        $.ajax({
        url: "send_otp.php",
        type: "POST",
        data: 'verify_email='+verify_email,
        success: function(result_verify) {
        if(result_verify == 'verify') {
        $(".btn_otp_verify").hide();
        $(".div_otp").hide();
        $(".div_otp_msg").show();
        $(".btn_sub").show();
         $("#email").attr('readonly', true);
        //alert("yes");
        $(".div_otp_msg").html('<p class="text-uppercase text-success mt-3 mb-0">Verified..!</p>');
        } else {
           // alert("No");
       $(".div_otp_msg").html('<p class="text-uppercase text-danger mt-2 mb-0">Failed To Verify..!</p>');
                    }
                }
            });
    }
});
</script>
