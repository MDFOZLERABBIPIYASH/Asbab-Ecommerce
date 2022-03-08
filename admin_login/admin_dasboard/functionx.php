<?php
    function pr($arry){
        echo '<pre>';
        print_r($arry);
    }
    function prx($arry){
        echo '<pre>';
        print_r($arry);
        die();
    }
    function get_safe_value($conn,$str){
        if($str!=''){
            return mysqli_real_escape_string($conn,$str);
        }
    }
    
?>