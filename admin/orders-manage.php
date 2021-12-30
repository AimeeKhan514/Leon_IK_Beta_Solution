<?php
require("../inc/top-dashboard.php");
require("logout.php");

if (isset($_GET["id"]) &&  $_GET["id"] != '') {

    $order_id = get_safe_value($con, $_GET["id"]);
    if (isset($_POST["btn_update_order_status"])) {
        $update_order_status = get_safe_value($con, $_POST["update_order_status"]);
        $update = mysqli_query($con, "UPDATE `orders` SET `order_status`='$update_order_status' WHERE `id`='$order_id'");
        $res =  mysqli_query($con, "SELECT `name` FROM `orders_status` WHERE `id`='$update_order_status'");
        $order_status_name = mysqli_fetch_array($res);
        if ($update) {

            $res = mysqli_query($con, "SELECT DISTINCT(`orders_details`.`id`), `orders_details`.*,`orders_details`.`qty` as `order_qty`,`orders`.`user_id` as `uid`,`orders`.`name` as `username`,`orders`.`email` as `useremail`,`orders`.`address1`,`orders`.`address2`,`orders`.`phone`,`orders`.`pin_code`,`orders`.`city`,`orders`.`state`,`orders`.`town`,`orders`.`total_price`,`orders`.`order_status`,`orders`.`added_on`,`orders`.`payment_status`,`orders`.`payment_type`,`product`.`name`,`product`.`image`, `orders_details`.`qty` as `orders_qty` FROM `product`,`orders_details`,`orders` WHERE `orders_details`.`order_id`='$order_id' AND `orders`.`id`='$order_id' AND `product`.id=`orders_details`.`product_id`");
            $row = mysqli_fetch_array($res);

            $to = $row["useremail"];


            $from = "Order Status Updated";
            $headers = "";
            $headers .= "From: Kingdom Styles <info@kingdomstylesboutique.com> \r\n";
            $headers .= "Reply-To: info@kingdomstylesboutique.com \r\n" . "X-Mailer: PHP/" . phpversion();
            $headers .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers.= "X-Priority: 1\r\n";
            $subject = "Status Has Been Updated For Your Placed Order ID #" . $order_id . "\r\n";
            $subject2 = "Status Has Been Updated For Your Placed Order ID #" . $order_id . "\r\n The New Status Is Now " . $order_status_name["name"];
            $message = '
            <html><table border="0" style="text-align:center;">

        <tr>
            <th colspan="2" style="width: 100%; border-bottom: 4px solid #FF00FF;border-top: 4px solid #FF00FF;">
<img src="https://kingdomstylesboutique.com/img/logo.png" width="100px" height="100px" alt="">

            </th>
        </tr>


<tr> <th colspan="2" style="padding:10px 20px; ">' . $subject . '</th> </tr>
<tr> <th colspan="2" style="padding:10px 20px; ">Your Order Is ' . $order_status_name["name"] . '</th> </tr>


  <tr><th colspan="2" style="padding:10px 20px; border-bottom: 4px solid #FF00FF;">USER DETAILS</th></tr>
  <tr>
  <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">Id</th>
  <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;"> ' . $row["uid"] . '</td>
  </tr>
  <tr>
  <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">Name</th>
  <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;"> ' . $row["username"]  . '</td>
  </tr>
  <tr>
  <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">Email</th>
  <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;"> ' . $row["useremail"]  . '</td>
  </tr>

  <tr><th colspan="2" style="padding:10px 20px; border-bottom: 4px solid #FF00FF;">ORDER DETAILS</th></tr>
  <tr>
  <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">Order Id</th>
  <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;"> ' . $order_id . '</td>
  </tr>

  <tr>
  <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">Payment Type</th>
  <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;"> ' . $row["payment_type"] . '</td>
  </tr>

  <tr>
  <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">Payment Status</th>
  <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;"> ' . $row["payment_status"] . '</td>
  </tr>

  <tr>
  <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">Date</th>
  <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;"> ' . $row["added_on"] . '</td>
  </tr>

  <tr>
  <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">Total</th>
  <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">$' . $row["total_price"] . '</td>
  </tr>

  <tr><th colspan="2" style="padding:10px 20px; border-bottom: 4px solid #FF00FF;">SHIPPING DETAILS</th></tr>

	<tr>
    <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">Address</th>
    <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">' . $row["address1"] . '</td>
    </tr>
	<tr>
    <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">Phone</th>
    <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">' . $row["phone"] . '</td>
    </tr>
	<tr>
    <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">City</th>
    <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">' . $row["city"] . '</td>
    </tr>
	<tr>
    <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">Town</th>
    <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">' . $row["town"] . '</td>
    </tr>
	<tr>
    <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">State</th>
    <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">' . $row["state"] . '</td>
    </tr>
	<tr>
    <th style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">Postal Code</th>
    <td style="padding:10px 20px; border-bottom: 1px solid #FF00FF;">' . $row["pin_code"] . '</td>
    </tr>
 
        <tr>
            <td colspan="2" style="background:#FF00FF ; width: 100%; padding: 20px 10px;">
                <p style="color:white;"> &copy; All Right Are Reserved By | <a href="https://kingdomstylesboutique.com/" style="color: black; text-decoration:none;">Kingdom Styles</a> | Design & Developed By <a href="https://vantagedroid.com/" style="color: black; text-decoration:none;">Vantage Droid Pvt. Ltd.</a>
                </p>

            </td>
        </tr>


    </table></html>';
            mail('test-5d904e@test.mailgenius.com', $from, $message, $headers, '-finfo@kingdomstylesboutique.com');


            $msg = "<div class='alert position-absolute top100px msg-login alert-success text-center text-capitalize'>Order Status <strong>" . $order_status_name['name'] . "</strong></div>";
        } else {
            $msg = "error";
        }
    }
}


