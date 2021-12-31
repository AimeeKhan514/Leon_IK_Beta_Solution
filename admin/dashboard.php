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
                            <a href="manage-clients ">
                                <div class="card card-stats">
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">groups</i>
                                        </div>
                                        <p class="card-category">Add</p>
                                        <h3 class="card-title">Client</h3>
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
                            <a href="manage-engineering-consultancy ">
                                <div class="card card-stats">
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">fact_check</i>
                                        </div>
                                        <p class="card-category">Add</p>
                                        <h3 class="card-title">Engineering Consult</h3>
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
                            <a href="manage-industries ">
                                <div class="card card-stats">
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">apartment</i>
                                        </div>
                                        <p class="card-category">Add</p>
                                        <h3 class="card-title">Industries</h3>
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
                            <a href="manage-projects ">
                                <div class="card card-stats">
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">work</i>
                                        </div>
                                        <p class="card-category">Add</p>
                                        <h3 class="card-title">Projects</h3>
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
                            <a href="manage-reviews">
                                <div class="card card-stats">
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">auto_graph</i>
                                        </div>
                                        <p class="card-category">Add</p>
                                        <h3 class="card-title">Reviews</h3>
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
                            <a href="manage-teams">
                                <div class="card card-stats">
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">group_work</i>
                                        </div>
                                        <p class="card-category">Add</p>
                                        <h3 class="card-title">Teams</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">list</i> Check Results
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php require( "../inc/footer-dashboard.php" )?>