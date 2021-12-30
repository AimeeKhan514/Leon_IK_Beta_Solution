<?php
ob_start();
session_start();
$msg = "";
$con = mysqli_connect( "localhost", "root", "", "beta_solution");
if (!$con ) {
    header( "location:404");
}
?>