<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );
require_once("../inc/tables.php");
//CHECK FOR URL CHANGING AND GETTING ID FROM URL
$page_name = '';
$status = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = '';
$add = "Add";
$update = "Update";
if (isset($_GET["id"]) && $_GET["id"] != "") {
    $image_required = "";
    $id = get_safe_value($con, $_GET["id"]);
    $res = mysqli_query($con, "SELECT * FROM `page_meta` WHERE `id`='$id'");
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $page_name = $row["page_name"];
        $meta_desc = $row["meta_desc"];
        $meta_title = $row["meta_title"];
        $meta_keyword = $row["meta_keyword"];
    } else {
        $_SESSION["msg"] = '<div class="alert alert-warning msg" role="alert">
        <strong>Warning!</strong> Not Exist</div>';
        header("location:page-meta");
        die();
    }
}
//CHECK FOR URL CHANGING ENDS
//DATA INSERT AND UPDATE CATEGORIES
if (isset($_POST["submit"])) {
    $page_name = get_safe_value($con, $_POST["page_name"]);
    $page_name = strtolower(str_replace(' ', '-', $page_name));
    $meta_desc = get_safe_value($con, $_POST["meta_desc"]);
    $meta_title = get_safe_value($con, $_POST["meta_title"]);
    $meta_keyword = get_safe_value($con, $_POST["meta_keyword"]);
    $meta_keyword = str_replace(' ', ',', $meta_keyword);
    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT
    if (isset($_GET["id"]) && $_GET["id"] != "") {
        $res = mysqli_query($con, "SELECT * FROM `page_meta` WHERE `id`='$id'");
        if (mysqli_num_rows($res) > 0) {
            $getdata = mysqli_fetch_array($res);
            if ($id == $getdata["id"] && $page_name == $getdata["page_name"]) {
                mysqli_query($con, "UPDATE `page_meta` SET `page_name`='$page_name',`status`='1',`meta_title`='$meta_title',`meta_desc`='$meta_desc',`meta_keyword`='$meta_keyword' WHERE `id`='$id'");
                $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
                <strong>Success!</strong> Updated.</div>';
                header("location:page-meta");
            }
        } else {
            $msg = '<div class="alert alert-warning msg" role="alert">
            <strong>Warning!</strong> Already Exist.</div>';
        }
    }
    $res = mysqli_query($con, "SELECT * FROM `page_meta` WHERE `page_name`='$page_name' AND `meta_title`='$meta_title'");
    if (mysqli_num_rows($res) > 0) {
        $msg = '<div class="alert alert-warning msg" role="alert">
        <strong>Warning!</strong> Already Exist.</div>';
    } else {
        if ($msg == "") {
            //IF URL HAVE THE ID FOR UPADTE DATA
            if (isset($_GET["id"]) && $_GET["id"] != "") {
                mysqli_query($con, "UPDATE `page_meta` SET `page_name`='$page_name',`status`='1',`meta_title`='$meta_title',`meta_desc`='$meta_desc',`meta_keyword`='$meta_keyword' WHERE `id`='$id'");
                $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
                <strong>Success!</strong> Updated.</div>';
            } else {
                //IF URL NOT HAVE THE ID THEN INSERT DATA
                mysqli_query($con, "INSERT INTO `page_meta`(`page_name`,`meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES ('$page_name','$meta_title','$meta_desc','$meta_keyword','1')");
                $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
                <strong>Success!</strong> Added.</div>';
            }
            header("location:page-meta");
            die();
        }
    }
}
?>
<div class="wrapper">
    <?php require("../inc/sidebar.php"); ?>
    <div class="main-panel">
        <?php require("../inc/top-navbar.php"); ?>
        <div class="content">
            <?php echo $msg; ?>
            <div class="container-fluid px-0">
                <div class="col-12 px-0">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title text-uppercase font-weight-bold"><?php if (isset($_GET["id"]) && $_GET["id"] != "") {
                                                                                        echo $update;
                                                                                    } else {
                                                                                        echo $add;
                                                                                    } ?> Page Meta</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                <div class = "col-md-12 p-3">
<label for = "page_name">Page Name</label>
<select name = "page_name" id = "page_name"
class = "form-control text-capitalize pl-2">
<?php


$res = mysqli_query( $con, "SELECT * FROM `page_name` WHERE `status`='1' ORDER BY `name` ASC");

if ( mysqli_num_rows( $res ) > 0 ) {
    while ( $row = mysqli_fetch_array( $res ) ) {
        if($row["name"] == $page_name){
            echo "<option selected value=" . $row['name']. ">" . ucwords(str_replace("-"," ",$row['name'])) . "</option>";
        }else{
            echo "<option value=" . $row['name']. ">" . ucwords(str_replace("-"," ",$row['name'])) . "</option>";
        }

    }
} else {
    echo "<option disable hidden>No Page Name Is Created</option>";
}
?>
</select>
</div>
                                    <div class="col-md-6 p-3">
                                        <label for="meta_title">Meta Title</label>
                                        <textarea name="meta_title" rows="3" id="meta_title" class="form-control"
                                            placeholder="Please Enter Meta Title"> <?php echo $meta_title; ?> </textarea>
                                    </div>
                                    <div class="col-md-6 p-3">
                                        <label for="meta_desc">Meta Description</label>
                                        <textarea name="meta_desc" rows="3" id="meta_desc" class="form-control"
                                            placeholder="Please Enter Meta Description"> <?php echo $meta_desc; ?> </textarea>
                                    </div>
                                    <div class="col-md-6 p-3">
                                        <label for="meta_keyword">Meta Keyword</label>
                                        <textarea name="meta_keyword" rows="3" id="meta_keyword" class="form-control"
                                            placeholder="Please Enter Meta Keyword"> <?php echo  $meta_keyword = str_replace(',', ' ', $meta_keyword); ?> </textarea>
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

                                            <div class="col-md-2 px-2"> <a href="./page-meta" class="btn btn-info btn-block btn-lg text-uppercase">View</a>
                                            </div>
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