
<?php
        // $current_page ="1";
        // $lowerPage = $current_page - 1;
        // $upperPage= $current_page + 1;
        if(isset($_GET["p"]) && $_GET["p"]!=""){
            $current_page ="";
            $current_page = $_GET["p"];
            $lowerPage = "";
            $upperPage  = "";
            if($current_page !="" && $current_page!=1){
                $lowerPage = $current_page - 1;
            }
            if($current_page!=""){
                $upperPage = $current_page + 1;
            }

        }else{
            $current_page ="1";
            $lowerPage = $current_page - 1;
            $upperPage= $current_page + 1;
        }
?>

        <ul class="pagination justify-content-center justify-content-md-end pagination-primary mx-md-4 my-2">
        <li  rel = "tooltip" title="First" class="page-item <?php if($current_page <= 1){echo "disabled";}?>"><a class="page-link " href="?p=1"><i class="fa fa-angle-double-left"></i></a></li>

        <li  rel = "tooltip" title="Next" class="page-item <?php if($current_page == $pagination ){echo "disabled";}?>"><a class="page-link " href="?p=<?php echo $current_page + 1;?>"><i class="fa fa-angle-right"></i></a></li>
        
        <?php



        for($i=1; $i<=$pagination; $i++){
            
            if($current_page==$i){
                if($current_page!="" && $current_page!=1){
                    echo '<li class="page-item"><a class="page-link " href="?p='.$lowerPage.'">'.$lowerPage.'</a></li>';  
                }

                echo '<li class="page-item active"><a class="page-link " href="?p='.$i.'">'.$i.'</a></li>';
                if($current_page!="" && $current_page!=$pagination){
                    echo '<li class="page-item"><a class="page-link " href="?p='.$upperPage.'">'.$upperPage.'</a></li>';
                }

            }
        }
?>

 <li  rel = "tooltip" title="Previous" class="page-item <?php if($current_page <= 1){echo "disabled";}?>"><a class="page-link " href="?p=<?php echo $current_page - 1;?>"><i class="fa fa-angle-left"></i></a></li>

        <li  rel = "tooltip" title="Last" class="page-item <?php if($current_page == $pagination){echo "disabled";}?>"><a class="page-link " href="?p=<?php echo $pagination;?>"><i class="fa fa-angle-double-right"></i></a></li>
    </ul>
    <p class="text-right mx-4">
        <?php 
        if($current_page!=""){
            echo $current_page;
        }
        ?>
        &nbsp; of &nbsp;

  <?php 
        if($current_page!=""){
            echo $pagination;
        }
        ?>
    </p>
    