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
<div class = "container-fluid px-0">
<div class = "col-12 px-0">
<div class = "card">
<div class = "card-header card-header-primary">
<h3 class = "card-title float-left text-uppercase font-weight-bold">Products</h3>
<a href = "manage-products" class = "card-title float-right btn btn-primary">Add Product</a>
</div>
<div class = "card-body table-responsive">
<?php
if(mysqli_num_rows($res)>0){
?>
<table class = "table table-hover text-center text-capitalize">
<thead class = "text-primary">
<th>#sr</th>
<th>Id</th>
<th>Categories</th>
<th>Sub Categories</th>
<th>Name</th>
<th>Image</th>
<th>Qty</th>
<th>Color</th>
<th>Size</th>
<th>Description</th>
<th>Short Desc</th>
<th>Best Seller</th>
<th>Label</th>
<th>Shipping</th>
<th>Tax</th>
<th>Rating</th>
<th>Status</th>
<th>Action</th>
</thead>
<tbody>
<?php
    while($row = mysqli_fetch_array($res)){
        $resProductAttr = mysqli_query($con,"SELECT `product_attributes`.*, `colors`.`color`,`size`.`size`FROM `product_attributes` LEFT JOIN `colors` ON `product_attributes`.`color_id`=`colors`.`id` AND `colors`.`status`='1' LEFT JOIN `size` ON `product_attributes`.`size_id`=`size`.`id` AND `size`.`status`='1' WHERE  `product_attributes`.`product_id`='".$row["id"]."'");
        $productAttr = [];
        $colorArr = [];
        $sizeArr = [];
        $qty = 0;
        if(mysqli_num_rows($resProductAttr)>0){
            while($rowProductAttr = mysqli_fetch_assoc($resProductAttr)){
                $productAttr[] = $rowProductAttr;
                $colorArr[$rowProductAttr['color_id']][] = $rowProductAttr['color'];
                $sizeArr[$rowProductAttr['size_id']][] = $rowProductAttr['size'];
                $qty += $rowProductAttr["qty"];
                $price = $rowProductAttr["price"];
                $mrp = $rowProductAttr["mrp"];
            }
         
        }
?>
        <tr>
        <td><?php echo $serial;
        ?></td>
        <td><?php echo $row["id"];
        ?></td>
        <td title="<?php echo $row["categories"]; ?>" rel="tooltip"><span class = "  text-truncate btn-tooltip" tab-index="0"
        style = "max-width: 150px;"><?php echo $row["categories"];
        ?></span></td>
        <td title="<?php echo $row["sub_categories"]; ?>" rel="tooltip"><span class = "  text-truncate btn-tooltip" tab-index="0"
        style = "max-width: 150px;"><?php echo $row["sub_categories"];
        ?></span>
        </td>
        <td title="<?php echo $row["name"]; ?>" rel="tooltip"><span class = "  text-truncate btn-tooltip" tab-index="0"
        style = "max-width: 150px;"><?php echo str_replace( "-", " ", $row["name"] );
        ?></span>
        </td>
        <td><img src = "../media/product/<?php echo $row["image"]; ?>"
        alt = "<?php echo $row["image"]; ?>" title = "<?php echo $row["image"]; ?>"
        rel = "tooltip" style = "height: 60px; width:80px;"></td>      
        <td class = "  text-truncate btn-tooltip" tab-index="0"
        style = "max-width: 150px;">
     <?php echo $qty?>
        
        </td>
        <td class = "  text-truncate btn-tooltip" tab-index="0"
        style = "max-width: 150px;">
        <?php 
                    foreach($colorArr as $key=>$val){
                        if($val[0]==""){
                            echo "Nil";
                        }else{
                        echo "<a href='javascript:void(0);' style='background-color:".$val[0].";width: 10px;
                        height: 10px;' class='d-inline-block ml-1 color_border rounded-circle'></a>";
                        }
                    }
                    ?>
        
        </td>
        <td class = "  text-truncate btn-tooltip" tab-index="0"
        style = "max-width: 150px;">
        <?php 
                    foreach($sizeArr as $key=>$val){
                        if($val[0]==""){
                            echo "Nil";
                        }else{
                        echo "<a href='javascript:void(0);' class='d-inline-block ml-1'>".$val[0]."</a>";
                        }
                    }
                    ?>
        
        </td>
          <td title="<?php echo $row["description"]; ?>" rel="tooltip"><span class = "  text-truncate btn-tooltip d-inline-block" tab-index="0"
        style = "max-width: 100px;"><?php echo str_replace( "-", " ", $row["description"] );
        ?></span>
        </td>
          <td title="<?php echo $row["short_desc"]; ?>" rel="tooltip"><span class = "  text-truncate btn-tooltip d-inline-block" tab-index="0"
        style = "max-width: 100px;"><?php echo str_replace( "-", " ", $row["short_desc"] );
        ?></span>
        </td>
 
        <td><?php if ( $row["best_seller"] == 1 ) {
            echo "Yes";
        } else {
            echo "No";
        }
        ?>
        </td>
        <td><?php echo $row["label"];?></td>
        <td><?php if($row["shipping"]!=""){echo  "$".$row["shipping"];}else{echo "None";};?></td>
        <td><?php if($row["tax"]!=""){echo  $row["tax"]."%";}else{echo "None";};?></td>
        <td><?php if($row["rating"]!=""){echo  $row["rating"]." Star";}else{echo "None";};?></td>
        <td class = "text-truncate btn-tooltip" tab-index="0" style = "max-width: 150px;" rel='tooltip' title='Product Activity'><?php if ( $row["status"] == 1 ) {
            echo "<a href='?type=status&operation=deactive&id=" . $row['id'] . "'  class='btn btn-info btn-sm text-white'>Active</a>";
        } else {
            echo "<a href='?type=status&operation=active&id=" . $row['id'] . "' class='btn btn-warning btn-sm text-white'>Deactive</a>";
        }
        ?></td>
        <td class = "  text-truncate btn-tooltip" tab-index="0"
        style = "max-width: 150px;">
        <a href = "manage-products?id=<?php echo $row['id'] ?>"
        class = "btn btn-success btn-sm text-white" rel = "tooltip" title = "Edit"><i
        class = "material-icons">create</i></a>


        <?php if (isset($_SESSION["ADMIN_ROLE"]) && $_SESSION["ADMIN_ROLE"] == "1") {
                    ?>
        <a href = "?type=delete&id=<?php echo $row['id'] ?>"
        class = "text-white btn btn-danger btn-sm del btn-tooltip" id="btn_delete" tab-index="0" rel = "tooltip"
        title = "Delete"><i class = "material-icons">close</i></a>
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