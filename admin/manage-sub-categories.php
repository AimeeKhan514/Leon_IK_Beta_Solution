<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );
require_once("../inc/tables.php");
//CHECK FOR URL CHANGING AND GETTING ID FROM URL
$sub_categories = '';
$categories = '';
$image = '';
$top_sub_categories = '';
$image_required = "required";
$msg = '';
$add = "Add";
$update = "Update";
if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
    $image_required = "";
    $id = get_safe_value( $con, $_GET["id"] );
    $res = mysqli_query( $con, "SELECT * FROM `sub_categories` WHERE `id`='$id'" );
    if ( mysqli_num_rows( $res ) > 0 ) {
        $row = mysqli_fetch_assoc( $res );
        $sub_categories = $row["sub_categories"];
        $categories = $row["categories_id"];
        $image = $row["image"];
        // $top_sub_categories = $row["top_sub_categories"];
    } else {
        $_SESSION["msg"] = '<div class="alert alert-warning msg" role="alert">
        <strong>Warning!</strong> Not Exist</div>';
        die();
    }
}
//CHECK FOR URL CHANGING ENDS
//DATA INSERT AND UPDATE CATEGORIES
if ( isset( $_POST["submit"] ) ) {
    $sub_categories = get_safe_value( $con, $_POST["sub_categories"] );
    $categories = get_safe_value( $con, $_POST["categories_id"] );
    // $top_sub_categories = get_safe_value( $con, $_POST["top_sub_categories"] );
    if ( empty( $_FILES["image"]["name"] ) ) {
        $image = $_POST["old_image"];
    } else {
        unlink('../media/sub-categories/' . $image);
        $image = $_FILES["image"]["name"];
        $image = rand( 111111111, 999999999 ) . "-" . $image;
        $image = str_replace(" ","-",$image);
        move_uploaded_file( $_FILES["image"]["tmp_name"], '../media/sub-categories/'.$image);
    }
    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT
    $res = mysqli_query( $con, "SELECT * FROM `sub_categories` WHERE `sub_categories`='$sub_categories' AND `categories_id`='$categories'" );
    if ( mysqli_num_rows( $res ) > 0 ) {
        if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
            $getdata = mysqli_fetch_array( $res );
            if ( $id == $getdata["id"] ) {
                $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
                <strong>Success!</strong> Updated.</div>';
                header( "location:sub-categories" );
            }
        } else {
            $msg = '<div class="alert alert-warning msg" role="alert">
            <strong>Warning!</strong> Already Exist.</div>';
        }
    }
    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT END
    //IF URL HAVE THE ID FOR UPDATE DATA
    if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
        mysqli_query( $con, "UPDATE `sub_categories` SET `categories_id`='$categories',`sub_categories`='$sub_categories',`image`='$image',`top_sub_categories`='0' WHERE `id`='$id'" );
        $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
        <strong>Success!</strong> Updated.</div>';
    } else {
        //IF URL NOT HAVE THE ID THEN INSERT DATA
        mysqli_query( $con, "INSERT INTO `sub_categories` (`sub_categories`,`categories_id`,`image`,`top_sub_categories`,`status`) VALUES ('$sub_categories','$categories','$image','0','1')" );
        $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
        <strong>Success!</strong> Added.</div>';
    }
    header( "location:sub-categories" );
    die();
}
?>
<div class = "wrapper">
<?php require( "../inc/sidebar.php" );
?>
<div class = "main-panel">
<?php require( "../inc/top-navbar.php" );
?>
<div class = "content">
<?php echo $msg;
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
?> Sub Categories</h3>
</div>
<div class = "card-body">
<form action = "" method = "post" enctype = "multipart/form-data">
<div class = "row">
<div class = "col-md-6 p-3">
<label for = "categories">Main Categories</label>
<select name = "categories_id" id = "categories"
class = "form-control text-capitalize pl-2">
<option selected disabled hidden>Select Main Categories </option>
<?php
$res = mysqli_query( $con, "SELECT * FROM `categories` WHERE `status`='1' ORDER BY `id` DESC" );
if ( mysqli_num_rows( $res ) > 0 ) {
    while ( $row = mysqli_fetch_array( $res ) ) {
        if ( $row["id"] == $categories ) {
            echo "<option selected value=" . $row['id'] . ">" . $row['categories'] . "</option>";
        } else {
            echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
        }
    }
} else {
    echo "<option disable hidden>No Category Is Created.</option>";
}
?>
</select>
</div>
<div class = "col-md-6 p-3">
<label for = "sub_categories">Sub Categories</label>
<input type = "text" id = "sub_categories" name = "sub_categories"
value = "<?php echo $sub_categories; ?>" class = "form-control"
placeholder = "Sub Category Title" required autofocus>
</div>
<div class = "col-md-6 p-3">
<label for = "image">Sub Category Image</label>
<input type = "hidden" name = "old_image" value = "<?php echo $image; ?>">
<input type = "file" accept = "image/*" name = "image" id = "image" class = "form-control"
<?php 
// echo $image_required;
?>>
</div>

<!-- <div class = "col-md-6 p-3">
<label for = "top_sub_categories">Top Sub Category</label>
<select name = "top_sub_categories" id = "top_sub_categories"
class = "form-control text-capitalize pl-2">
<option <?php if ( isset( $top_sub_categories ) && $top_sub_categories != "" ) {
    echo  "selected hidden disabled";
}
?> value = ''>Choose</option>";
                                            <?php
                                            if ($top_sub_categories == 1) {
                                                echo "<option selected value = '1'>Yes</option>
<option value = '0'>No</option>";
                                            } elseif ($top_sub_categories == 0) {
                                                echo "<option selected value = '0'>No</option>
<option value = '1'>Yes</option>";
                                            } else {
                                                echo "<option value = '1'>Yes</option>
<option value = '0'>No</option>";
                                            }
                                            ?>
                                        </select>
                                    </div> -->

                                </div>
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

                                            <div class="col-md-2 px-2"> <a href="./sub-categories" class="btn btn-info btn-block btn-lg text-uppercase">View</a>
                                            </div>
                                        </div>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            require("../inc/footer-dashboard.php");
?>