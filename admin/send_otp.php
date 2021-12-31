<?php
require_once( "../inc/config.php" );
require_once( "../inc/function-site.php" );
$msg = "";
if ( isset( $_POST["email"] ) && $_POST["email"] != "" ) {
    $otp = rand( 1111, 9999 );
    $_SESSION['EMAIL_OTP'] = $otp;
    $to = getSaveValue( $con, $_POST["email"] );
$from = "One Time Password";
$headers = "";
$headers .= "From: Beta Solution <noreply@betasolution.com> \r\n";
$headers .= "Reply-To: aimeekhan514@gmail.com \r\n" ."X-Mailer: PHP/" . phpversion();
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
    $text = $otp;
    $subject = "Your 4 Digits Pass code";
$message = '
    <table border="0" style="text-align:center;">

        <tr>
            <th colspan="2" style="width: 100%; border-bottom: 4px solid #84bd00 ;border-top: 4px solid #84bd00 ;">
<img src="https://kingdomstylesboutique.com/img/logo.png" width="100px" height="100px" alt="">

            </th>
        </tr>


<tr> <th colspan="2" style="padding:10px 20px; ">' . $subject . '</th> </tr>

	<tr><th style="padding:10px 20px; border-bottom: 4px solid #84bd00 ;">EMAIL</th><td style="padding:10px 20px; border-bottom: 4px solid #84bd00 ;">' . $to . '</td></tr>

	 
	 <tr><th style="padding:10px 20px;">OTP (One Time Pass code)</th><td style="padding:10px 20px;"> ' . $text . '</td></tr>



        <tr>
            <td colspan="2" style="background:#84bd00  ; width: 100%; padding: 20px 10px;">
                <p style="color:white;"> &copy; All Right Are Reserved By | <a href="https://kingdomstylesboutique.com/" style="color: black; text-decoration:none;">Kingdom Styles</a> | Design & Developed By <a href="https://vantagedroid.com/" style="color: black; text-decoration:none;">Vantage Droid</a>
                </p>

            </td>
        </tr>


    </table>';
if (mail($to, $from, $message, $headers,'-faimeekhan514@gmail.com')) {
    echo "done";
} else {
    echo 'failed';
}
}else{
    $verify_email = getSaveValue($con, $_POST["verify_email"]);
    if($verify_email == $_SESSION['EMAIL_OTP']){
        echo "verify";
    }else{
        echo "not_verify";
    }
}
    ?>
