<?php

require("../inc/top-dashboard.php");
require("logout.php");
require_once("../inc/tables.php");
//CHECK FOR URL CHANGING AND GETTING ID FROM URL
$categories_id = '';
$sub_categories_id = '';
$name = '';
$label = "";
$short_desc = '';
$description = '';
$status = '';
$image = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = '';
$msg = '';
$best_seller = '';
$rating = '';
$shipping = '';
$tax = '';
$productAttr[0]['product_id'] ='';
$productAttr[0]['color_id'] ='';
$productAttr[0]['size_id'] = '';
$productAttr[0]['mrp'] = '';
$productAttr[0]['price'] = '';
$productAttr[0]['qty'] ='';
$productAttr[0]['id'] = '';
$image_required = "required";
$add = "Add";
$update = "Update";
if (isset($_GET["id"]) && $_GET["id"] != "") {
    $image_required = "";
    $id = get_safe_value($con, $_GET["id"]);
    $res = mysqli_query($con, "SELECT * FROM `product` WHERE `id`='$id'");
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $categories_id = $row["categories_id"];
        $sub_categories_id = $row["sub_categories_id"];
        $name = $row["name"];
        $short_desc = $row["short_desc"];
        $description = $row["description"];
        $image = $row["image"];
        $meta_desc = $row["meta_desc"];
        $meta_title = $row["meta_title"];
        $meta_keyword = $row["meta_keyword"];
        $best_seller = $row["best_seller"];
        $label = $row["label"];
        $rating = $row["rating"];
        $shipping = $row["shipping"];
        $tax = $row["tax"];
        $resProductAttr = mysqli_query($con,"SELECT * FROM `product_attributes` WHERE `product_id`='$id'");
        $jj = 0;
        while($rowProductAttr = mysqli_fetch_array($resProductAttr)){
            $productAttr[$jj]['product_id'] = $rowProductAttr["product_id"];
            $productAttr[$jj]['color_id'] = $rowProductAttr["color_id"];
            $productAttr[$jj]['size_id'] = $rowProductAttr["size_id"];
            $productAttr[$jj]['mrp'] = $rowProductAttr["mrp"];
            $productAttr[$jj]['price'] = $rowProductAttr["price"];
            $productAttr[$jj]['qty'] = $rowProductAttr["qty"];
            $productAttr[$jj]['id'] = $rowProductAttr["id"];
            $jj++;
        }


        
    } else {
        $_SESSION["msg"] = '<div class="alert alert-warning msg" role="alert">
        <strong>Warning!</strong> Not Exist</div>';
        header("location:products");
        die();
    }
}


