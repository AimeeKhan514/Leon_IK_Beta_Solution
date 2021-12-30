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

if(isset($_POST["btn_submit"])){
    $subject =   get_safe_value($con,$_POST["subject"]);
    $mail_temp = get_safe_value($con,$_POST["message"]);
    $mail_temp =  str_replace('\r\n','<br>',$mail_temp);
        $mail_temp = html_entity_decode($mail_temp);
    $result = mysqli_query($con,"SELECT * FROM `subscription` WHERE `status`='1'");

    while($row_mail =  mysqli_fetch_array($result)){
     $row[] =  $row_mail["subscriber"];
    }
    foreach($row as $key => $val){
        $value[] =  $val;

    }
    $mail = implode(",",$value);
    
     $from = "Kingdom Styles";
            $headers = "";
            $headers .= "From: Kingdom Styles <noreply@kingdomstylesboutique.com> \r\n";
            $headers .= "Reply-To: noreply@kingdomstylesboutique.com \r\n" . "X-Mailer: PHP/" . phpversion();
            $headers .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            $subject = "<h2>Hello Kingdom Stylers!.</h2>";
            $message = '
    <table border="0" style="text-align:center;">

        <tr>
            <th colspan="2" style="width: 100%; border-bottom: 4px solid #FF00FF;border-top: 4px solid #FF00FF;">
<img src="https://kingdomstylesboutique.com/img/logo.png" width="100px" height="100px" alt="">

            </th>
        </tr>


<tr> <th colspan="2" style="padding:10px 20px; ">' . $subject . '</th> </tr>
<tr> <th colspan="2" style="padding:10px 20px; ">' . $mail_temp . '</th> </tr>

        <tr>
            <td colspan="2" style="background:#FF00FF ; width: 100%; padding: 20px 10px;">
                <p style="color:white;"> &copy; All Right Are Reserved By | <a href="https://kingdomstylesboutique.com/" style="color: black; text-decoration:none;">Kingdom Styles</a> | Design & Developed By <a href="https://vantagedroid.com/" style="color: black; text-decoration:none;">Vantage Droid Pvt. Ltd.</a>
                </p>

            </td>
        </tr>
    </table>';
            mail($mail, $from, $message, $headers, '-fnoreply@kingdomstylesboutique.com');
    
     $_SESSION["msg"]= "<div class='alert alert-success msg' role='alert'>
            <strong>Success!</strong> Mail is Sending To the Subscribers..!</div>";

    }



// if ( isset( $_SESSION["msg"] ) ) {
//     echo $_SESSION["msg"];
//     unset( $_SESSION["msg"] );
// }
if ( isset( $msg ) ) {
    echo $msg;
}

$res = mysqli_query($con,$sql);

?>
<div class = "container-fluid px-0">
<div class = "col-12 px-0">
<div class = "card">
<div class = "card-header card-header-primary">
<h3 class = "card-title float-left text-uppercase font-weight-bold">Subscriptions
</h3>
</div>
<div class = "card-body table-responsive">
<?php
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
?>
<table class = "table table-hover text-center text-capitalize">
<thead class = "text-primary">
<th>#</th>
<th>Mail ID</th>
<th>Subscriber Email</th>
<th>Status</th>
<th>Action</th>
</thead>
<tbody>

<?php
    while($row = mysqli_fetch_array($res)){

?>
        <tr>
        <td><?php echo $serial;?></td>
        <td><?php echo $row["id"];
        ?></td>

         <td title = "<?php echo $row["subscriber"];?>" rel = "tooltip"><?php echo $row["subscriber"];?></td>

        <td><?php if ( $row["status"] == 1 ) {
            echo "<a href='?type=status&operation=deactive&id=" . $row['id'] . "'  class='btn btn-info btn-sm text-white btn-tooltip' tab-index='0' rel='tooltip' title='Click To Deactivate'>Active</a>";
        } else {
            echo "<a href='?type=status&operation=active&id=" . $row['id'] . "' class='btn btn-warning btn-sm text-white btn-tooltip' tab-index='0' rel='tooltip' title='Click To Activate'>Deactive</a>";
        }
        ?></td>
        <td>
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


<div class = "container-fluid px-0">
<div class = "col-12 px-0">
<div class = "card">
<div class = "card-header card-header-primary">
<h3 class = "card-title float-left text-uppercase font-weight-bold">Send Mail To Active Subscribers
</h3>
</div>
<div class = "card-body">
    <form action="" method="post" enctype="multipart/form-data">

                            <div class="col-md-12 px-2 mb-3">
                                <label for="subject" class="form-label text-capitalize">subject<sup
                                        class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="subject" required
                                    placeholder="E.g, New Products" name="subject">

                            </div>

                            <div class="col-md-12 px-2 mb-3">
                                <label for="subscription_message" class="form-label text-capitalize">message<sup
                                        class="text-danger">*</sup></label>
                                <textarea class="form-control" id="subscription_message" 
                                    placeholder="Your Message Here" name="message" rows="5"></textarea>
                                
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" name="btn_submit" type="submit">Send Mail</button>
                            </div>
                        </form>

</div>

</div>
</div>
</div>

</div>
</div>
</div>
<?php
require( "../inc/footer-dashboard.php" );
?>
