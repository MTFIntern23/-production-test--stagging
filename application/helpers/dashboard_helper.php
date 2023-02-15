<?php 
    function getPercentage($today,$yesterday){
        if($today==0){
            return 0;
        }else{
            $_percentage_ = (($today-$yesterday)*100/$today);
            return $_percentage_ ;
        }
    }
?>