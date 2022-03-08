<?php

    require "db.php";
    session_start();

    if(isset($_GET['add'])){
        $add=$_GET['add'];
        $sql="SELECT * FROM product WHERE id='$add'";
        echo "asd" ;
        
        if(isset($_SESSION['cart'])){
            echo "cart added";
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=                          
            print_r($_SESSION['cart']);
        }else{
            $_SESSION['cart'][0]=array('name'=>'Shampoo','price'=>'500','QTy'=>'1');
            print_r($_SESSION['cart']);
        }
    }

?>