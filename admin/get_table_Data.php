<?php
require( "../inc/config.php" );
require( "../inc/function.php" );
if ( isset( $_POST["tableName"] ) && $_POST["tableName"] != "" ) {
    $table = $_POST["tableName"];
    $res =  mysqli_query( $con, "SELECT * FROM $table" );
    if ( mysqli_num_rows( $res )>0 ) {
        $count = mysqli_num_rows( $res );
        $row = mysqli_fetch_array( $res );
        return $row;
    } else {
        return 0;
    }
}
?>