<?php
if($page_name =='slider' || $page_name =='manage-slider'){
    $table = 'slider';
}
if($page_name =='categories' || $page_name =='manage-categories'){
    $table = 'categories';
}
if($page_name =='gallery' || $page_name =='manage-gallery'){
    $table = 'gallery';
}
if($page_name == "sub-categories" || $page_name =='manage-sub-categories'){
    $table = "sub_categories";
}
if($page_name == "floating-news" || $page_name =='manage-floating-news'){
    $table = "floating_news";
}
if($page_name == "page-meta" || $page_name =='manage-page-meta'){
    $table = "page_meta";
}
if($page_name == "products" || $page_name =='manage-products'){
    $table = "product";
}
if($page_name == "managers" || $page_name =='profile'){
    $table = "admin";
}
if($page_name == "users"){
    $table = "users";
}
if($page_name == "orders"){
    $table = "orders";
}
if($page_name == "page-name" || $page_name =='manage-page-name'){
    $table = "page_name";
}
if($page_name == "subscriptions"){
    $table = "subscription";
}
if($page_name == "unique-visitors"){
    $table = "visitors_unique";
}
if($page_name =='coupon' || $page_name =='manage-coupon'){
    $table = 'coupons';
}
if($page_name =='color' || $page_name =='manage-color'){
    $table = 'colors';
}
if($page_name =='size' || $page_name =='manage-size'){
    $table = 'size';
}
if($page_name =='brands' || $page_name =='manage-brands'){
    $table = 'brands';
}
if($page_name =='offers' || $page_name =='manage-offers'){
    $table = 'offers';
}
if($page_name =='lightbox' || $page_name =='manage-lightbox'){
    $table = 'lightbox';
}


// if(isset($_GET["type"]) && $_GET["type"]=="edit"){
//     if(isset($_GET["pi"]) && $_GET["pi"]!="" && $_GET["pi"]>0){
//     $table = "product_images";
// }
// }

?>