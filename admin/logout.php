<?php
if ( isset( $_GET["action"] ) && $_GET["action"] == 'logout' ) {
    unset( $_SESSION["ADMIN_LOGIN"] );
    header( "Location:index" );
}
if ( !isset( $_SESSION["ADMIN_LOGIN"] ) ) {
    header( "Location:index" );
}
?>
