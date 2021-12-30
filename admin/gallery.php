<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );
require( "../inc/getData.php" );
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
if ( isset( $msg ) ) {
    echo $msg;
}
$res = mysqli_query($con,$sql);
?>
<div class = "container-fluid px-0">
<div class = "col-12 px-0">
<div class = "card">
<div class = "card-header card-header-primary">
<h3 class = "card-title float-left text-uppercase font-weight-bold">Gallery
</h3>
<a href = "manage-gallery" class = "card-title float-right btn btn-primary">Add
Gallery
</a>
</div>
<div class = "card-body table-responsive">
<?php
if(mysqli_num_rows($res)>0){
?>
<table class = "table table-hover text-center text-capitalize">
<thead class = "text-primary">
<th>#sr</th>
<th>Id</th>
<th>Top Tagline</th>
<th>Title</th>
<th>Bottom Tagline</th>
<th>Page Link</th>
<th>Image</th>
<th>Status</th>
<th>Action</th>
</thead>
<tbody>
<?php
    while($row = mysqli_fetch_array($res)){
?>
        <tr>
        <td><?php echo $serial;?></td>
        <td><?php echo $row["id"];?></td>
        <td title = "<?php if($row["tagline"]!=""){ echo $row["tagline"];}else{ echo "Empty";}?>" rel = "tooltip"><?php if($row["tagline"]!=""){ echo $row["tagline"];}else{ echo "Empty";}?></td>
        <td title = "<?php if($row["title"]!=""){ echo $row["title"];}else{ echo "Empty";}?>" rel = "tooltip"><?php if($row["title"]!=""){ echo $row["title"];}else{ echo "Empty";}?></td>
         <td title = "<?php if($row["slogan"]==""){echo "Not Set";}else{ echo $row["slogan"];} ?>" rel = "tooltip"><?php if($row["slogan"]==""){echo "Empty..!";}else{ echo $row["slogan"];} ?></td>
         
         <td title = "<?php if($row["pagelink"]==""){echo "Not Set";}else{ echo $row["pagelink"];} ?>" rel = "tooltip"><a href="<?php if($row["pagelink"]==""){echo "javascript:void(0);";}else{ echo $row["pagelink"];} ?>" target="_blank"class="text-decoration-none"><?php if($row["pagelink"]==""){echo "Not Set";}else{ echo $row["pagelink"];} ?></a></td>
         
        <td><img src = "../media/gallery/<?php echo $row["image"]; ?>"
        alt = "<?php echo $row["image"]; ?>" title = "<?php echo $row["image"]; ?>"
        rel = "tooltip" style = "height: 60px; width:80px;"></td>
        <td><?php if ( $row["status"] == 1 ) {
            echo "<a href='?type=status&operation=deactive&id=" . $row['id'] . "'  class='btn btn-info btn-sm text-white btn-tooltip' tab-index='0' rel='tooltip' title='Click To Deactivate'>Active</a>";
        } else {
            echo "<a href='?type=status&operation=active&id=" . $row['id'] . "' class='btn btn-warning btn-sm text-white btn-tooltip' tab-index='0' rel='tooltip' title='Click To Activate'>Deactive</a>";
        }
        ?></td>
        <td>
        <a href = "manage-gallery?id=<?php echo $row['id'] ?>"
        class = "btn btn-success btn-sm text-white btn-tooltip" tab-index="0" rel = "tooltip" title = "Edit"><i
        class = "material-icons">create</i></a>

       <?php if (isset($_SESSION["ADMIN_ROLE"]) && $_SESSION["ADMIN_ROLE"] == "1") {
                    ?>
        <a href = "?type=delete&id=<?php echo $row['id'] ?>"
        class = "text-white btn btn-danger btn-sm del btn-tooltip" tab-index="0" rel = "tooltip"
        title = "Delete" id="btn_delete"><i class = "material-icons">close</i></a>
        <?php }?>

        </td>
        </tr>
        <?php
        $serial++;
    }

?>
</tbody>
</table>
</div>
<?php 
require_once("../inc/pagination.php");
}else{
    echo '  <div class="btn btn-lg w-100 btn-primary bg-gradient-primary text-white">
    <strong>SORRY! </strong> No Data Found </div>';
}
 ?>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
require( "../inc/footer-dashboard.php" );
?>