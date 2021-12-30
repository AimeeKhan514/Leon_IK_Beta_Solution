<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );
require_once("../inc/tables.php");
//CHECK FOR URL CHANGING AND GETTING ID FROM URL
$color='';
$msg='';
$add="Add";
$update="Update";
if(isset($_GET["id"]) && $_GET["id"]!=""){
    $id = get_safe_value($con,$_GET["id"]);
    $res = mysqli_query($con,"SELECT * FROM `$table` WHERE `id`='$id'");
    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        $color = $row["color"];
    }
    else{
        $_SESSION["msg"]='<div class="alert alert-warning msg" role="alert">
        <strong>Warning!</strong> Not Exist</div>';
        header("location:color");
    die();
    }
}
//CHECK FOR URL CHANGING ENDS
//DATA INSERT AND UPDATE floating_news
if(isset($_POST["submit"])){
    $color = get_safe_value($con,$_POST["color"]);
    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT
    $res = mysqli_query($con,"SELECT * FROM `$table` WHERE `color`='$color'");
    if(mysqli_num_rows($res)>0){
        if(isset($_GET["id"]) && $_GET["id"]!=""){
            $getdata=mysqli_fetch_array($res);
            if($id==$getdata["id"]){
                $_SESSION["msg"]= '<div class="alert alert-success msg" role="alert">
                <strong>Success!</strong> Updated.</div>';
                header("location:color");
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
        mysqli_query($con,"UPDATE `$table` SET `color`='$color' WHERE `id`='$id'");
        $_SESSION["msg"]='<div class="alert alert-success msg" role="alert">
        <strong>Success!</strong> Updated.</div>';
      }else{
          //IF URL NOT HAVE THE ID THEN INSERT DATA
        mysqli_query($con,"INSERT INTO `$table` (`color`,`status`) VALUES ('$color','1')");
        $_SESSION["msg"]='<div class="alert alert-success msg" role="alert">
        <strong>Success!</strong> Added.</div>';
    }
    header("location:color");
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
                            <h3 class="card-title text-uppercase font-weight-bold"><?php if(isset($_GET["id"]) && $_GET["id"]!=""){echo $update;}else{echo $add;}?> color</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" class="row">
                                <div class="col-md-12 p-3">
                                    <label for="color">Select Color</label>
                                    <input type="color" id="color" name="color" value="<?php echo $color;?>" class="form-control" placeholder="E,g S, M, L" required autofocus>
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

                                            <div class="col-md-2 px-2"> <a href="./color" class="btn btn-info btn-block btn-lg text-uppercase">View</a>
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
