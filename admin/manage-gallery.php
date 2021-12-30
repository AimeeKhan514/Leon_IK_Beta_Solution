<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );
require_once("../inc/tables.php");
//CHECK FOR URL CHANGING AND GETTING ID FROM URL
$image = '';
$title = '';
$tagline = '';
$slogan = '';
$pagelink = '';
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
        $tagline = $row["tagline"];
        $title = $row["title"];
        $image = $row["image"];
        $slogan = $row["slogan"];
        $pagelink = $row["pagelink"];
    } else {
        $_SESSION["msg"] = '<div class="alert alert-warning msg" role="alert">
        <strong>Warning!</strong> Not Exist</div>';
        header( "location:gallery" );
        die();
    }
}
//CHECK FOR URL CHANGING ENDS
//DATA INSERT AND UPDATE CATEGORIES
if ( isset( $_POST["submit"] ) ) {
    $title = get_safe_value( $con, $_POST["title"] );
    $tagline = get_safe_value( $con, $_POST["tagline"] );
    $slogan = get_safe_value( $con, $_POST["slogan"] );
    $pagelink = get_safe_value( $con, $_POST["pagelink"] );
    if ( empty( $_FILES["image"]["name"] ) ) {
        $image = $_POST["old_image"];
    } else {
        unlink('../media/gallery/' . $image);
        $image = $_FILES["image"]["name"];
        $image = rand( 111111111, 999999999 ) . "_" . $image;
        move_uploaded_file( $_FILES["image"]["tmp_name"], '../media/gallery/' . $image );
    }
    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT END
    //IF URL HAVE THE ID FOR UPDATE DATA
    if ( isset( $_GET["id"] ) && $_GET["id"] != "" ) {
        mysqli_query( $con, "UPDATE `$table` SET `title`='$title',`tagline`='$tagline',`image`='$image',`slogan`='$slogan', `pagelink`='$pagelink' WHERE `id`='$id'" );
        $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
        <strong>Success!</strong> Updated.</div>';
    } else {
        //IF URL NOT HAVE THE ID THEN INSERT DATA
        mysqli_query( $con, "INSERT INTO `$table` (`title`,`image`,`tagline`,`slogan`,`pagelink`,`status`) VALUES ('$title','$image','$tagline','$slogan','$pagelink','1')" );
        $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
        <strong>Success!</strong> Added.</div>';
    }
    header( "location:gallery");
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
?> Gallery</h3>
</div>
<div class = "card-body">
<form action = "" method = "post" enctype = "multipart/form-data">
<div class = "row">
<div class = "col-md-12 p-3">
<label for = "pagelink">Page Link</label>
<input type = "url" id = "pagelink" name = "pagelink"
value = "<?php echo $pagelink; ?>" class = "form-control"
placeholder = "https://kingdomstylesboutique.com/new-styles"  autofocus>
</div>
<div class = "col-md-6 p-3">
<label for = "title">Main Title</label>
<input type = "text" id = "title" name = "title"
value = "<?php echo $title; ?>" class = "form-control"
placeholder = "Title">
</div>
<div class = "col-md-6 p-3">
<label for = "image">Image</label>
<input type = "hidden" name = "old_image" value = "<?php echo $image; ?>">
<input type = "file" accept = "image/*" name = "image" id = "image" class = "form-control"
<?php echo $image_required;
?>>
</div>
<div class = "col-md-6 p-3">
<label for = "Tagline">Top Tagline</label>
<input type = "text" id = "Tagline" name = "tagline"
value = "<?php echo $tagline; ?>" class = "form-control"
placeholder = "Tag line">
</div>

<div class = "col-md-6 p-3">
<label for = "slogan">Bottom Tagline</label>
<input type = "text" id = "slogan" name = "slogan"
value = "<?php echo $slogan; ?>" class = "form-control"
placeholder = "Slogan">
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

                                            <div class="col-md-2 px-2"> <a href="./gallery" class="btn btn-info btn-block btn-lg text-uppercase">View</a>
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