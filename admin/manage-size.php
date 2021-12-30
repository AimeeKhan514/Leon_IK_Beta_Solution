<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );
require_once("../inc/tables.php");
//CHECK FOR URL CHANGING AND GETTING ID FROM URL
$size='';
$order_by='';
$msg='';
$add="Add";
$update="Update";
if(isset($_GET["id"]) && $_GET["id"]!=""){
    $id = get_safe_value($con,$_GET["id"]);
    $res = mysqli_query($con,"SELECT * FROM `$table` WHERE `id`='$id'");
    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        $size = $row["size"];
        $order_by = $row["order_by"];
    }
    else{
        $_SESSION["msg"]='<div class="alert alert-warning msg" role="alert">
        <strong>Warning!</strong> Not Exist</div>';
        header("location:size");
    die();
    }
}
//CHECK FOR URL CHANGING ENDS
//DATA INSERT AND UPDATE floating_news
if(isset($_POST["submit"])){
    $size = get_safe_value($con,$_POST["size"]);
    $order_by = get_safe_value($con,$_POST["order_by"]);
    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT
    $res = mysqli_query($con,"SELECT * FROM `$table` WHERE `size`='$size'");
    if(mysqli_num_rows($res)>0){
        if(isset($_GET["id"]) && $_GET["id"]!=""){
            $getdata=mysqli_fetch_array($res);
            if($id==$getdata["id"]){
                $_SESSION["msg"]= '<div class="alert alert-success msg" role="alert">
                <strong>Success!</strong> Updated.</div>';
                header("location:size");
            }
        }else{
            $msg='<div class="alert alert-warning msg" role="alert">
            <strong>Warning!</strong> Already Exist.</div>';
        }
    }
    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT END
    if($msg==""){
    //IF URL HAVE THE ID FOR UPADTE DATA
    if(isset($_GET["id"]) && $_GET["id"]!=""){
        mysqli_query($con,"UPDATE `$table` SET `size`='$size', `order_by`='$order_by' WHERE `id`='$id'");
        $_SESSION["msg"]='<div class="alert alert-success msg" role="alert">
        <strong>Success!</strong> Updated.</div>';
      }else{
          //IF URL NOT HAVE THE ID THEN INSERT DATA
        mysqli_query($con,"INSERT INTO `$table` (`size`,`order_by`,`status`) VALUES ('$size','$order_by','1')");
        $_SESSION["msg"]='<div class="alert alert-success msg" role="alert">
        <strong>Success!</strong> Added.</div>';
    }
    header("location:size");
    die();
    }
}
?>
<div class="wrapper">
    <?php require("../inc/sidebar.php");?>
    <div class="main-panel">
        <?php require("../inc/top-navbar.php"); ?>
        <div class="content">
            <?php  echo $msg;?>
            <div class="container-fluid px-0">
                <div class="col-12 px-0">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title text-uppercase font-weight-bold"><?php if(isset($_GET["id"]) && $_GET["id"]!=""){echo $update;}else{echo $add;}?> Size</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" class="row">
                                <div class="col-md-6 p-3">
                                <label for="size">Size</label>
                                    <input type="text" id="size" name="size" value="<?php echo $size;?>" class="form-control" placeholder="E,g S, M, L" required autofocus>
                                </div>
                                <div class="col-md-6 p-3">
                                <label for="order_by">Order By</label>
                                    <input type="text" name="order_by" value="<?php echo $order_by;?>" id="order_by" class="form-control" placeholder="E.g 1, 2, 3" required>
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

                                            <div class="col-md-2 px-2"> <a href="./size" class="btn btn-info btn-block btn-lg text-uppercase">View</a>
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
