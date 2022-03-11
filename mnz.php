
<?php
require "header.php";
    //for delete cart product
    if(isset($_POST['remove'])){
        foreach($_SESSION['cart'] as $key=>$value){
            if($value['id'] == $_POST['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product is Removed...!!')</script>";
                echo "<script>window.location='cart.php'</script>";
            }else{
                echo "<script>alert('Product is Not Removed...!!')</script>";
                echo "<script>window.location='cart.php'</script>";
            }
        }    
    }


        //for cart product storing and showing
        if(isset($_POST['add'])){
            if(isset($_SESSION['name'])){
                if(isset($_SESSION['cart'])){
                    $item_array_id=array_column($_SESSION['cart'],column_key:"id");
                    //print_r($item_array_id);
                    if(in_array($_POST['id'],$item_array_id)){
                        echo "<script>alert('Product is already added...!!')</script>";
                    }else{
                        $xid=$_POST['id'];
                        $name=$_POST['name'];
                        $price=$_POST['price'];
                        $img=$_POST['img'];
                        $sql_add="INSERT INTO cart (name,price,img,xid) VALUES ('$name','$price','$img','$xid')";
                        $add_query=mysqli_query($conn,$sql_add);
                        echo "Cart Added..!!";

                        $count=count($_SESSION['cart']);
                        $item_array = array(
                            'id'=>$_POST['id']
                        );
                        $_SESSION['cart'][$count]=$item_array;
                    }
                }else{
                    $item_array = array(
                        'Pro_id'=>$_POST['id']
                    );
                    $_SESSION['cart'][0]=$item_array;
                    print_r($_SESSION['cart']);
                    echo "nothing........!!!!";
            }
        }
    }
?>