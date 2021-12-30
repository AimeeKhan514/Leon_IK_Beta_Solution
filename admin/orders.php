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
<h3 class = "card-title float-left text-uppercase font-weight-bold">Orders</h3>
</div>
<div class = "card-body table-responsive">
<?php
if(mysqli_num_rows($res)>0){
?>
<table class = "table table-hover text-center">
<thead class = "text-primary">
<th>#</th>
<th>ID</th>
<th>Added On</th>
<th>Payment Type</th>
<th>Payment Status</th>
<th>Order Status</th>
<th>Detail</th>
</thead>
<tbody>

<?php
    while($row = mysqli_fetch_array($res)){
?>
        <tr>
        <td><?php echo $serial;?></td>
        <td><?php echo $row["id"];?></td>
        <td rel="tooltip" title="<?php echo date('D d-M-y h:i A',strtotime($row["added_on"]));?>"><span class = "d-inline-block text-truncate"
        style = "max-width: 150px;"><?php echo date('D d-M-y',strtotime($row["added_on"]));?></span></td>
        <td><span class = "d-inline-block text-truncate text-capitalize"
        style = "max-width: 150px;"><?php echo $row["payment_type"];
        ?></span>
        </td>
        <td><?php echo $row["payment_status"];
        ?></td>
        <td><?php echo $row["order_status_str"];
        ?></td>
        <td>
        <a href = "orders-manage?id=<?php echo $row['id'];?>"
        class = "btn btn-primary btn-sm text-white" rel = "tooltip"
        title = "Detail"><i class = "material-icons">list_alt</i></a>
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