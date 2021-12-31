<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );
require( "../inc/getData.php" );
?>
<div class="wrapper">
    <?php require("../inc/sidebar.php");?>
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
            <div class="container-fluid px-0">
                <div class="col-12 px-0">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title float-left text-uppercase font-weight-bold">Users
                            </h3>
                        </div>
                        <div class="card-body  table-responsive">
                            <?php
if(mysqli_num_rows($res)>0){
?>
                            <table class="table table-hover text-center">
                                <thead class="text-primary">
                                    <th>#sr</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Country</th>
                                    <th>Position/Role</th>
                                    <th>City/Town</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Hear About Us</th>
                                    <th>Added On</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                $serial=1;
                                 while($row = mysqli_fetch_array($res)){
                                       ?>
                                    <tr>
                                        <td><?php echo $serial;?></td>
                                        <td><?php echo $row["id"];?></td>
                                        <td title="<?php if($row["name"]!=""){ echo $row["name"];}else{ echo "Empty";}?>"
                                            rel="tooltip" class="  text-truncate btn-tooltip" tab-index="0"
                                            style="max-width: 150px;">
                                            <?php if($row["name"]!=""){ echo $row["name"];}else{ echo "Empty";}?></td>

                                        <td title="<?php if($row["phone"]!=""){ echo $row["phone"];}else{ echo "Empty";}?>"
                                            rel="tooltip" class="  text-truncate btn-tooltip" tab-index="0"
                                            style="max-width: 150px;">
                                            <?php if($row["phone"]!=""){ echo $row["phone"];}else{ echo "Empty";}?></td>

                                        <td title="<?php if($row["company"]!=""){ echo $row["company"];}else{ echo "Empty";}?>"
                                            rel="tooltip" class="  text-truncate btn-tooltip" tab-index="0"
                                            style="max-width: 150px;">
                                            <?php if($row["company"]!=""){ echo $row["company"];}else{ echo "Empty";}?>
                                        </td>

                                        <td title="<?php if($row["country"]!=""){ echo $row["country"];}else{ echo "Empty";}?>"
                                            rel="tooltip" class="  text-truncate btn-tooltip" tab-index="0"
                                            style="max-width: 150px;">
                                            <?php if($row["country"]!=""){ echo $row["country"];}else{ echo "Empty";}?>
                                        </td>

                                        <td title="<?php if($row["pr"]!=""){ echo $row["pr"];}else{ echo "Empty";}?>"
                                            rel="tooltip" class="  text-truncate btn-tooltip" tab-index="0"
                                            style="max-width: 150px;">
                                            <?php if($row["pr"]!=""){ echo $row["pr"];}else{ echo "Empty";}?></td>

                                        <td title="<?php if($row["ct"]!=""){ echo $row["ct"];}else{ echo "Empty";}?>"
                                            rel="tooltip" class="  text-truncate btn-tooltip" tab-index="0"
                                            style="max-width: 150px;">
                                            <?php if($row["ct"]!=""){ echo $row["ct"];}else{ echo "Empty";}?></td>

                                        <td title="<?php if($row["email"]!=""){ echo $row["email"];}else{ echo "Empty";}?>"
                                            rel="tooltip" class="  text-truncate btn-tooltip" tab-index="0"
                                            style="max-width: 150px;">
                                            <?php if($row["email"]!=""){ echo $row["email"];}else{ echo "Empty";}?></td>


                                        <td title="<?php if($row["message"]!=""){ echo $row["message"];}else{ echo "Empty";}?>"
                                            rel="tooltip" class="  text-truncate btn-tooltip" tab-index="0"
                                            style="max-width: 150px;">
                                            <?php if($row["message"]!=""){ echo $row["message"];}else{ echo "Empty";}?>
                                        </td>

                                        <td title="<?php if($row["hear_about_us"]!=""){ echo $row["hear_about_us"];}else{ echo "Empty";}?>"
                                            rel="tooltip" class="  text-truncate btn-tooltip" tab-index="0"
                                            style="max-width: 150px;">
                                            <?php if($row["hear_about_us"]!=""){ echo $row["hear_about_us"];}else{ echo "Empty";}?>
                                        </td>
                                        <td><?php echo $row["added_on"];?></td>
                                        <td>

                                            <?php if (isset($_SESSION["ADMIN_ROLE"]) && $_SESSION["ADMIN_ROLE"] == "1") {
                    ?>
                                            <a href="?type=delete&id=<?php echo $row['id'] ?>"
                                                class="text-white btn btn-danger btn-sm del" id="btn_delete"
                                                rel="tooltip" title="Delete"><i class="material-icons">close</i></a>
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
require("../inc/footer-dashboard.php");
?>