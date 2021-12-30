<?php
require( "../inc/config.php" );
require( "../inc/function.php" );
require( "../inc/top-dashboard.php" );
$msg = "";
if(isset($_SESSION["ADMIN_EMAIL"]) && $_SESSION["ADMIN_EMAIL"]!=""){
if ( isset( $_POST["submit"] ) ) {
    $email = $_SESSION["ADMIN_EMAIL"];
    $pass = get_safe_value( $con, $_POST["pass"] );
    $repass = get_safe_value( $con, $_POST["repass"] );
    if ( isset( $pass ) && $pass != "" && isset( $repass ) && $repass != "" ) {
        if ( $pass == $repass ) {
            $update = mysqli_query( $con, "UPDATE `admin` SET `password`='".md5( $repass )."' WHERE `email`='$email'" );
            if ( $update ) {
                $msg = "<div class='alert position-absolute top100px msg-login alert-success text-center text-capitalize'><strong class='text-uppercase'>Successful..! </strong> Your Password is reset<br>Please Login with New Password..!</div>";
                header( "Refresh:3; url=index" );
            } else {
                $msg = "<div class='alert position-absolute top100px msg-login alert-danger text-center text-capitalize'>Error In Update..!</div>";
            }
        } else {
            $msg = "<div class='alert position-absolute top100px msg-login alert-danger text-center text-capitalize'>Password Does Not Matched..!</div>";
        }
    } else {
        $msg = "<div class='alert position-absolute top100px msg-login alert-warning text-center text-capitalize'>Please Fill out All The Fields..!</div>";
    }
}
require( "../inc/top-dashboard.php" );

echo $msg;
if ( isset( $_SESSION["msg"] ) ) {
    echo $_SESSION["msg"];
    unset( $_SESSION["msg"] );
}
?>
<body class = "">
<div class = "container p-lg-5 p-3">
<div class = "col-md-6 offset-md-3 shadow p-lg-5 p-3 bg-light rounded">

<a href = "index">
<div class = "img-container col-4 m-auto pt-3 pb-3 mb-3">
<img src = "../img/logo.png" class = "img-fluid" alt = "">
</div>
</a>
<h1 class = "h4 text-center">Enter New Password</h1>
<form action = "" method = "post">
<div class = "col-12 mb-3 mt-3 p-3">
<input type = "password" required name = "pass" class = "form-control" placeholder = "Enter Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$"
                                title="The Minimum Password Length is 8 and Must contain at least 1 number, 1 uppercase, 1 lowercase, 1 Special character">
</div>
<div class = "col-12 mb-3 mt-3 p-3">
<input type = "password" required name = "repass" class = "form-control" placeholder = "Confirm Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$"
                                title="The Minimum Password Length is 8 and Must contain at least 1 number, 1 uppercase, 1 lowercase, 1 Special character">
</div>
<div class = "col-12 mb-3 mt-3 p-3">
<button class = "btn btn-block btn-lg btn-primary" name = "submit">submit</button>
</div>
</form>
</div>
</div>

<?php
}else{
    $_SESSION["msg"]="<div class='alert alert-warning top100px msg-login  text-center text-capitalize'>Email Is Required..!</div>";
        header("Location:forget-password");
        die();
}


require( "../inc/footer-dashboard.php" );
?>
