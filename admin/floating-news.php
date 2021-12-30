<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );
require( "../inc/getData.php" );
?>
<div class="wrapper">
    <?php require("../inc/sidebar.php"); ?>
    <div class="main-panel">
        <?php require("../inc/top-navbar.php"); ?>
        <div class="content">

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
<!-- <div class="col-md-12 d-flex justify-content-end">
    <form class="form-row" action="" method="post">
        <div class="col-9 form-group  bmd-form-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            </div>
            <div class="col-3">
             <button type="submit" class="btn btn-white btn-raised btn-fab btn-round" name="btn-search">
                    <i class="material-icons">search</i>
                  </button>
            </div>
         </form>
</div> -->
            <div class="container-fluid px-0">
                <div class="col-12 px-0">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title float-left text-uppercase font-weight-bold">floating news
                            </h3>
                            <a href="manage-floating-news" class="card-title float-right btn btn-primary">Add floating news
                            </a>
                        </div>
                        <div class="card-body  table-responsive">
                        <?php
if(mysqli_num_rows($res)>0){
?>
                            <table class="table table-hover text-center">
                                <thead class="text-primary">
                                    <th>#sr</th>
                                    <th>Id</th>
                                    <th>Floating News</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php
    while($row = mysqli_fetch_array($res)){
?>
                                    <tr>
                                    <td><?php echo $serial;?></td>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td title="<?php echo $row["floating_news"];?>" rel="tooltip"><span class="d-inline-block text-truncate" style="max-width: 150px;"><?php echo $row["floating_news"];?></span></td>
                                        <td><?php if ($row["status"] == 1) {
                                                        echo "<a href='?type=status&operation=deactive&id=" . $row['id'] . "'  class='btn btn-info btn-sm text-white' rel='tooltip' title='Click To Deactivate'>Active</a>";
                                                    } else {
                                                        echo "<a href='?type=status&operation=active&id=" . $row['id'] . "' class='btn btn-warning btn-sm text-white' rel='tooltip' title='Click To Activate'>Deactive</a>";
                                                    } ?></td>
                                        <td>
                                            <a href="manage-floating-news?id=<?php echo $row['id'] ?>" class="btn btn-success btn-sm text-white" rel="tooltip" title="Edit"><i class="material-icons">create</i></a>
                                            
                                           <?php if (isset($_SESSION["ADMIN_ROLE"]) && $_SESSION["ADMIN_ROLE"] == "1") {
                    ?>
        <a href = "?type=delete&id=<?php echo $row['id'] ?>"
        class = "text-white btn btn-danger btn-sm del" id="btn_delete" rel = "tooltip" title = "Delete"><i class = "material-icons">close</i></a>   <?php }?>
                                        </td>
                                    </tr>
                                    <?php
        $serial++;
    }

?>
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
    <?php
    require("../inc/footer-dashboard.php");
    ?>
