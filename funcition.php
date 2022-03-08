<?php

//for get product detalis
    function get_product_det($conn,$pro_id=''){
        $pro_id=$_GET['id'];



        $sql_pro="SELECT * FROM product  WHERE id='$pro_id' and status=1";
        
        $pro_query=mysqli_query($conn,$sql_pro);
        $data=array();
        while($row=mysqli_fetch_assoc($pro_query)){
            $data[]=$row;
        }
        return $data;
    }



    //for geting product by category
    function get_product_cat($conn,$cat_id=''){
        $cat_id=$_GET['code'];



        $sql_pro="SELECT * FROM product  WHERE cat_id='$cat_id' and status=1 ORDER BY `product`.`id` DESC ";
        
        $pro_query=mysqli_query($conn,$sql_pro);
        $data=array();
        while($row=mysqli_fetch_assoc($pro_query)){
            $data[]=$row;
        }
        return $data;
    }



    //for geting product
    function get_product_type($conn){


        $sql_pro="SELECT * FROM product WHERE status=1 ORDER BY id DESC limit 8";
        
        $pro_query=mysqli_query($conn,$sql_pro);
        $data=array();
        while($row=mysqli_fetch_assoc($pro_query)){
            $data[]=$row;
        }
        return $data;
    }



    //for pick product order by Type[new product, Top Product] and product showing limit
    function get_product($conn,$data){
        $sql_pro="SELECT * FROM product ";
        $pro_query=mysqli_query($conn,$sql_pro);
        $data=array();
        while($row=mysqli_fetch_assoc($pro_query)){
            $data[]=$row;
        }
        return $data;
    }


    // get data for cart

    function getcartdata($conn,$id=''){
    $id=$_POST['add'];
    echo $id;
        $sql="SELECT * FROM product WHERE id='$id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
        return $result;
        }   
    }
?>