<?php
require( "../inc/config.php" );
require( "../inc/function.php" );
require( "logout.php" );
$categories = get_safe_value( $con, $_POST["categories"] );
$sub_categories_id = get_safe_value( $con, $_POST["sub_categories_id"] );
$sql = mysqli_query( $con, "SELECT * FROM `sub_categories` WHERE `categories_id`='$categories' AND  `status`='1'" );
if ( mysqli_num_rows( $sql ) > 0 ) {
    $html = "";
    while ( $row = mysqli_fetch_array( $sql ) ) {
        if ( $sub_categories_id == $row["id"] ) {
            $html =  "<option value='" . $row['id'] . "' selected>" . $row['sub_categories'] . "</option>";
        } else {
            $html =  "<option value='" . $row['id'] . "'>" . $row['sub_categories'] . "</option>";
        }
        echo  $html;
    }
} else {
    echo  "<option value=''> No Sub Category Is Found..!</option>";
}