?>
<div class="wrapper">
    <?php require("../inc/sidebar.php");
    ?>
    <div class="main-panel">
        <?php require("../inc/top-navbar.php");
        ?>
        <div class="content">
            <?php
            echo $msg;
            if (isset($_SESSION["msg"])) {
                echo $_SESSION["msg"];
                unset($_SESSION["msg"]);
            }
            ?>
            <div class="container-fluid px-0">
                <div class="col-12 px-0">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title float-left text-uppercase font-weight-bold">Manage Order</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="text-primary">
                                    <th>#Sr</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>QTY</th>
                                    <th>Pending QTY</th>
                                    <th>Stock</th>
                                    <th>Shipping</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                    <?php

                                    $i = 1;
                                    $tshipping = 0;
                                    $subTotal = 0;
                                    $res = mysqli_query($con, "SELECT DISTINCT(`orders_details`.`id`), `orders_details`.*,`orders`.`name` as `username`,`orders`.`user_id` as `uid`,`orders`.`email` as `useremail`,`orders`.`address1`,`orders`.`address2`,`orders`.`phone`,`orders`.`pin_code`,`orders`.`city`,`orders`.`state`,`orders`.`town`,`orders`.`total_price`,`orders`.`order_status`,`orders`.`coupon_id`,`product`.`name`,`product`.`image`, `orders_details`.`qty` as `orders_details_qty`, `product`.`id` as `product_id` FROM `product`,`orders_details`,`orders` WHERE `orders_details`.`order_id`='$order_id' AND `orders`.`id`='$order_id' AND `product`.id=`orders_details`.`product_id`");
                                    if (mysqli_num_rows($res) > 0) {

                                        while ($row = mysqli_fetch_array($res)) {
                                            $uid = $row["uid"];
                                            $name = $row["username"];
                                            $email = $row["useremail"];
                                            $address1 = $row["address1"];
                                            $address2 = $row["address2"];
                                            $phone = $row["phone"];
                                            $state = $row["state"];
                                            $town = $row["town"];
                                            $pin = $row["pin_code"];
                                            $city = $row["city"];
                                            $total_price = $row["total_price"];
                                            $order_status = $row["order_status"];
                                            $coupon_id =  $row["coupon_id"];
                                            $resCoupon = mysqli_query($con, "SELECT * FROM `coupons` WHERE `id`='$coupon_id'");
                                            if (mysqli_num_rows($resCoupon) > 0) {
                                                while ($rowCoupon = mysqli_fetch_assoc($resCoupon)) {
                                                    $coupon = $rowCoupon["price"];
                                                }
                                            } else {
                                                $coupon = 0;
                                            }

                                            $shipping = $row["shipping"];
                                            $tshipping += $shipping;
                                            $subTotal += $row["price"] * $row["qty"];

                                            $resProductAttr = mysqli_fetch_assoc(mysqli_query($con, "SELECT `product_attributes`.*, `colors`.`color`,`size`.`size`FROM `product_attributes` LEFT JOIN `colors` ON `product_attributes`.`color_id`=`colors`.`id` AND `colors`.`status`='1' LEFT JOIN `size` ON `product_attributes`.`size_id`=`size`.`id` AND `size`.`status`='1' WHERE  `product_attributes`.`id`='" . $row["product_attr_id"] . "'"));


                                            $checkProductAvailabilityByProductID =  checkProductAvailabilityByProductID($con, $row["product_id"], $row["product_attr_id"]);
                                            // USE FOR LOOP IN SELECT OPTION WITH VARIABLE $pending_qty TO SHOW LIMITED STOCK QTY
                                            $checkProductQty = checkProductQty($con,  $row["product_attr_id"]);
                                            $pending_qty =  $checkProductQty - $checkProductAvailabilityByProductID;

                                            if ($pending_qty > 0) {
                                                $stock = "In Stock";
                                            } else {
                                                $stock = "Out of stock";
                                            }
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>

                                        <td><a href="javascript:void(0);"><span class="h6"><?php echo str_replace("-", " ", $row["name"]);
                                                                                                    ?></span></a></td>
                                        <td> <img src="../media/product/<?php echo $row["image"]; ?>"
                                                alt="<?php echo $row["image"]; ?>" class="img-fluid"
                                                style="width:50px;"></td>

                                        <td><?php if (isset($resProductAttr["color"]) && $resProductAttr["color"] != "") {
                                                        echo '<button class="btn btn-white btn-sm mx-1"><div class="rounded-circle m-1 mx-auto border border-primary" style="width:15px; height:15px; background-color:' . $resProductAttr["color"] . '"></div></button>';
                                                    } else {
                                                        echo '<button class="btn btn-white btn-sm mx-1">Nil</button>';
                                                    } ?>
                                        </td>
                                        <td><?php if (isset($resProductAttr["size"]) && $resProductAttr["size"] != "") {
                                                        echo '   
<button class="btn btn-white btn-sm mx-1">' . $resProductAttr["size"] . '</button>';
                                                    } else {
                                                        echo '<button class="btn btn-white btn-sm mx-1">Nil</button>';
                                                    } ?>
                                        </td>
                                        <td>$<?php echo $row["price"];
                                                        ?></td>
                                        <td><?php echo $row["qty"]; ?></td>
                                        <td><?php echo $pending_qty; ?></td>
                                        <td><?php echo $stock; ?></td>
                                        <td>$<?php echo $shipping;?></td>
                                        <td>$<?php echo $row["price"] * $row["qty"]; ?></td>
                                    </tr>
                                    <?php
                                            $i++;
                                        }
                                        ?>
                                    <tr>
                                        <th colspan="9"></th>
                                        <th><strong>Sub Total</strong></th>
                                        <td>$<?php echo $subTotal; ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="9"></th>
                                        <th><strong>Shipping</strong></th>
                                        <td>$<?php echo $tshipping;?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="9"></th>
                                        <th><strong>Coupon Discount</strong></th>
                                        <td>$<?php echo $coupon;
                                                    ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="9"></th>
                                        <th><strong>Total</strong></th>
                                        <td>$<?php echo $total_price; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="9"></td>
                                        <?php
                                            $order_status_arr = mysqli_query($con, "SELECT `name` from `orders_status` WHERE `id`='$order_status'");
                                            $status = mysqli_fetch_array($order_status_arr);
                                            ?>
                                        <td class="h4 font-weight-bold">Order Status</td>
                                        <td class="h4 font-weight-bold"><?php echo $status["name"];
                                                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="10"></td>
                                        <td>
                                            <form action="" method="POST">
                                                <label for="Status"></lable>
                                                    <select name="update_order_status" id="Status"
                                                        class="form-control text-capitalize pl-2">
                                                        <?php
                                                            $res = mysqli_query($con, "SELECT * FROM `orders_status`");
                                                            if (mysqli_num_rows($res) > 0) {
                                                                while ($row = mysqli_fetch_array($res)) {
                                                                    if (isset($row['name']) && $row['name'] == $status["name"]) {
                                                            ?>
                                                        <option selected hidden disabled
                                                            value="<?php echo $row['id']; ?>">
                                                            <?php echo $status["name"];
                                                                            ?>
                                                        </option>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row['name'];
                                                                            ?>
                                                        </option>
                                                        <?php
                                                                    } else {
                                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row['name'];
                                                                            ?>
                                                        </option>
                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                    </select>
                                                    <button type="submit" class="btn btn-block btn-primary btn-sm"
                                                        name="btn_update_order_status">Update
                                                        Status</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="col-12 p-0">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title float-left text-uppercase font-weight-bold">Shipping Details</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="col-12 px-2 pt-2 border-bottom h4 font-weight-bold text-capitalize p-0">
                                <div class="row m-0">
                                    <div class="col-5">User ID</div>
                                    <div class="col-7"><?php echo $uid;
                                                        ?></div>
                                </div>
                            </div>

                            <div class="col-12 px-2 pt-2 border-bottom h4 font-weight-bold text-capitalize p-0">
                                <div class="row m-0">
                                    <div class="col-5">User Name</div>
                                    <div class="col-7"><?php echo $name;
                                                        ?></div>
                                </div>
                            </div>

                            <div class="col-12 px-2 pt-2 border-bottom h4 font-weight-bold text-capitalize p-0">
                                <div class="row m-0">
                                    <div class="col-5">Main Address</div>
                                    <div class="col-7"><?php echo $address1;
                                                        ?></div>
                                </div>
                            </div>
                            <div class="col-12 px-2 pt-2 border-bottom h4 font-weight-bold text-capitalize p-0">
                                <div class="row m-0">
                                    <div class="col-5">Secondary Address</div>
                                    <div class="col-7"><?php echo $address2;
                                                        ?></div>
                                </div>
                            </div>
                            <div class="col-12 px-2 pt-2 border-bottom h4 font-weight-bold text-capitalize p-0">
                                <div class="row m-0">
                                    <div class="col-5">Phone</div>
                                    <div class="col-7"><?php echo $phone;
                                                        ?></div>
                                </div>
                            </div>
                            <div class="col-12 px-2 pt-2 border-bottom h4 font-weight-bold text-capitalize p-0">
                                <div class="row m-0">
                                    <div class="col-5">City</div>
                                    <div class="col-7"><?php echo $city;
                                                        ?></div>
                                </div>
                            </div>
                            <div class="col-12 px-2 pt-2 border-bottom h4 font-weight-bold text-capitalize p-0">
                                <div class="row m-0">
                                    <div class="col-5">Town</div>
                                    <div class="col-7"><?php echo $town;
                                                        ?></div>
                                </div>
                            </div>
                            <div class="col-12 px-2 pt-2 border-bottom h4 font-weight-bold text-capitalize p-0">
                                <div class="row m-0">
                                    <div class="col-5">State</div>
                                    <div class="col-7"><?php echo $state;
                                                        ?></div>
                                </div>
                            </div>
                            <div class="col-12 px-2 pt-2 border-bottom h4 font-weight-bold text-capitalize p-0">
                                <div class="row m-0">
                                    <div class="col-5">Zip Code</div>
                                    <div class="col-7"><?php echo $pin;
                                                        ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
require("../inc/footer-dashboard.php");
?>