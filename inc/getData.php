<?php
require_once("tables.php");
/*
===================================
STATUS UPDATE ACTIVE & DEACTIVATE
===================================
*/
if(isset($_GET["type"]) && $_GET["type"]!=''){
    $type = getSaveValue($con,$_GET["type"]);

        if(isset($_GET["operation"]) && $_GET["operation"]!=""){
           $operation =  getSaveValue($con,$_GET["operation"]);
           $id = getSaveValue($con,$_GET["id"]);
           if($operation == 'active'){
               $status = 1;
               if($page_name == "users"){
                $new_status = "Unblocked";
               }else{
                $new_status = "Activated";
               }
              
           }else{
            $status = 0;
            if($page_name == "users"){
              $new_status = "Blocked";
             }else{
              $new_status = "Deactivated";
             }
           }
           $res = mysqli_query($con,"UPDATE `$table` SET `status`='$status' WHERE `id`='$id'");
           if($res){
            $msg = '<div class="alert alert-success msg" role="alert">
               <strong>Success!</strong> Status '.$new_status.' </div>';

        }else{
            $msg = '<div class="alert alert-danger  msg" role="alert">
               <strong>Warning!</strong>Error In Status Updating
           </div>';
        }
        }

/*
===================================
ADMIN ROLE
===================================
*/
if ( $type=="role") {
    if(isset($_GET["operation"]) && $_GET["operation"]!=""){
        $operation =  getSaveValue($con,$_GET["operation"]);
        $id = getSaveValue($con,$_GET["id"]);
        if($operation == 'admin'){
            $role = 1;
            $new_role = "Change To Admin";
        }else{
         $role = 0;
         $new_role = "Change To Editor";
        }
        $res = mysqli_query($con,"UPDATE `$table` SET `role`='$role' WHERE `id`='$id'");
        if($res){
         $msg = '<div class="alert alert-success msg" role="alert">
            <strong>Success!</strong> Role '.$new_role.' </div>';

     }else{
         $msg = '<div class="alert alert-danger msg" role="alert">
            <strong>Warning!</strong>Error In Role Updating
        </div>';
     }
     }
}
/*
===================================
ITEM DELETE
===================================
*/
if($type=="delete"){
    $id = getSaveValue($con,$_GET["id"]);
    $res = mysqli_query($con,"DELETE FROM `$table` WHERE `id`='$id'");
    if($res){
        $msg = '<div class="alert alert-success msg" role="alert">
        <strong>Success!</strong> Deleted</div>';
    }else{
        $msg = '<div class="alert alert-danger msg" role="alert">
        <strong>Error!</strong> Error In Deletion</div>';
    }
}


}


/*
===================================
SELECT RECORD WITH PAGINATION
===================================
*/

$Show_record_per_page = 25;
if($page_name == "unique-visitors"){
  $Show_record_per_page = 50;
}
if($page_name == "subscriptions"){
  $Show_record_per_page = 10;
}
$page_start = 0;
$serial = 1;
if($table=='orders' && $page_name=="orders"){
  $sql = " SELECT `$table`.*, `orders_status`.`name` as `order_status_str` FROM `$table`,`orders_status` WHERE `orders_status`.`id`=`$table`.`order_status` ORDER BY `$table`.`id` DESC ";
}
elseif($table=="product" && $page_name == "products"){
   $sql = " SELECT `$table`.*,`categories`.`categories`,`sub_categories`.`sub_categories` FROM `$table`,`categories`,`sub_categories` WHERE `$table`.`categories_id`=`categories`.`id` AND `$table`.`sub_categories_id`= `sub_categories`.`id` ORDER BY `$table`.`id` DESC ";
}
elseif($table=="sub_categories" && $page_name == "sub-categories"){
   $sql = " SELECT `$table`.*,`categories`.`categories` FROM `$table`,`categories` WHERE `$table`.`categories_id`=`categories`.`id` ORDER BY `$table`.`id` DESC ";
}else{
   $sql = " SELECT * FROM  $table ";
}

$total_record = mysqli_num_rows(mysqli_query($con,$sql));
$pagination = ceil($total_record/$Show_record_per_page);

if(isset($_GET["p"]) && $_GET["p"]!=""){
$current_page = $_GET["p"];
    $page_start = $_GET["p"];
    $page_start--;
   $page_start = $page_start * $Show_record_per_page;
   if($page_start==0){
    $serial = 1;
   }else{
    $serial = $page_start;
    $serial++;
   }

}
if(!isset($_GET["p"]) && $table=='product'){

  $sql = " SELECT `$table`.*,`categories`.`categories`,`sub_categories`.`sub_categories` FROM `$table`,`categories`,`sub_categories` WHERE `$table`.`categories_id`=`categories`.`id` AND `$table`.`sub_categories_id`= `sub_categories`.`id` ORDER BY `$table`.`id` DESC LIMIT $Show_record_per_page ";
}
elseif(!isset($_GET["p"]) && $table=='sub_categories'){

  $sql = " SELECT `$table`.*,`categories`.`categories` FROM `$table`,`categories` WHERE `$table`.`categories_id`=`categories`.`id` ORDER BY `$table`.`id` DESC LIMIT $Show_record_per_page";
}
elseif(!isset($_GET["p"]) && $table=='orders'){
    $sql = "SELECT `orders`.*, `orders_status`.`name` as `order_status_str` FROM `orders`,`orders_status` WHERE`orders_status`.`id`=`orders`.`order_status` ORDER BY `orders`.`id` DESC LIMIT $page_start ,$Show_record_per_page";
 }
elseif(isset($_GET["p"]) && $table=='orders'){
  $sql = "SELECT `orders`.*, `orders_status`.`name` as `order_status_str` FROM `orders`,`orders_status` WHERE`orders_status`.`id`=`orders`.`order_status` ORDER BY `orders`.`id` DESC LIMIT $page_start ,$Show_record_per_page";
}
elseif(isset($_GET["p"]) && $table=='product'){
  $sql = " SELECT `$table`.*,`categories`.`categories`,`sub_categories`.`sub_categories` FROM `$table`,`categories`,`sub_categories` WHERE `$table`.`categories_id`=`categories`.`id` AND `$table`.`sub_categories_id`= `sub_categories`.`id` ORDER BY `$table`.`id` DESC LIMIT $page_start ,$Show_record_per_page";
}
elseif(isset($_GET["p"]) && $table=='sub_categories'){
  $sql = " SELECT `$table`.*,`categories`.`categories` FROM `$table`,`categories` WHERE `$table`.`categories_id`=`categories`.`id` ORDER BY `$table`.`id` DESC LIMIT $page_start ,$Show_record_per_page";
}
// elseif(!isset($_GET["p"]) && $table!='orders' && $table!='product' && $table!='sub_categories'){
//     $serial = 1;
//   $sql = "SELECT * FROM $table ORDER BY id desc LIMIT $Show_record_per_page";
// }
else{
  $sql = "SELECT * FROM `$table` ORDER BY `id` desc LIMIT $page_start ,$Show_record_per_page";
}

?>
