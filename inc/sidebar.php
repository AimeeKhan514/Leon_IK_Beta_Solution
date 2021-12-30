       <style>
       .sidebar .nav li:hover>a, .sidebar .nav li .dropdown-menu a:hover, .sidebar .nav li .dropdown-menu a:focus, .sidebar .nav li.active>[data-toggle="collapse"] {
     color: #fff;
    background: linear-gradient(
60deg
,#84bd00, #689500);
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(255, 152, 0, 0.4);
}
.sidebar .nav li.active>[data-toggle="collapse"] i {
    color: #fff!important;
}
.sidebar .sidebar-wrapper>.nav [data-toggle="collapse"]~div>ul>li>a span, .sidebar .sidebar-wrapper .user .user-info [data-toggle="collapse"]~div>ul>li>a span, .sidebar .nav p {
    -webkit-transition: all 10ms linear;
    -moz-transition: all 10ms linear;
    -o-transition: all 10ms linear;
    -ms-transition: all 10ms linear;
    transition: all 10ms linear;
}
.sidebar .nav li:hover>a, .sidebar .nav li:hover>.nav-link > i {
    color: #fff !important;
/*    background: linear-gradient(*/
/*60deg*/
/*,#FB067D, #689500);*/
}

       </style>

        <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
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
                    <?php if(!empty($_SESSION["ADMIN_USERNAME"])){echo $_SESSION["ADMIN_USERNAME"];}else{echo "KSB Panel";} ?>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <!--Dashboard-->
                    <li class="nav-item <?= ($activePage == 'dashboard') ? 'active' : ''; ?>">
                        <a class="nav-link" href="./dashboard">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                        <!--Dashboard-->
                            <!--Orders-->
                        <li class="nav-item <?= ($activePage == 'orders' || $activePage == 'orders-manage') ? 'active' : ''; ?>">
                        <a class="nav-link" href="./orders ">
                            <i class="material-icons">star_border</i>
                            <p>Orders</p>
                        </a>
                    </li>
                      <!--Orders-->

                  <?php


            if (isset($_SESSION["ADMIN_ROLE"]) && $_SESSION["ADMIN_ROLE"] == "1") {
                    ?>
  <!--Slider Master-->
            <li class="nav-item <?= ($activePage == 'manage-slider' || $activePage == 'slider') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#slider" aria-expanded="false">
              <i class="material-icons">view_array</i>
              <p> Slider Master
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="slider"  >
              <ul class="nav">
                <li class="nav-item <?= ($activePage == 'manage-slider') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./manage-slider">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal"> Manage Slider </span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'slider') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./slider">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Sliders</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
  <!--Slider Master-->
  
    <!--Gallery Master-->
          <li class="nav-item <?= ($activePage == 'manage-gallery' || $activePage == 'gallery') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#gallery" aria-expanded="false">
              <i class="material-icons">view_array</i>
              <p> Gallery Master
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="gallery"  >
              <ul class="nav">
                <li class="nav-item <?= ($activePage == 'manage-gallery') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./manage-gallery">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal"> Manage Gallery </span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'gallery') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./gallery">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Gallery</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
<!--Gallery Master-->

<!--Admin Master-->
            <li class="nav-item <?= ($activePage == 'profile' || $activePage == 'managers') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#admin" aria-expanded="false">
              <i class="material-icons">people_alt</i>
              <p> Admin Control
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="admin"  >
              <ul class="nav">
                <li class="nav-item <?= ($activePage == 'profile') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./profile">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal"> Profile </span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'managers') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./managers">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Managers</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!--Admin Master-->

                    <?php
                    } ?>


<!-- Categories -->
               <li class="nav-item <?= ($activePage == 'manage-categories' || $activePage == 'categories') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#Categories" aria-expanded="false">
              <i class="material-icons">category</i>
              <p> Categories
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="Categories"  >
              <ul class="nav">
                <li class="nav-item <?= ($activePage == 'manage-categories') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./manage-categories">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal"> Manage Categories </span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'categories') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./categories">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Categories</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

<!-- Categories -->
<!-- Sub Categories -->
            <li class="nav-item <?= ($activePage == 'manage-sub-categories' || $activePage == 'sub-categories') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#Sub_Categories" aria-expanded="false">
              <i class="material-icons">segment</i>
              <p> Sub Categories
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="Sub_Categories"  >
              <ul class="nav">
                <li class="nav-item <?= ($activePage == 'manage-sub-categories') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./manage-sub-categories">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal"> Manage Sub Categories </span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'sub-categories') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./sub-categories">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Sub Categories</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
<!-- Sub Categories -->
<!-- Size Master -->
          <li class="nav-item <?= ($activePage == 'manage-size' || $activePage == 'size') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#size" aria-expanded="false">
              <i class="material-icons">straighten</i>
              <p> Size Master
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="size"  >
              <ul class="nav">
                <li class="nav-item <?= ($activePage == 'manage-size') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./manage-size">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal"> Manage Size </span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'size') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./size">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Size</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
<!-- Size Master -->
<!-- Color Master -->
          <li class="nav-item <?= ($activePage == 'manage-color' || $activePage == 'color') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#color" aria-expanded="false">
              <i class="material-icons">palette</i>
              <p> Color Master
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="color"  >
              <ul class="nav">
                <li class="nav-item <?= ($activePage == 'manage-color') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./manage-color">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal"> Manage Color </span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'color') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./color">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Color</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Color Master -->
          <!-- Coupons Master -->
          <li class="nav-item <?= ($activePage == 'manage-coupon' || $activePage == 'coupon') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#coupons" aria-expanded="false">
              <i class="material-icons">local_offer</i>
              <p> Coupons Master
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="coupons"  >
              <ul class="nav">
                <li class="nav-item <?= ($activePage == 'manage-coupon') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./manage-coupon">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal"> Manage Coupons </span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'coupon') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./coupon">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Coupons</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

  <!-- Coupons Master -->
  <!-- Products -->
            <li class="nav-item <?= ($activePage == 'manage-products' || $activePage == 'products') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#products" aria-expanded="false">
              <i class="material-icons">inventory_2</i>
              <p> Products
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="products"  >
              <ul class="nav">
                <li class="nav-item <?= ($activePage == 'manage-products') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./manage-products">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal"> Manage Products </span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'products') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./products">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Products</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
  <!-- Products -->
          <?php if (isset($_SESSION["ADMIN_ROLE"]) && $_SESSION["ADMIN_ROLE"] == "1") {
                    ?>
                      <!-- Floating News -->
               <li class="nav-item <?= ($activePage == 'manage-floating-news' || $activePage == 'floating-news') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#floating-news" aria-expanded="false">
              <i class="material-icons">compare_arrows</i>
              <p> Floating News
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="floating-news"  >
              <ul class="nav">
                <li class="nav-item <?= ($activePage == 'manage-floating-news') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./manage-floating-news">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal"> Manage Floating News </span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'floating-news') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./floating-news">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Floating News</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <?php } ?>
<!-- Floating News -->

<!-- Brands -->
               <li class="nav-item <?= ($activePage == 'manage-brands' || $activePage == 'brands') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#brands" aria-expanded="false">
              <i class="material-icons">verified</i>
              <p> Brands
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="brands"  >
              <ul class="nav">
                        <li class="nav-item <?= ($activePage == 'manage-brands') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./manage-brands">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal">Manage Brands</span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'brands') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./brands">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Brands</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
<!-- Brands -->
<!-- Offers -->
               <li class="nav-item <?= ($activePage == 'manage-offers' || $activePage == 'offers') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#offers" aria-expanded="false">
              <i class="material-icons">percent</i>
              <p> Offers
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="offers"  >
              <ul class="nav">
                        <li class="nav-item <?= ($activePage == 'manage-offers') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./manage-offers">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal">Manage Offers</span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'offers') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./offers">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Offers</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
<!-- Offers -->
<!-- lightbox -->
               <li class="nav-item <?= ($activePage == 'manage-lightbox' || $activePage == 'lightbox') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#lightbox" aria-expanded="false">
              <i class="material-icons">present_to_all</i>
              <p> Light Box
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="lightbox"  >
              <ul class="nav">
                        <li class="nav-item <?= ($activePage == 'manage-lightbox') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./manage-lightbox">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal">Manage Lightbox</span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'lightbox') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./lightbox">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Lightbox</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
<!-- Offers -->


<!-- Page Description -->
               <li class="nav-item <?= ($activePage == 'manage-page-name' || $activePage == 'page-name' || $activePage == 'manage-page-meta' || $activePage == 'page-meta') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" href="#page_meta" aria-expanded="false">
              <i class="material-icons">auto_stories</i>
              <p> Page Description
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="page_meta"  >
              <ul class="nav">
                        <li class="nav-item <?= ($activePage == 'manage-page-meta') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./manage-page-meta">
                     <i class="material-icons">edit</i>
                    <span class="sidebar-normal">Manage Description</span>
                  </a>
                </li>
                  <li class="nav-item <?= ($activePage == 'page-meta') ? 'active' : ''; ?>">
                  <a class="nav-link" href="./page-meta">
                     <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Descriptions</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
<!-- Page Description -->
<!-- Subscriptions -->
                    <li class="nav-item <?= ($activePage == 'subscriptions') ? 'active' : ''; ?>">
                        <a class="nav-link" href="./subscriptions ">
                            <i class="material-icons">forward_to_inbox</i>
                            <p>Subscriptions</p>
                        </a>
                    </li>
                    <!-- Subscriptions -->
                    <!-- Visitors -->
                    <li class="nav-item <?= ($activePage == 'unique-visitors') ? 'active' : ''; ?>">
                        <a class="nav-link" href="./unique-visitors ">
                            <i class="material-icons">travel_explore</i>
                            <p>Visitors</p>
                        </a>
                    </li>
                       <!-- Visitors -->
                          <!-- Users -->
                    <li class="nav-item <?= ($activePage == 'users') ? 'active' : ''; ?>">
                        <a class="nav-link" href="./users ">
                            <i class="material-icons">account_circle</i>
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