//CHECK FOR URL CHANGING ENDS
//DATA INSERT AND UPDATE CATEGORIES
if (isset($_POST["submit"])) {
    // prx($_POST);
    $categories_id = get_safe_value($con, $_POST["categories_id"]);
    $sub_categories_id = get_safe_value($con, $_POST["sub_categories_id"]);
    $name = get_safe_value($con, $_POST["name"]);
    $name = str_replace(' ', '-', $name);
    $short_desc = get_safe_value($con, $_POST["short_desc"]);
    $description = get_safe_value($con, $_POST["description"]);
    $best_seller = get_safe_value($con, $_POST["best_seller"]);
    $label = get_safe_value($con, $_POST["label"]);
    $shipping = get_safe_value($con, $_POST["shipping"]);
    $tax = get_safe_value($con, $_POST["tax"]);
    $rating = get_safe_value($con, $_POST["rating"]);
    if (empty($_FILES["image"]["name"])) {
        $image = $_POST["old_image"];
    } else {
        $image = rand(111111111, 999999999) . "_" . $_FILES["image"]["name"];
    }
    move_uploaded_file($_FILES["image"]["tmp_name"], '../media/product/' . $image);
    $meta_desc = get_safe_value($con, $_POST["meta_desc"]);
    $meta_title = get_safe_value($con, $_POST["meta_title"]);
    $meta_keyword = get_safe_value($con, $_POST["meta_keyword"]);
    $meta_keyword = str_replace(' ', ',', $meta_keyword);
  
    //FOR UPDATE DATA FETCH FROM THE DB TO SHOW BEFORE EDIT
    // if (isset($_GET["id"]) && $_GET["id"] != "") {
    //     $res = mysqli_query($con, "SELECT * FROM `product` WHERE `id`='$id'");
    //     if (mysqli_num_rows($res) > 0) {
    //         $getdata = mysqli_fetch_array($res);
    //         if ($id == $getdata["id"] && $name == $getdata["name"]) {
    //             //UPDATE DATA
    //             mysqli_query($con, "UPDATE `product` SET `categories_id`='$categories_id',`sub_categories_id`='$sub_categories_id',`name`='$name',`image`='$image',`status`='1',`short_desc`='$short_desc',`description`='$description',`meta_title`='$meta_title',`meta_desc`='$meta_desc',`meta_keyword`='$meta_keyword', `best_seller`='$best_seller',`label`='$label' WHERE `id`='$id'");
    //             $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
    //             <strong>Success!</strong> Updated.</div>';
    //             header("location:products");
    //         }
    //     } else {
    //         $msg = '<div class="alert alert-warning msg" role="alert">
    //         <strong>Warning!</strong> Already Exist.</div>';
    //     }
    // }
    // $res = mysqli_query($con, "SELECT * FROM `product` WHERE `name`='$name' AND `categories_id`='$categories_id' AND `sub_categories_id`='$sub_categories_id'");
    // if (mysqli_num_rows($res) > 0) {
    //     $msg = '<div class="alert alert-warning msg" role="alert">
    //         <strong>Warning!</strong> Already Exist.</div>';
    // } else {
        if (!isset($_GET["id"]) && $_FILES["image"]["type"] != 'image/png' && $_FILES["image"]["type"] != 'image/jpg' && $_FILES["image"]["type"] != 'image/jpeg') {
            $msg = '<div class="alert alert-warning msg" role="alert">
            <strong>Warning!</strong> Only JPG, JPEG, PNG Images.</div>';
        }
        // if ($msg == "") {
            //IF URL HAVE THE ID FOR UPADTE DATA
            if (isset($_GET["id"]) && $_GET["id"] != "") {
                mysqli_query($con, "UPDATE `product` SET `categories_id`='$categories_id',`sub_categories_id`='$sub_categories_id',`name`='$name',`image`='$image',`status`='1',`short_desc`='$short_desc',`description`='$description',`meta_title`='$meta_title',`meta_desc`='$meta_desc',`meta_keyword`='$meta_keyword',`best_seller`='$best_seller',`label`='$label',`shipping`='$shipping',`tax`='$tax',`rating`='$rating' WHERE `id`='$id'");
                $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
                <strong>Success!</strong> Updated.</div>';
              



            } else {
                //IF URL NOT HAVE THE ID THEN INSERT DATA
                mysqli_query($con, "INSERT INTO `product`(`categories_id`,`sub_categories_id`, `name`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`,`best_seller`,`label`,`shipping`,`tax`,`rating`) VALUES ('$categories_id','$sub_categories_id','$name','$image','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','1','$best_seller','$label','$shipping','$tax','$rating')");

                $_SESSION["msg"] = '<div class="alert alert-success msg" role="alert">
                <strong>Success!</strong> Added.</div>';
                //ATTRIBUTES CODE             
            }
            
            if (isset($_GET["id"]) && $_GET["id"] != "") {
                $product_last_inserted_id = $id;
            }else{
                $product_last_inserted_id = mysqli_insert_id($con);
            }
            if (isset($_POST["mrp"]) && $_POST["mrp"]!= "") {
                foreach ($_POST["mrp"] as $key => $val) {
                    $mrp = get_safe_value($con, $_POST["mrp"][$key]);
                    $price = get_safe_value($con, $_POST["price"][$key]);
                    $qty = get_safe_value($con, $_POST["qty"][$key]);
                    $color_id = get_safe_value($con, $_POST["color_id"][$key]);
                    $size_id = get_safe_value($con, $_POST["size_id"][$key]);
                    $attr_id = get_safe_value($con, $_POST["attr_id"][$key]);
                    if($attr_id>0){
                        mysqli_query($con, "UPDATE `product_attributes` SET `product_id`='$id',`color_id`='$color_id',`size_id`='$size_id',`mrp`='$mrp',`price`='$price',`qty`='$qty' WHERE `id`='$attr_id'");
                    }else{
                        mysqli_query($con, "INSERT INTO `product_attributes` (`product_id`, `color_id`, `size_id`, `mrp`, `price`, `qty`) VALUES ('$product_last_inserted_id', '$color_id', '$size_id', '$mrp', '$price', '$qty')");
                    }

                }
            } 
            header("location:products");
            die();
        // }
    // }
}
?>
<div class="wrapper">
    <?php require("../inc/sidebar.php"); ?>
    <div class="main-panel">
        <?php require("../inc/top-navbar.php"); ?>
        <div class="content">
            <?php echo $msg; ?>
            <div class="container-fluid px-0">
                <div class="col-12 px-0">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title text-uppercase font-weight-bold"><?php if (isset($_GET["id"]) && $_GET["id"] != "") {
                                                                                        echo $update;
                                                                                    } else {
                                                                                        echo $add;
                                                                                    } ?> Product</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 p-3">
                                        <label for="categories">Categories</label>
                                        <select name="categories_id" id="categories" class="form-control text-capitalize pl-2" onchange="get_sub_categories('');">
                                            <option selected disabled hidden>Select Categories </option>
                                            <?php
                                            $res = mysqli_query($con, "SELECT * FROM `categories` WHERE `status`='1' ORDER BY `id` DESC");
                                            if (mysqli_num_rows($res) > 0) {
                                                while ($row = mysqli_fetch_array($res)) {
                                                    if ($row["id"] == $categories_id) {
                                                        echo "<option selected value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                                    } else {
                                                        echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                                    }
                                                }
                                            } else {
                                                echo "<option disable hidden>Category Is Created</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 p-3">
                                        <label for="sub_categories_id">Sub Categories</label>
                                        <select name="sub_categories_id" id="sub_categories_id" class="form-control text-capitalize pl-2" required>
                                            <option selected disabled hidden>Select Sub Categories </option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 p-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" value="<?php echo  $name = str_replace('-', ' ', $name); ?>" class="form-control" placeholder="E.g. Leather Shoe" required autofocus>
                                    </div>
                                    <div class="col-md-3 p-3">
                                        <label for="shipping">Shipping</label>
                                        <input type="text" name="shipping" id="shipping" value="<?php echo  $shipping; ?>" class="form-control" placeholder="E.g. 3.99" required>
                                    </div>
                                    <div class="col-md-3 p-3">
                                        <label for="tax">Tax</label>
                                        <input type="text" name="tax" id="tax" value="<?php echo  $tax; ?>" class="form-control" placeholder="E.g. 6.50" required>
                                    </div>
                                    <div class="col-md-3 p-3">
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
                                    <div class="col-md-3 p-3">
                                        <label for="best_seller">Best Seller</label>
                                        <select name="best_seller" id="best_seller" class="form-control text-capitalize pl-2">
                                            <option <?php if (isset($best_seller) && $best_seller != "") {
                                                        echo  "selected hidden disabled";
                                                    } ?> value=''>Choose</option>";
                                            <?php
                                            if ($best_seller == 1) {
                                                echo "<option selected value='1'>Yes</option>
                                                        <option value='0'>No</option>";
                                            } elseif ($best_seller == 0) {
                                                echo "<option selected value='0'>No</option>
                                                       <option value='1'>Yes</option>";
                                            } else {
                                                echo "<option value='1'>Yes</option>
                                                      <option value='0'>No</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12" id="product_attr_box">
                                    <?php
                                    $productAttrLoop = 1;
                                    foreach($productAttr as $list){
                                    ?>
                                    <div class="row" id="attr_<?php echo $productAttrLoop;?>">
                                    <input type="hidden" name="attr_id[]" value="<?php echo $list['id']?>">
                                        <div class="col-lg-2 p-3">
                                            <label for="mrp">MRP</label>
                                            <input type="number" name="mrp[]" id="mrp" value="<?php echo $list['mrp']?>" class="form-control" placeholder="E.g. 500" required>
                                        </div>
                                        <div class="col-lg-2 p-3">
                                            <label for="price">price</label>
                                            <input type="number" name="price[]" id="price" value="<?php echo $list['price']?>" class="form-control" placeholder="E.g. 300" required>
                                        </div>
                                        <div class="col-lg-2 p-3">
                                            <label for="qty">QTY</label>
                                            <input type="number" name="qty[]" id="qty" value="<?php echo $list['qty']?>" class="form-control" placeholder="E.g. 50" required>
                                        </div>
                                        
                                        <div class="col-lg-2 p-3">
                                            <label for="color">Color</label>
                                            <select name="color_id[]" id="color" class="form-control text-capitalize">
                                                <option selected="selected" disabled hidden>Select</option>
                                                <?php
                                                $res = mysqli_query($con, "SELECT * FROM `colors` WHERE `status`='1' ORDER BY `color` ASC");
                                                if (mysqli_num_rows($res) > 0) {
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        if ($row["id"] == $list['color_id']) {
                                                            echo "<option selected value=" . $row['id'] . " style='background-color:" . $row['color'] . "'>" . $row['color'] . "</option>";
                                                        } else {
                                                            echo "<option value=" . $row['id'] . " style='background-color:" . $row['color'] . "'>" . $row['color'] . "</option>";
                                                        }
                                                    }
                                                } else {
                                                    echo "<option disable hidden>Empty.</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 p-3">
                                            <label for="size">Size</label>
                                            <select name="size_id[]" id="size" class="form-control text-capitalize">
                                                <option selected="selected" disabled hidden>Select</option>
                                                <?php
                                                $res = mysqli_query($con, "SELECT * FROM `size` WHERE `status`='1' ORDER BY `order_by` ASC");
                                                if (mysqli_num_rows($res) > 0) {
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        if ($row["id"] == $list['size_id']) {
                                                            echo "<option selected value=" . $row['id'] . ">" . $row['size'] . "</option>";
                                                        } else {
                                                            echo "<option value=" . $row['id'] . ">" . $row['size'] . "</option>";
                                                        }
                                                    }
                                                } else {
                                                    echo "<option disable hidden>Empty.</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <?php
                                        if($productAttrLoop==1){
                                            ?>
                                        <div class="col-md-2 p-3">
                                            <button type="button" class="btn btn-primary btn-block btn-lg text-uppercase" onclick="add_more_attr();">Add More</button>

                                        </div>
<?php
                                        }else{
                                            ?>
                                        <div class="col-md-2 p-3">
                                         <button type="button" class="btn btn-danger btn-block btn-lg text-uppercase" onclick="remove_attr('<?php echo $productAttrLoop;?>','<?php echo $list['id'];?>');">Remove</button>
                                         </div>

                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <?php 
                                $productAttrLoop++;
                                }?>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 p-3">
                                        <label for="image">Image</label>
                                        <input type="hidden" name="old_image" value="<?php echo $image; ?>">
                                        <input type="file" accept="image/*" name="image" id="image" class="form-control" <?php echo $image_required; ?>>
                                    </div>

                                    <div class="col-md-6 p-3">
                                        <label for="label">Label</label>
                                        <input type="text" name="label" id="label" value="<?php echo $label; ?>" class="form-control" placeholder="E.g. New Arrival">
                                    </div>
                                    <div class="col-md-6 p-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" rows="3" id="description" class="form-control" required placeholder="Please Enter Long Description"><?php echo $description; ?></textarea>
                                    </div>
                                    <div class="col-md-6 p-3">
                                        <label for="s_desc">Short Description</label>
                                        <textarea name="short_desc" rows="3" id="s_desc" class="form-control" required placeholder="Please Enter Short Description"><?php echo $short_desc; ?></textarea>
                                    </div>
                                    <div class="col-md-4 p-3">
                                        <label for="meta_title">Meta Title</label>
                                        <textarea name="meta_title" rows="3" id="meta_title" class="form-control" placeholder="Please Enter Meta Title"><?php echo $meta_title; ?></textarea>
                                    </div>
                                    <div class="col-md-4 p-3">
                                        <label for="meta_desc">Meta Description</label>
                                        <textarea name="meta_desc" rows="3" id="meta_desc" class="form-control" placeholder="Please Enter Meta Description"><?php echo $meta_desc; ?></textarea>
                                    </div>
                                    <div class="col-md-4 p-3">
                                        <label for="meta_keyword">Meta Keyword</label>
                                        <textarea name="meta_keyword" rows="3" id="meta_keyword" class="form-control" placeholder="Please Enter Meta Keyword"><?php echo  $meta_keyword = str_replace(',', ' ', $meta_keyword); ?></textarea>
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

                                            <div class="col-md-2 px-2"> <a href="./products" class="btn btn-info btn-block btn-lg text-uppercase">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                require("../inc/footer-dashboard.php");
                ?>
                <script>
                    function get_sub_categories(sub_categories_id) {
                        $categories = $("#categories").val();
                        $.ajax({
                            url: 'get-sub-categories.php',
                            type: 'POST',
                            data: 'categories=' + $categories + '&sub_categories_id=' + sub_categories_id,
                            success: function(result) {
                                $("#sub_categories_id").html(result);
                            }
                        });
                    }
                    <?php if (isset($_GET["id"]) && $_GET["id"] != "") {
                    ?>
                        get_sub_categories('<?php echo $sub_categories_id; ?>');
                    <?php
                    } ?>

                    $size_html = $("#attr_1 #size").html();
                    $size_html = $size_html.replace(/selected=""/g,'');
           
                    
                    $color_html = $("#attr_1 #color").html();
                    $color_html = $color_html.replace(/selected=""/g,'');
                
                    // console.log($size_html);
                    $attr_count = 1;

                    function add_more_attr() {
                        $attr_count++;
                        $html = '<div class="row" id="attr_' + $attr_count + '"> <div class="col-lg-2 p-3"><input type="hidden" name="attr_id[]" value=""> <label for="mrp">MRP</label> <input type="number" name="mrp[]" id="mrp" value="" class="form-control" placeholder="E.g. 500" required> </div> <div class="col-lg-2 p-3"> <label for="price">price</label> <input type="number" name="price[]" id="price" value="" class="form-control" placeholder="E.g. 300" required> </div> <div class="col-lg-2 p-3"> <label for="qty">QTY</label> <input type="number" name="qty[]" id="qty" value="" class="form-control" placeholder="E.g. 50" required> </div> <div class="col-lg-2 p-3"> <label for="color">Color</label> <select name="color_id[]" id="color" class="form-control text-capitalize">' + $color_html + ' </select> </div> <div class="col-lg-2 p-3"> <label for="size">Size</label> <select name="size_id[]" id="size" class="form-control text-capitalize">' + $size_html + '</select> </div> <div class="col-md-2 p-3"> <button type="button" class="btn btn-danger btn-block btn-lg text-uppercase" onclick="remove_attr(' + $attr_count + ');">Remove</button> </div> </div> ';
                        $("#product_attr_box").append($html);
                    }

                    function remove_attr($attr_count, $remove_id) {
                      
                        $.ajax({
                            url:"removeAttrDb.php",
                            method:'post',
                            data:'id='+$remove_id,
                            success:function(result){
                                $("#attr_" + $attr_count).remove();
                            }
                        })
                    }
                </script>