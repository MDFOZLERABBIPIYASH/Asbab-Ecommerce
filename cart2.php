<?php
    require "header.php";
    require "funcition.php";
    
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
                        <form action="cart.php" method="GET">                            
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
                                            $product_id=array_column($_SESSION['cart'],column_key:"id");
                                            $get_product = get_product($conn,$data);
                                                foreach($get_product as $list){
                                                    
                                        
                                        ?>
                                    <tbody>
                                        
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="admin_login/admin_dasboard/<?php echo $row['img']; ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href=""><?php echo $row['name']; ?></a>
                                                <ul  class="pro__prize">
                                                    <li class="old__prize"><?php echo "$".$row['Price']; ?></li>
                                                    <li><?php echo "$".$row['sale_price']; ?></li>
                                                </ul>
                                            </td>
                                            <td class="product-price">
                                                <span class="amount">
                                                    <?php
                                                        $price=$row['Price'];
                                                        $sale=$row['sale_price'];
                                                        if($sale<$price){
                                                            echo "$".$sale;
                                                        }else{
                                                            echo "$".$price;
                                                        }
                                                    ?>
                                                </span>
                                            </td>
                                            <!--<td class="product-quantity"><input type="number" value="1" /></td>
                                            <td class="product-subtotal">??165.00</td>-->
                                            <td class="product-remove">
                                                <button type="submit" class="btn btn-danger"><i class="icon-trash icons"></i></button>
                                                <button type="submit" class="btn btn-warning"><i class="icon-heart icons"></i></button>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                    <?php
                                            }
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