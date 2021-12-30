<?php
$page_name = basename($_SERVER['PHP_SELF'], ".php");
function pr($arr)
{
    echo "<pre>";
    print_r($arr);
}
function prx($arr)
{
    echo "<pre>";
    print_r($arr);
    die();
}
function getSaveValue($con, $str)
{
    if ($str != "") {
        $str = trim($str);
        $str = htmlentities($str);
        return mysqli_real_escape_string($con, $str);
    }
}





?>