<?php 
    function getPercentage($today,$yesterday){
        $_percentage_ = (($today-$yesterday)*100/$today);
        return $_percentage_;
    }
?>