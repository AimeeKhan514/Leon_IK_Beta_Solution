<?php
if($page_name == "managers" || $page_name =='profile'){
    $table = "admin";
}
if($page_name == "users"){
    $table = "users";
}
if($page_name =='clients' || $page_name =='manage-clients'){
    $table = 'clients';
}
if($page_name =='engineering-consultancy' || $page_name =='manage-engineering-consultancy'){
    $table = 'engineering_consultancy';
}
if($page_name =='industries' || $page_name =='manage-industries'){
    $table = 'industries';
}
if($page_name =='projects' || $page_name =='manage-projects'){
    $table = 'projects';
}
if($page_name =='reviews' || $page_name =='manage-reviews'){
    $table = 'reviews';
}
if($page_name =='teams' || $page_name =='manage-teams'){
    $table = 'teams';
}



?>