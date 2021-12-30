<?php
require( "../inc/top-dashboard.php");
if ( isset( $_SESSION["ADMIN_LOGIN"] ) ) {
    header( "location:dashboard");
}
$msg = "";
if ( isset( $_POST["submit"] ) ) {
    $email = getSaveValue( $con, $_POST["email"] );
    $password = getSaveValue( $con, $_POST["password"] );
    $password = md5( $password );
    $sql = "SELECT * FROM `admin` WHERE `email`='$email' AND BINARY `password`='$password'";
    $res = mysqli_query( $con, $sql );
    if ( mysqli_num_rows( $res )>0 ) {
        $row = mysqli_fetch_array( $res );
        if ( isset( $row['status'] ) && $row['status'] == '1' ) {
            $_SESSION["ADMIN_LOGIN"] = true;
            $_SESSION["ADMIN_USERNAME"] = $row["name"];
            $_SESSION["ADMIN_ROLE"] = $row["role"];
            $_SESSION["ADMIN_EMAIL"] = $row["email"];
            $_SESSION["ADMIN_PASSWORD"] = md5( $row["password"] );
            $_SESSION["ADMIN_IMAGE"] = $row["image"];
            $_SESSION["ADMIN_ID"] = $row["id"];
            $_SESSION["msg"] = "<div class='alert alert-success msg'>Welcome!&nbsp;<strong class='text-uppercase'>".$_SESSION['ADMIN_USERNAME']."</strong><br>Login Success!</div>";
            header( "location:dashboard" );
        } else {
            $msg = "<div class='alert alert-warning msg'>Your Login is Expired By The Administrator!</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger msg'>Please Enter Correct Login Details</div>";
    }
}

echo $msg;
?>
<body class = "">
<div class = "container p-lg-5 p-3">
<div class = "col-md-6 mx-auto shadow p-lg-5 p-3 bg-light rounded" style="    border-top: 5px solid #333333;
    border-bottom: 5px solid #333333;">

<a href = "../index">
<div class = "img-container col-6 m-auto pt-3 pb-3 mb-3">
<img src = "../assets/images/Beta-Solutions-Logo.svg" class = "img-fluid" alt = "">
</div>
</a>
<form action = "" method = "post">
<div class = "col-12 mb-3 mt-3 p-3">
<input type = "email" pattern = "[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
onfocus = "this.placeholder = ''" onblur = "this.placeholder = 'Enter email address'" required
name = "email" class = "form-control" placeholder = "Enter Email">
</div>
<div class = "col-12 mb-3 mt-3 p-3">
<input type = "password" required name = "password" class = "form-control" placeholder = "Enter Password"
pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$"
                                title="The Minimum Password Length is 8 and Must contain at least 1 number, 1 uppercase, 1 lowercase, 1 Special character">
</div>
<p class = "text-danger text-right"><a href = "forget-password">forget password</a></p>
<div class = "col-12 mb-3 mt-3 p-3">
<button class = "btn btn-block btn-lg btn-primary" name = "submit">Login</button>
</div>
</form>
</div>
</div>
<?php require( "../inc/footer-dashboard.php" );
?>