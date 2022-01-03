<?php
$page_name = basename($_SERVER['PHP_SELF'], ".php");
function pr($arr)
{
    echo "<pre>";
    print_r($arr);
}
function prx($arr)
{
    echo "<pre>";
    print_r($arr);
    die();
}
function getSaveValue($con, $str)
{
    if ($str != "") {
        $str = trim($str);
        $str = htmlentities($str);
        return mysqli_real_escape_string($con, $str);
    }
}
function getTableData($con, $table, $orderBy=""){
    $sql = " SELECT * FROM `$table` WHERE `status`='1' ";
    if($orderBy==""){
        $sql.=" ORDER BY `id` ASC ";
    }else{
        $sql.=" ORDER BY `id` $orderBy ";
    }
    $res = mysqli_query($con, $sql);
    // $getTableData = array();
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
           $getTableData[] = $row;
        }
        return  $getTableData;
    }


}





?>