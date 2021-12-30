<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );
require_once("../inc/tables.php");
//CHECK FOR URL CHANGING AND GETTING ID FROM URL
$name = '';
$email = '';
$password = '';
$old_password = '';
$role = '';
$status = '';
$image = '';
$msg = '';
$image_required = "required";
$add = "Add";
$update = "Update";
if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
    $image_required = "";
    $id = get_safe_value( $con, $_GET["id"] );
    $res = mysqli_query( $con, "SELECT * FROM `admin` WHERE `id`='$id'" );
    if ( mysqli_num_rows( $res )>0 ) {
        $row = mysqli_fetch_assoc( $res );
        $name = $row["name"];
        $email = $row["email"];
        $password = $row["password"];
        $role = $row["role"];
        $image = $row["image"];
    } else {
        $_SESSION["msg"] = '<div class="alert alert-warning msg" role="alert">
        <strong>Warning!</strong> Not Exist</div>';
        header( "location:managers" );
        die();
    }
}
//DATA INSERT AND UPDATE CATEGORIES
if ( isset( $_POST["submit"] ) ) {
    $name = get_safe_value( $con, $_POST["name"] );
    $email = get_safe_value( $con, $_POST["email"] );
    $role = get_safe_value( $con, $_POST["role"] );
    $password = get_safe_value( $con, $_POST["password"] );
    $old_password = get_safe_value( $con, $_POST["old_pass"] );
    if ( empty( $password ) ) {
        $password = $old_password;
    } else {
        $password = md5( $password );
    }
    if ( empty( $_FILES["image"]["name"] ) ) {
        $image = $_POST["old_image"];
    } else {
        unlink('../media/managers/' . $image);
        $image = rand( 111111111, 999999999 )."_".$_FILES["image"]["name"];
        $image = str_replace( " ", "_", $image );
            move_uploaded_file( $_FILES["image"]["tmp_name"], '../media/managers/'.$image );
    }

    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT
    if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
        $res = mysqli_query( $con, "SELECT * FROM `admin` WHERE `id`='$id'" );
        if ( mysqli_num_rows( $res )>0 ) {
            $getdata = mysqli_fetch_array( $res );
            if ( isset( $_POST["submit"] ) && $getdata["name"] == "$name" && $getdata["email"] == "$email" && $getdata["password"] == "$password" && $getdata["image"] == "$image" ) {
                $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
                <strong>Success!</strong> Updated.</div>';
            } else {
                if ( $id == $getdata["id"] ) {
                    mysqli_query( $con, "UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password',`image`='$image',`status`='1',`role`='$role' WHERE `id`='$id'" );
                    $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
                    <strong>Success!</strong> Updated.</div>';
                }
            }
            header( "location:managers" );
            die();
        } else {
            $msg = '<div class="alert alert-warning msg" role="alert">
            <strong>Warning!</strong> Already Exist.</div>';
        }
    }
    if ( $msg == "" ) {
        //IF URL HAVE THE ID FOR UPADTE DATA
        if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
            mysqli_query( $con, "UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password',`image`='$image',`status`='1',`role`='$role' WHERE `id`='$id'" );
            $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
            <strong>Success!</strong> Updated.</div>';
            header( "location:managers" );
        } else {
            if ( isset( $name ) && isset( $email ) ) {
                $res = mysqli_query( $con, "SELECT * FROM `admin` WHERE  `name`='$name' AND `email`='$email'" );
                if ( mysqli_num_rows( $res )>0 ) {
                    $msg = '<div class="alert alert-warning msg" role="alert">
                    <strong>Warning!</strong> Already Exist.</div>';
                } else {
                    mysqli_query( $con, "INSERT INTO `admin`(`name`, `email`, `password`,`image`, `status`,`role`) VALUES ('$name','$email','$password','$image','1','$role')" );
                    $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
                    <strong>Success!</strong> Added.</div>';
                }
            }
            //IF URL NOT HAVE THE ID THEN INSERT DATA
        }
        header( "location:managers" );
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
<?php
if ( isset( $_SESSION["msg"] ) ) {
    echo $_SESSION["msg"];
    unset( $_SESSION["msg"] );
}
?>
<div class = "content">
<div class = "container-fluid px-0">
<div class = "row">
<div class = "col-md-8">
<div class = "card">
<div class = "card-header card-header-primary">
<h4 class = "card-title p-3"><?php if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
    echo $update;
} else {
    echo $add;
}
?> Profile</h4>
</div>
<div class = "card-body">
<form action = "" method = "post" enctype = "multipart/form-data">
<div class = "row">
<div class = "col-md-6 p-3">
<label for = "name">User Name</label>
<input type = "text" class = "form-control" placeholder = "E.g. Ali Noor" name = "name" id = "name" value = "<?php echo $name;?>" required>
</div>
<div class = "col-md-6 p-3">
<label for = "email">Email address</label>
<input type = "email" class = "form-control" name = "email" id = "email" placeholder = "E.g.example@mail.com" value = "<?php echo $email;?>" required>
</div>
<div class = "col-md-6 p-3">
<label for = "password">Password</label>
<input type = "hidden" name = "old_pass" value = "<?php echo $password;?>">
<input type = "password" class = "form-control" name = "password" id = "password" placeholder = "E.g. *******" <?php echo $image_required;
?>>
</div>
<div class = "col-md-6 p-3">
<label for = "image">Image</label>
<input type = "hidden" name = "old_image" value = "<?php echo $image;?>">
<input type = "file" accept = "image/*" name = "image" id = "image" class = "form-control" <?php echo $image_required;
?>>
</div>
<div class = "col-md-6 p-3">
<label for = "role">Role</label>
<select class = "form-control" name = "role" id = "role" required>
<?php
if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
    if ( $role == '1' ) {
        echo "<option selected value='1'>Admin</option>";
    } else {
        echo "<option selected value='0'>Editor</option>";
    }
} else {
    ?>
    <option selected hidden disabled>Select Role</option>
    <option value = "1">Admin</option>
    <option value = "0">Editor</option>
    <?php
}
?>
</select>
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

                                            <div class="col-md-2 px-2"> <a href="./managers" class="btn btn-info btn-block btn-lg text-uppercase">View</a>
                                            </div>
                                        </div>
                                    </div>
