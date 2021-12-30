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
                                    <th>Id</th>
                                    <th>User IP</th> 
                                    <th>IP Address</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Region</th>
                                    <th>Visited On</th>
                                    
                                    <?php if (isset($_SESSION["ADMIN_ROLE"]) && $_SESSION["ADMIN_ROLE"] == "1") {
                    ?>
                                    <th>Action</th>
                                    <?php
                                            }
                                    ?>
                                </thead>
                                <tbody>
                                <?php
    while($row = mysqli_fetch_array($res)){
?>
        <tr>
        <td><?php echo $serial;
        ?></td>
                                        <td><?php echo $row["id"];?></td>
                                        <td><?php echo $row["user_ip"];?></td>
                                        <td><?php echo $row["ip_address"];?></td>
                                        <td><?php echo str_replace("-"," ",$row["city"]);?></td>
                                        <td><?php echo $row["country"];?></td>
                                        <td><?php echo str_replace("-"," ",$row["region"]);?></td>
                                        <td><?php echo date('D d-M-y H:i:s A',strtotime($row["added_on"]));?></td>
                                        <td>

                                           <?php if (isset($_SESSION["ADMIN_ROLE"]) && $_SESSION["ADMIN_ROLE"] == "1") {
                    ?>
        <a href = "?type=delete&id=<?php echo $row['id'] ?>"
        class = "text-white btn btn-danger btn-sm del" rel = "tooltip"
        title = "Delete" id="btn_delete"><i class = "material-icons">close</i></a>
        <?php }else{echo "No";}?>

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
