<?php
ob_start();
session_start();
$msg = "";
$con = mysqli_connect( "localhost", "kingdoms_kingdoms_styles", "kingdoms_kingdoms_styles", "kingdoms_kingdoms_styles" );
if ( !$con ) {
    header( "location:404");
}
?>