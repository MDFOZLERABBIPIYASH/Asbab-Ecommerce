<?php
    require "header.php";
    require "funcition.php";

    if(isset($_POST['add'])){
       // print_r($_POST['id']);
       

        if(isset($_SESSION['cart'])){
            $column=$_POST['id'];
            $item_array_id=array_column($_SESSION['cart'],$column."id");
            $count=count($_SESSION['cart']);
            $item_array = array(
                'id'=>$_POST['id']
            );
            $_SESSION['cart'][$count]=$item_array;
            $item_array = array(
                'Pro_id'=>$_POST['id']
            );
            //$_SESSION['cart'][0]=$item_array;
            print_r($_SESSION['cart']);
            

            
        }else{
            $item_array = array(
                'Pro_id'=>$_POST['id']
            );
            $_SESSION['cart'][0]=$item_array;
            print_r($_SESSION['cart']);
            echo "nothing........!!!!";
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
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $result= getcartdata($conn);
                                        while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="admin_login/admin_dasboard/<?php echo $row['img']; ?>" height="230px" width="385px" alt=""></a></td>
                                            <td class="product-name"><a href=""><?php echo $row['name']; ?></a>
                                                <ul  class="pro__prize">
                                                    <li class="old__prize"><?php echo "$".$row['Price']; ?></li>
                                                    <li><?php echo "$".$row['sale_price']; ?></li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount">£165.00</span></td>
                                            <td class="product-quantity"><input type="number" value="1" /></td>
                                            <td class="product-subtotal">£165.00</td>
                                            <td class="product-remove"><a href="#"><i class="icon-trash icons"></i></a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
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
                                                <li>cart total</li>
                                                <li>tax</li>
                                                <li>shipping</li>
                                            </ul>
                                            <ul class="cart__price">
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
        <!-- Start Brand Area -->
        <div class="htc__brand__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">
                            <ul class="brand__list owl-carousel clearfix">
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/3.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/4.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Area -->
        <!-- Start Banner Area -->
        <div class="htc__banner__area">
            <ul class="banner__list owl-carousel owl-theme clearfix">
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
            </ul>
        </div>
        <!-- End Banner Area -->
        <!-- End Banner Area -->

<?php
    require "footer.php";
?>