       <style>
.sidebar .nav li:hover>a,
.sidebar .nav li .dropdown-menu a:hover,
.sidebar .nav li .dropdown-menu a:focus,
.sidebar .nav li.active>[data-toggle="collapse"] {
    color: #fff;
    background: linear-gradient(60deg, #84bd00, #689500);
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(255, 152, 0, 0.4);
}

.sidebar .nav li.active>[data-toggle="collapse"] i {
    color: #fff !important;
}

.sidebar .sidebar-wrapper>.nav [data-toggle="collapse"]~div>ul>li>a span,
.sidebar .sidebar-wrapper .user .user-info [data-toggle="collapse"]~div>ul>li>a span,
.sidebar .nav p {
    -webkit-transition: all 10ms linear;
    -moz-transition: all 10ms linear;
    -o-transition: all 10ms linear;
    -ms-transition: all 10ms linear;
    transition: all 10ms linear;
}

.sidebar .nav li:hover>a,
.sidebar .nav li:hover>.nav-link>i {
    color: #fff !important;
    /*    background: linear-gradient(*/
    /*60deg*/
    /*,#FB067D, #689500);*/
}
       </style>

       <div class="sidebar" data-color="purple" data-background-color="white">
           <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag
    -->
           <div class="logo">
               <a href="<?php if (isset($_SESSION["ADMIN_ROLE"]) && $_SESSION["ADMIN_ROLE"] == "1") {
                      echo "profile?id=" . $_SESSION["ADMIN_ID"] . "";
                    } else {
                      echo "javascript:void(0);";
                    } ?>" class="simple-text logo-normal text-capitalize text-warning">
                   <?php if (!empty($_SESSION["ADMIN_USERNAME"])) {
                echo $_SESSION["ADMIN_USERNAME"];
              } else {
                echo "KSB Panel";
              } ?>
               </a>
           </div>
           <div class="sidebar-wrapper">
               <ul class="nav">
                   <!--Dashboard-->
                   <li class="nav-item <?= ($page_name == 'dashboard') ? 'active' : ''; ?>">
                       <a class="nav-link" href="./dashboard">
                           <i class="material-icons">dashboard</i>
                           <p>Dashboard</p>
                       </a>
                   </li>
                   <!--Dashboard-->
                   <?php
              if (isset($_SESSION["ADMIN_ROLE"]) && $_SESSION["ADMIN_ROLE"] == "1") {
              ?> 
                   <!--Admin Master-->
                   <li class="nav-item <?= ($page_name == 'profile' || $page_name == 'managers') ? 'active' : ''; ?>">
                       <a class="nav-link collapsed" data-toggle="collapse" href="#admin" aria-expanded="false">
                           <i class="material-icons">admin_panel_settings</i>
                           <p> Admin Control
                               <b class="caret"></b>
                           </p>
                       </a>
                       <div class="collapse" id="admin">
                           <ul class="nav">
                               <li class="nav-item <?= ($page_name == 'profile') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./profile">
                                       <i class="material-icons">edit</i>
                                       <span class="sidebar-normal"> Profile </span>
                                   </a>
                               </li>
                               <li class="nav-item <?= ($page_name == 'managers') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./managers">
                                       <i class="material-icons">view_list</i>
                                       <span class="sidebar-normal">View Managers</span>
                                   </a>
                               </li>
                           </ul>
                       </div>
                   </li>
                   <!--Admin Master-->
                   <?php }?>
                  
                  <!-- clients -->
                   <li
                       class="nav-item <?= ($page_name == 'manage-clients' || $page_name == 'clients') ? 'active' : ''; ?>">
                       <a class="nav-link collapsed" data-toggle="collapse" href="#clients" aria-expanded="false">
                           <i class="material-icons">groups</i>
                           <p> clients
                               <b class="caret"></b>
                           </p>
                       </a>
                       <div class="collapse" id="clients">
                           <ul class="nav">
                               <li class="nav-item <?= ($page_name == 'manage-clients') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./manage-clients">
                                       <i class="material-icons">edit</i>
                                       <span class="sidebar-normal">Manage clients</span>
                                   </a>
                               </li>
                               <li class="nav-item <?= ($page_name == 'clients') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./clients">
                                       <i class="material-icons">view_list</i>
                                       <span class="sidebar-normal">View clients</span>
                                   </a>
                               </li>
                           </ul>
                       </div>
                   </li>
                   <!-- clients -->

            
                   <!--engineering-consultancy Master-->
                   <li
                       class="nav-item <?= ($page_name == 'manage-engineering-consultancy' || $page_name == 'engineering-consultancy') ? 'active' : ''; ?>">
                       <a class="nav-link collapsed" data-toggle="collapse" href="#engineering-consultancy"
                           aria-expanded="false">
                           <i class="material-icons">fact_check</i>
                           <p> Engineering Consult<b class="caret"></b>
                           </p>
                       </a>
                       <div class="collapse" id="engineering-consultancy">
                           <ul class="nav">
                               <li
                                   class="nav-item <?= ($page_name == 'manage-engineering-consultancy') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./manage-engineering-consultancy">
                                       <i class="material-icons">edit</i>
                                       <span class="sidebar-normal"> Manage Engineering Consult </span>
                                   </a>
                               </li>
                               <li class="nav-item <?= ($page_name == 'engineering-consultancy') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./engineering-consultancy">
                                       <i class="material-icons">view_list</i>
                                       <span class="sidebar-normal">View Engineering Consult</span>
                                   </a>
                               </li>
                           </ul>
                       </div>
                   </li>
                   <!--engineering-consultancy Master-->

                   <!--industries Master-->
                   <li
                       class="nav-item <?= ($page_name == 'manage-industries' || $page_name == 'industries') ? 'active' : ''; ?>">
                       <a class="nav-link collapsed" data-toggle="collapse" href="#industries" aria-expanded="false">
                           <i class="material-icons">apartment</i>
                           <p> Industries<b class="caret"></b>
                           </p>
                       </a>
                       <div class="collapse" id="industries">
                           <ul class="nav">
                               <li class="nav-item <?= ($page_name == 'manage-industries') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./manage-industries">
                                       <i class="material-icons">edit</i>
                                       <span class="sidebar-normal"> Manage Industries </span>
                                   </a>
                               </li>
                               <li class="nav-item <?= ($page_name == 'industries') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./industries">
                                       <i class="material-icons">view_list</i>
                                       <span class="sidebar-normal">View Industries</span>
                                   </a>
                               </li>
                           </ul>
                       </div>
                   </li>
                   <!--industries Master-->

                   <!--projects Master-->
                   <li
                       class="nav-item <?= ($page_name == 'manage-projects' || $page_name == 'projects') ? 'active' : ''; ?>">
                       <a class="nav-link collapsed" data-toggle="collapse" href="#projects" aria-expanded="false">
                           <i class="material-icons">work</i>
                           <p> Projects<b class="caret"></b>
                           </p>
                       </a>
                       <div class="collapse" id="projects">
                           <ul class="nav">
                               <li class="nav-item <?= ($page_name == 'manage-projects') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./manage-projects">
                                       <i class="material-icons">edit</i>
                                       <span class="sidebar-normal"> Manage Projects </span>
                                   </a>
                               </li>
                               <li class="nav-item <?= ($page_name == 'projects') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./projects">
                                       <i class="material-icons">view_list</i>
                                       <span class="sidebar-normal">View Projects</span>
                                   </a>
                               </li>
                           </ul>
                       </div>
                   </li>
                   <!--projects Master-->

                   <!--reviews Master-->
                   <li
                       class="nav-item <?= ($page_name == 'manage-reviews' || $page_name == 'reviews') ? 'active' : ''; ?>">
                       <a class="nav-link collapsed" data-toggle="collapse" href="#reviews" aria-expanded="false">
                           <i class="material-icons">auto_graph</i>
                           <p> Reviews<b class="caret"></b>
                           </p>
                       </a>
                       <div class="collapse" id="reviews">
                           <ul class="nav">
                               <li class="nav-item <?= ($page_name == 'manage-reviews') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./manage-reviews">
                                       <i class="material-icons">edit</i>
                                       <span class="sidebar-normal"> Manage Reviews </span>
                                   </a>
                               </li>
                               <li class="nav-item <?= ($page_name == 'reviews') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./reviews">
                                       <i class="material-icons">view_list</i>
                                       <span class="sidebar-normal">View Reviews</span>
                                   </a>
                               </li>
                           </ul>
                       </div>
                   </li>
                   <!--reviews Master-->
                   <!--teams Master-->
                   <li class="nav-item <?= ($page_name == 'manage-teams' || $page_name == 'teams') ? 'active' : ''; ?>">
                       <a class="nav-link collapsed" data-toggle="collapse" href="#teams" aria-expanded="false">
                           <i class="material-icons">group_work</i>
                           <p> Teams<b class="caret"></b>
                           </p>
                       </a>
                       <div class="collapse" id="teams">
                           <ul class="nav">
                               <li class="nav-item <?= ($page_name == 'manage-teams') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./manage-teams">
                                       <i class="material-icons">edit</i>
                                       <span class="sidebar-normal"> Manage Teams </span>
                                   </a>
                               </li>
                               <li class="nav-item <?= ($page_name == 'teams') ? 'active' : ''; ?>">
                                   <a class="nav-link" href="./teams">
                                       <i class="material-icons">view_list</i>
                                       <span class="sidebar-normal">View Teams</span>
                                   </a>
                               </li>
                           </ul>
                       </div>
                   </li>
                   <!--teams Master-->


                   <!-- Users -->
                   <li class="nav-item <?= ($page_name == 'users') ? 'active' : ''; ?>">
                       <a class="nav-link" href="./users ">
                           <i class="material-icons">contact_mail</i>
                           <p>Users</p>
                       </a>
                   </li>
                   <!-- Users -->

                   <li class="nav-item pt-3 active">
                       <a class="nav-link" href="?action=logout">
                           <i class="material-icons">logout</i>
                           <p>Logout</p>
                       </a>
                   </li>

                   <li class="nav-item  pt-5">

                   </li>
                   <li class="nav-item  pt-3 active text-center">
                       <a class="nav-link bg-danger" href="https://vantagedroid.com/" target="_blank">
                           <p>Developed By</p>
                           <h6 class="font-weight-bold text-uppercase">Vantage Droid Pvt. Ltd.</h6>
                       </a>
                   </li>
               </ul>
           </div>
       </div>