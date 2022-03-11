<?php
    require "header.php";
    require "funcition.php";


    

    //for cart product storing and showing
    if(isset($_POST['add'])){
        if(isset($_SESSION['name'])){
            if(in_array($_POST['id'],$_SESSION['cart'])){
                echo "<script>alert('Product is already added...!!')</script>";
            }else{
            // $item_array_id=array_column((array)$_SESSION['cart'],column_key:"id");
            // if(in_array($_POST['id'],$item_array_id)){
            //     echo "<script>alert('Product is already added...!!')</script>";
            // }else{
            //     $count=count((array)$_SESSION['cart']);
            //     $item_array = array(
            //         'id'=>$_POST['id']
            //     );
            //     $_SESSION['cart'][$count]=$item_array;
//echo $_POST['id'];
            array_push($_SESSION['cart'],$_POST['id']);
            
            }
        }else{
            // $item_array = array(
            //     'Pro_id'=>$_POST['id']
            // );
            // $_SESSION['cart'][0]=$item_array;
            // print_r($_SESSION['cart']);
            //echo "nothing........!!!!";
    }
}
    
?>
        <!-- Start Bradcaump area -->
                    <div style="background-image: url('images/banner/4.jpg'); background-size: cover; height: 150px;"> 
                        <div style="text-align: center;  height: 150px; padding-top: 60px;">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">shopping cart</span>
                        </div>
                    </div>
                    </div>
                 </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="mnz.php" method="POST">                            
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <!--<th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>-->
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        if(isset($_SESSION['name'])){
                                            $product_id =  $_SESSION['cart'];
                                            //print_r($_SESSION['cart']);
                                            /*if(count($get_product_cart)>0){*/
                                            
                                                foreach($product_id as $id){
                                                    //echo $id;
                                            $getcartdata= getcartdata($conn,$id);
                                                    //print_r($getcartdata) ;
                                                    //if($row['id']==$id){
                                                        //echo "ok";
                                                    
                                        
                                        ?>
                                    <tbody>
                                        
                                        <tr>
                                            <td class="product-thumbnail"><a href=""><img src="admin_login/admin_dasboard/<?php echo $getcartdata['img']; ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href=""><?php echo $getcartdata['name']; ?></a>
                                                <ul  class="pro__prize">
                                                    <li class="old__prize"><?php echo "$".$getcartdata['Price']; ?></li>
                                                    <li><?php echo "$".$getcartdata['sale_price']; ?></li>
                                                </ul>
                                            </td>
                                            <td class="product-price">
                                                <span class="amount">
                                                    <?php
                                                        $price=$getcartdata['Price'];
                                                        $sale=$getcartdata['sale_price'];
                                                        if($sale>$price){
                                                            echo "$".$sale;
                                                        }else{
                                                            echo "$".$price;
                                                        }
                                                    ?>
                                                </span>
                                            </td>
                                            <!--<td class="product-quantity"><input type="number" value="1" /></td>
                                            <td class="product-subtotal">£165.00</td>-->
                                            <td class="product-remove">
                                                <!-- For delete-->
                                                <input type="hidden" name="id" value="<?php echo $getcartdata['id']; ?>">
                                                <button type="submit" name="remove" id="remove" class="btn btn-danger"><i class="icon-trash icons"></i></button>
                                                
                                                <!--For add wishlist-->
                                                <input type="hidden" name="id" value="<?php echo $getcartdata['id']; ?>">
                                                <button type="submit" class="btn btn-warning"><i class="icon-heart icons"></i></button>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                    <?php
                                            }
                                        //}
                                    
                                }else{
                                    echo "No Product Added Here..!!";
                                }
                                        ?>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="#">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <button type="submit" name="delete" id="delete" style="background: #ebebeb none repeat scroll 0 0;
    color: #3f3f3f;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 500;
    height: 62px;
    line-height: 62px;
    padding: 0 45px;
    margin-right:15px;
    text-transform: uppercase;
    display: inline-block;">Remove All</button>
                                            <a href="#">update</a>
                                            <a href="#">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="ht__coupon__code">
                                        <span>enter your discount code</span>
                                        <div class="coupon__box">
                                            <input type="text" placeholder="">
                                            <div class="ht__cp__btn">
                                                <a href="#">enter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                                    <div class="htc__cart__total">
                                        <h6>cart total</h6>
                                        <div class="cart__desk__list">
                                            <ul class="cart__desc">
                                                <li>product</li>
                                                <li>cart total</li>
                                                <li>tax</li>
                                                <li>shipping</li>
                                            </ul>
                                            <ul class="cart__price">
                                                <li>
                                                    <?php
                                                        if(isset($_SESSION['name'])){
                                                            $count=count($_SESSION['cart']);
                                                            echo $count." Items" ;
                                                        }else{
                                                            echo "0 Items";
                                                        }
                                                    ?>
                                                </li>
                                                <li>$909.00</li>
                                                <li>$9.00</li>
                                                <li>0</li>
                                            </ul>
                                        </div>
                                        <div class="cart__total">
                                            <span>order total</span>
                                            <span>$918.00</span>
                                        </div>
                                        <ul class="payment__btn">
                                            <li class="active"><a href="#">payment</a></li>
                                            <li><a href="#">continue shopping</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        


<?php
    require "footer.php";
?>