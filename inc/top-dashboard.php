
<?php
require( "../inc/config.php" );
require( "../inc/function.php" );
if($page_name == "index"){
    $page_name = "Login";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Aimee khan">
    <title><?php 
    echo ucwords(str_replace("-"," ",$page_name));
    ?> | Beta Solutions NZ</title>
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../assets/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet">
    <!-- <link href="../assets/css/demo.css" rel="stylesheet"> -->
    <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
    <link rel="stylesheet" href="../assets/css/custom-dashboard.css">
</head>
<body>