<div class = "clearfix"></div>
</form>
</div>
</div>
</div>
<?php
if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
    ?>
    <div class = "col-md-4">
    <div class = "card card-profile">
    <div class = "card-avatar">
    <a href = "javascript:;">
    <img class = "img" src = "../media/managers/<?php if(!empty($_SESSION["ADMIN_IMAGE"])){echo $_SESSION["ADMIN_IMAGE"];}else{ echo "user-image.png";}?>">
    </a>
    </div>
    <div class = "card-body">
    <h4 class = "card-title font-weight-bold">
    <?php if ( $role == "1" ) {
        echo 'Admin';
    } else {
        echo 'Editor';
    }
    ?></h4>
    <h6 class = "card-category text-gray"><?php echo $name;
    ?></h6>
    <h6 class = "card-category text-gray"><?php echo $email;
    ?></h6>
    <h6 class = "card-category text-gray"><?php echo $password;
    ?></h6>
    </div>
    </div>
    </div>
    <?php
} else {
    ?>
    <div class = "col-md-4">
    <div class = "card card-profile">
    <div class = "card-avatar">
    <a href = "javascript:;">
    <img class = "img" src = "../media/managers/<?php if(!empty($image)){echo $image;}else{ echo "user-image.png";}?>">
    </a>
    </div>
    <div class = "card-body">
    <h4 class = "card-title font-weight-bold"><?php if ( $_SESSION["ADMIN_ROLE"] == "1" ) {
        echo 'Admin';
    } else {
        echo 'Editor';
    }
    ;
    ?></h4>
    <h6 class = "card-category text-gray"><?php echo $_SESSION["ADMIN_USERNAME"];
    ?></h6>
    <h6 class = "card-category text-gray"><?php echo $_SESSION["ADMIN_EMAIL"];
    ?></h6>
    <h6 class = "card-category text-gray"><?php echo $_SESSION["ADMIN_PASSWORD"];
    ?></h6>
    </div>
    </div>
    </div>
    <?php
}
?>
</div>
</div>
</div>
</div>
</div>
<?php
require( "../inc/footer-dashboard.php" );
?>
