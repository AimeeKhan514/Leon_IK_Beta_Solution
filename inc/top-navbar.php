 <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
     <div class="container-fluid">
         <div class="navbar-wrapper">
             <a class="navbar-brand" href="javascript:;"><?php
        $page_title = str_replace("-"," ", $page_name);
        echo ucwords($page_title," ");?></a>
         </div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
             <span class="sr-only">Toggle navigation</span>
             <span class="navbar-toggler-icon icon-bar"></span>
             <span class="navbar-toggler-icon icon-bar"></span>
             <span class="navbar-toggler-icon icon-bar"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end">
             <ul class="navbar-nav">
                 <li class="nav-item dropdown">
                     <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="material-icons">person</i>
                         <p class="d-lg-none d-md-block">
                             Account
                         </p>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="<?php if (isset($_SESSION["ADMIN_ROLE"]) && $_SESSION["ADMIN_ROLE"] == "1") {
                                echo "profile?id=" . $_SESSION["ADMIN_ID"] . "";
                            } else {
                                echo "javascript:void(0);";
                            } ?>"> Edit Profile</a>
                                                     <?php if(isset($_SESSION["ADMIN_ROLE"]) && $_SESSION["ADMIN_ROLE"]=="1"){
                                       echo ' <a class="dropdown-item" href="profile">New Role</a>';
                                       echo '<div class="dropdown-divider"></div>';
                                       
                                   }?>
                         <a class="dropdown-item" href="?action=logout">Log out</a>
                         
                     </div>
                 </li>
             </ul>
         </div>
     </div>
 </nav>

