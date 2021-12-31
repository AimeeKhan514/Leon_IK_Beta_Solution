<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );
require_once("../inc/tables.php");
//CHECK FOR URL CHANGING AND GETTING ID FROM URL
$image = '';
$title = '';
$tag = '';
$required = "required";
$msg = '';
$add = "Add";
$update = "Update";
if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
    $required = "";
    $id = getSaveValue( $con, $_GET["id"] );
    $res = mysqli_query( $con, "SELECT * FROM `$table` WHERE `id`='$id'" );
    if ( mysqli_num_rows( $res ) > 0 ) {
        $row = mysqli_fetch_assoc( $res );
        $title = $row["title"];
        $tag = $row["tag"];
        $image = $row["image"];
    } else {
        $_SESSION["msg"] = '<div class="alert alert-warning msg" role="alert">
        <strong>Warning!</strong> Not Exist</div>';
        die();
    }
}
//CHECK FOR URL CHANGING ENDS
//DATA INSERT AND UPDATE CATEGORIES
if ( isset( $_POST["submit"] ) ) {
    $title = getSaveValue( $con, $_POST["title"] );
    $tag = getSaveValue( $con, $_POST["tag"] );
    if ( empty( $_FILES["image"]["name"] ) ) {
        $image = $_POST["old_image"];
    } else {
         unlink('../assets/media/projects/' . $image);
        $image = $_FILES["image"]["name"];
        $image = rand( 111111111, 999999999 ) . "_" . $image;
        move_uploaded_file( $_FILES["image"]["tmp_name"], '../assets/media/projects/' . $image );
    }

    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT END
    //IF URL HAVE THE ID FOR UPDATE DATA
    if ( isset( $_GET["id"] ) && $_GET["id"] != "") {
        mysqli_query( $con, "UPDATE `$table` SET `title`='$title',`tag`='$tag',`image`='$image' WHERE `id`='$id'" );
        $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
        <strong>Success!</strong> Updated.</div>';
    } else {
        //IF URL NOT HAVE THE ID THEN INSERT DATA
        mysqli_query( $con, "INSERT INTO `$table` (`title`,`image`,`tag`,`status`) VALUES ('$title','$image','$tag','1')" );
        $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
            <strong>Success!</strong> Added.</div>';
    }
    header( "location:projects" );
    die();
}
?>
<div class="wrapper">
    <?php require( "../inc/sidebar.php" );
?>
    <div class="main-panel">
        <?php require( "../inc/top-navbar.php" );
?>
        <div class="content">
            <?php echo $msg;
?>
            <div class="container-fluid px-0">
                <div class="col-12 px-0">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title text-uppercase font-weight-bold"><?php if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
    echo $update;
} else {
    echo $add;
}
?> projects</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 p-3">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" value="<?php echo $title; ?>"
                                            class="form-control" placeholder="Smart Paint Switch" autofocus>
                                    </div>
                                    <div class="col-md-6 p-3">
                                        <label for="tag">Tag</label>
                                        <input type="text" id="tag" name="tag" value="<?php echo $tag; ?>"
                                            class="form-control" placeholder="Case Study">
                                    </div>
                                    <div class="col-md-6 p-3">
                                        <label for="image">Image</label>
                                        <input type="hidden" name="old_image" value="<?php echo $image; ?>">
                                        <input type="file" accept="image/*" name="image" id="image" class="form-control" <?php echo $required;?>>
                                    </div>
                                </div>
                        </div>
                        <div class="col-12 p-3">
                            <div class="row">
                                <div class="col-md-2 px-2">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg  text-uppercase"
                                        name="submit"><?php if (isset($_GET["id"]) && $_GET["id"] != "") {
                                                                                                                                                    echo $update;
                                                                                                                                                } else {
                                                                                                                                                    echo $add;
                                                                                                                                                } ?></button>
                                </div>

                                <div class="col-md-2 px-2"> <a href="./projects"
                                        class="btn btn-info btn-block btn-lg text-uppercase">View</a>
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