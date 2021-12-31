<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );
require_once("../inc/tables.php");
//CHECK FOR URL CHANGING AND GETTING ID FROM URL
$image = '';
$title = '';
$rating = '';
$duration = '';
$description = '';
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
        $rating = $row["rating"];
        $duration = $row["duration"];
        $description = $row["description"];
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
    $rating = getSaveValue( $con, $_POST["rating"] );
    $duration = getSaveValue( $con, $_POST["duration"] );
    $description = getSaveValue( $con, $_POST["description"] );


    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT END
    //IF URL HAVE THE ID FOR UPDATE DATA
    if ( isset( $_GET["id"] ) && $_GET["id"] != "") {
        mysqli_query( $con, "UPDATE `$table` SET `title`='$title',`rating`='$rating',`duration`='$duration',`description`='$description' WHERE `id`='$id'" );
        $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
        <strong>Success!</strong> Updated.</div>';
    } else {
        //IF URL NOT HAVE THE ID THEN INSERT DATA
        mysqli_query( $con, "INSERT INTO `$table` (`title`,`rating`,`duration`,`description`,`status`) VALUES ('$title','$rating','$duration','$description','1')" );
        $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
            <strong>Success!</strong> Added.</div>';
    }
    header( "location:reviews" );
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
?> Reviews</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 p-3">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" value="<?php echo $title; ?>"
                                            class="form-control" placeholder="John Doe" autofocus>
                                    </div>
                                    <div class="col-md-6 p-3">
                                        <label for="rating">Rating</label>
                                        <select name="rating" id="rating" class="form-control text-capitalize pl-2">
                                                    <option selected hidden disabled>Rating</option>
                                                    <option <?php if ($rating=="0") {echo  "selected";}?> value='0'>None</option>
                                                    <option <?php if ($rating=="1") {echo  "selected";}?> value='1'>1 Star</option>
                                                    <option <?php if ($rating=="2") {echo  "selected";}?> value='2'>2 Star</option>
                                                    <option <?php if ($rating=="3") {echo  "selected";}?> value='3'>3 Star</option>
                                                    <option <?php if ($rating=="4") {echo  "selected";}?> value='4'>4 Star</option>
                                                    <option <?php if ($rating=="5") {echo  "selected";}?> value='5'>5 Star</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 p-3">
                                        <label for="duration">Duration</label>
                                        <input type="text" id="duration" name="duration" value="<?php echo $duration; ?>" class="form-control" placeholder="1 Year Ago">
                                    </div>
                                    <div class="col-md-12 p-3">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" class="form-control"
                                            placeholder="A massive thanks to Terry and the team at Beta who were able to..."><?php echo $description;?></textarea>
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

                                <div class="col-md-2 px-2"> <a href="./reviews"
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