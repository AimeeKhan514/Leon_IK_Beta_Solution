<?php
require( "../inc/top-dashboard.php" );
require( "logout.php" );

$count = "";
?>
<div class="wrapper">
    <?php require( "../inc/sidebar.php" );
?>
    <div class="main-panel">
        <?php require( "../inc/top-navbar.php" );
?>
        <div class="content">
            <?php
if ( isset( $_SESSION["msg"] ) ) {
    echo $_SESSION["msg"];
    unset( $_SESSION["msg"] );
}
?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                    



                 
                  
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <a href="manage-products ">
                                <div class="card card-stats">
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">inventory_2</i>
                                        </div>
                                        <p class="card-category">Add</p>
                                        <h3 class="card-title">Product</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">list</i> Check Results
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <a href="manage-categories ">
                                <div class="card card-stats">
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">category</i>
                                        </div>
                                        <p class="card-category">Add</p>
                                        <h3 class="card-title">Category</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">list</i> Check Results
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <a href="manage-sub-categories ">
                                <div class="card card-stats">
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">segment</i>
                                        </div>
                                        <p class="card-category">Add</p>
                                        <h3 class="card-title">Sub Category</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">list</i> Check Results
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php


if (isset($_SESSION["ADMIN_ROLE"]) && $_SESSION["ADMIN_ROLE"] == "1") {
?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <a href="manage-floating-news ">
                                <div class="card card-stats">
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">compare_arrows</i>
                                        </div>
                                        <p class="card-category">Add News</p>
                                        <h3 class="card-title">Floating</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">list</i> Check Results
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <a href="manage-slider">
                                <div class="card card-stats">
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">view_array</i>
                                        </div>
                                        <p class="card-category">Add Slider</p>
                                        <h3 class="card-title">Sliders</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">list</i> Check Results
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <a href="managers">
                                <div class="card card-stats">
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">recent_actors</i>
                                        </div>
                                        <p class="card-category">Site</p>
                                        <h3 class="card-title">Managers</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">list</i> Check Results
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
}
?>
                        <?php require( "../inc/footer-dashboard.php" )?>