<?php
require( "../inc/config.php" );
require( "../inc/function.php" );
if (isset($_SESSION["ADMIN_LOGIN"]) && $_SESSION["ADMIN_LOGIN"] !="") {
               
    $id = get_safe_value($con, $_POST["id"]);
    mysqli_query($con, "DELETE FROM `product_attributes` WHERE `id`='$id'");
}else{
    header( "location:index" );
    die();
}


?>