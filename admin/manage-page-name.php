<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );
require_once("../inc/tables.php");
//CHECK FOR URL CHANGING AND GETTING ID FROM URL
$page_name = '';
$msg = '';
$add = "Add";
$update = "Update";
if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
    $id = get_safe_value( $con, $_GET["id"] );
    $res = mysqli_query( $con, "SELECT * FROM `page_name` WHERE `id`='$id'" );
    if ( mysqli_num_rows( $res )>0 ) {
        $row = mysqli_fetch_assoc( $res );
        $page_name = $row["name"];
    } else {
        $_SESSION["msg"] = '<div class="alert alert-warning msg" role="alert">
        <strong>Warning!</strong> Not Exist</div>';
        header( "location:page-name" );
        die();
    }
}
//CHECK FOR URL CHANGING ENDS
//DATA INSERT AND UPDATE CATEGORIES
if ( isset( $_POST["submit"] ) ) {
    $page_name = get_safe_value( $con, $_POST["name"] );
    $page_name = strtolower(str_replace(" ","-",$page_name));
    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT
    $res = mysqli_query( $con, "SELECT * FROM `page_name` WHERE `name`='$page_name'" );
    if ( mysqli_num_rows( $res )>0 ) {
        if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
            $getdata = mysqli_fetch_array( $res );
            if ( $id == $getdata["id"] ) {
                $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
                <strong>Success!</strong> Updated.</div>';
                header( "location:page-name" );
            }
        } else {
            $msg = '<div class="alert alert-warning msg" role="alert">
            <strong>Warning!</strong> Already Exist.</div>';
        }
    }
    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT END
    if ( $msg == "" ) {
        //IF URL HAVE THE ID FOR UPADTE DATA
        if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
            mysqli_query( $con, "UPDATE `page_name` SET `name`='$page_name' WHERE `id`='$id'" );
            $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
            <strong>Success!</strong> Updated.</div>';
        } else {
            //IF URL NOT HAVE THE ID THEN INSERT DATA
            mysqli_query( $con, "INSERT INTO `page_name` (`name`,`status`) VALUES ('$page_name','1')" );
            $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
            <strong>Success!</strong> Added.</div>';
        }
        header( "location:page-name" );
        die();
    }
}
?>
<div class = "wrapper">
<?php require( "../inc/sidebar.php" );
?>
<div class = "main-panel">
<?php require( "../inc/top-navbar.php" );
?>
<div class = "content">
<?php  echo $msg;
?>
<div class = "container-fluid px-0">
<div class = "col-12 px-0">
<div class = "card">
<div class = "card-header card-header-primary">
<h3 class = "card-title text-uppercase font-weight-bold"><?php if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
    echo $update;
} else {
    echo $add;
}
?> Page Name</h3>
</div>
<div class = "card-body">
<form action = "" method = "post">
<div class = "col-md-6 p-3">
<input type = "text" name = "name" value = "<?php echo ucwords(str_replace("-"," ",$page_name));?>" class = "form-control" placeholder = "Page Name" required autofocus >
</div>
<div class="col-12 p-3">
                                        <div class="row">
                                            <div class="col-md-2 px-2">
                                                <button type="submit" class="btn btn-primary btn-block btn-lg  text-uppercase" name="submit"><?php if (isset($_GET["id"]) && $_GET["id"] != "") {
                                                                                                                                                    echo $update;
                                                                                                                                                } else {
                                                                                                                                                    echo $add;
                                                                                                                                                } ?></button>
                                            </div>

                                            <div class="col-md-2 px-2"> <a href="./page-name" class="btn btn-info btn-block btn-lg text-uppercase">View</a>
                                            </div>
                                        </div>
                                    </div>
</form>
</div>
</div>
</div>
<?php
require( "../inc/footer-dashboard.php" );
?>