<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );
require_once("../inc/tables.php");
//CHECK FOR URL CHANGING AND GETTING ID FROM URL
$image = '';
$title = '';
$tagline = '';
$link = '';
$linktitle = '';
$image_required = "required";
$msg = '';
$add = "Add";
$update = "Update";
if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
    $image_required = "";
    $id = get_safe_value( $con, $_GET["id"] );
    $res = mysqli_query( $con, "SELECT * FROM `$table` WHERE `id`='$id'" );
    if ( mysqli_num_rows( $res ) > 0 ) {
        $row = mysqli_fetch_assoc( $res );
        $title = $row["title"];
        $tagline = $row["tagline"];
        $image = $row["image"];
        $link = $row["link"];
        $linktitle = $row["linktitle"];
    } else {
        $_SESSION["msg"] = '<div class="alert alert-warning msg" role="alert">
        <strong>Warning!</strong> Not Exist</div>';
        die();
    }
}
//CHECK FOR URL CHANGING ENDS
//DATA INSERT AND UPDATE CATEGORIES
if ( isset( $_POST["submit"] ) ) {
    $title = get_safe_value( $con, $_POST["title"] );
    $tagline = get_safe_value( $con, $_POST["tagline"] );
    $link = get_safe_value( $con, $_POST["link"] );
    $linktitle = get_safe_value( $con, $_POST["linktitle"] );
    if ( empty( $_FILES["image"]["name"] ) ) {
        $image = $_POST["old_image"];
    } else {
         unlink('../media/slider/' . $image);
        $image = $_FILES["image"]["name"];
        $image = rand( 111111111, 999999999 ) . "_" . $image;
        move_uploaded_file( $_FILES["image"]["tmp_name"], '../media/slider/' . $image );
    }

    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT END
    //IF URL HAVE THE ID FOR UPDATE DATA
    if ( isset( $_GET["id"] ) && $_GET["id"] != "") {
        mysqli_query( $con, "UPDATE `$table` SET `title`='$title',`tagline`='$tagline',`image`='$image',`link`='$link',`linktitle`='$linktitle' WHERE `id`='$id'" );
        $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
        <strong>Success!</strong> Updated.</div>';
    } else {
        //IF URL NOT HAVE THE ID THEN INSERT DATA
        mysqli_query( $con, "INSERT INTO `$table` (`title`,`image`,`tagline`,`link`,`linktitle`,`status`) VALUES ('$title','$image','$tagline','$link','$linktitle','1')" );
        $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
            <strong>Success!</strong> Added.</div>';
    }
    header( "location:slider" );
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
?> Slider</h3>
</div>
<div class = "card-body">
<form action = "" method = "post" enctype = "multipart/form-data">
<div class = "row">
<div class = "col-md-6 p-3">
<label for = "title">Title</label>
<input type = "text" id = "title" name = "title"
value = "<?php echo $title; ?>" class = "form-control"
placeholder = "Slider Title"  autofocus>
</div>
<div class = "col-md-6 p-3">
<label for = "image">Slider Image</label>
<input type = "hidden" name = "old_image" value = "<?php echo $image; ?>">
<input type = "file" accept = "image/*" name = "image" id = "image" class = "form-control"
<?php echo $image_required;
?>>
</div>
<div class = "col-md-6 p-3">
<label for = "Tagline">Tagline</label>
<input type = "text" id = "Tagline" name = "tagline"
value = "<?php echo $tagline; ?>" class = "form-control"
placeholder = "Slider Tagline">
</div>

<div class = "col-md-6 p-3">
<label for = "link">Page URL</label>
<input type = "url" id = "link" name = "link"
value = "<?php echo $link; ?>" class = "form-control"
placeholder = "https://www.kingdomstylesboutique.com/">
</div>

<div class = "col-md-6 p-3">
<label for = "linktitle">Page Link Title</label>
<input type = "text" id = "linktitle" name = "linktitle"
value = "<?php echo $linktitle; ?>" class = "form-control"
placeholder = "Page Link Title">
</div>
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

                                            <div class="col-md-2 px-2"> <a href="./slider" class="btn btn-info btn-block btn-lg text-uppercase">View</a>
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