<?php 
    
    require "header.php";
    require "funcition.php";
    $pro_id=$_GET['id'];
?>

    <!-- Start Bradcaump area -->
    <!--Page Header Image start-->
    <div style="background-image: url('images/banner/4.jpg'); background-size: cover; height: 150px;"> 
                             <div style="text-align: center;  height: 150px; padding-top: 60px;">
                                <a class="breadcrumb-item" href="index.html">Home</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">Product</span>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">
                                <?php
                                if(isset($_GET['id'])){
                                    $cat_id=$_GET['id'];
                                    $sql="SELECT * FROM product WHERE id='$cat_id'";
                                    $query=mysqli_query($conn,$sql); 
                                    if(mysqli_num_rows($query)>0){
                                        foreach($query as $row){
                                            echo $row['name'];
                                        }
                                    }                                   
                                }
                                ?>
                                </span>
                            </div>
            </div>
    <!--Page Header Image End-->
    <!-- End Bradcaump area -->


        <!-- Start Product Details Area -->
        <?php
            $get_product_cat=get_product_det($conn);
            if(count($get_product_cat)>0){
            foreach($get_product_cat as $list ){
        ?>
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <form action="cart.php" method="POST">
                        <div class="row">
                            <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                <div class="htc__product__details__tab__content">
                                    <!-- Start Product Big Images -->
                                    <div class="product__big__images">
                                        <div class="portfolio-full-image tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                                <img src="admin_login/admin_dasboard/<?php echo $list['img']; ?>" height="400px" width="500px" alt="full-image">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product Big Images -->
                                    <!-- Start Small images -->
                                    <ul class="product__small__images" role="tablist">
                                        <li role="presentation" class="pot-small-img active">
                                            <a href="#img-tab-1" role="tab" data-toggle="tab">
                                                <img src="admin_login/admin_dasboard/<?php echo $list['img']; ?>" height="80px" width="106px" alt="small-image">
                                            </a>
                                        </li>
                                        <li role="presentation" class="pot-small-img">
                                            <a href="#img-tab-2" role="tab" data-toggle="tab">
                                                <img src="admin_login/admin_dasboard/<?php echo $list['img']; ?>" height="80px" width="106px" alt="small-image">
                                            </a>
                                        </li>
                                        <li role="presentation" class="pot-small-img">
                                            <a href="#img-tab-3" role="tab" data-toggle="tab">
                                                <img src="admin_login/admin_dasboard/<?php echo $list['img']; ?>" height="80px" width="106px" alt="small-image">
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- End Small images -->
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                                <div class="ht__product__dtl">
                                    <h2><?php echo $list['name']; ?></h2>
                                    
                                    <ul class="rating">
                                        <li><i class="icon-star icons"></i></li>
                                        <li><i class="icon-star icons"></i></li>
                                        <li><i class="icon-star icons"></i></li>
                                        <li class="old"><i class="icon-star icons"></i></li>
                                        <li class="old"><i class="icon-star icons"></i></li>
                                    </ul>
                                    <ul  class="pro__prize">
                                        <li class="old__prize"><?php echo '$'.$list['Price']; ?></li>
                                        <li>
                                            <?php
                                                $sale=$list['sale_price'];
                                                if($sale==0){
                                                }else{
                                                    echo '$'. $sale;
                                                }
                                            ?>
                                        </li>
                                    </ul>
                                    <p class="pro__info"><?php echo $list['meta_des']; ?></p>
                                    <div class="ht__pro__desc">
                                        <div class="sin__desc">
                                            <p><span>Availability:</span> 
                                                <?php
                                                    $qty=$list['qty'];
                                                    if($qty==0){
                                                        echo "Out of Stock";
                                                    }else{
                                                        echo "In Stock";
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="sin__desc">
                                            <p><span>Category:</span> 
                                                    <?php
                                                        if(isset($_GET['id'])){
                                                            $cat_id=$_GET['id'];
                                                            $sql="SELECT * FROM product WHERE id='$cat_id'";
                                                            $query=mysqli_query($conn,$sql); 
                                                            if(mysqli_num_rows($query)>0){
                                                                foreach($query as $row){
                                                                    echo $row['cat_name'];
                                                                }
                                                            }                                   
                                                        }
                                                        ?>
                                            </p>
                                            <div class="cr__btn" style="margin-top: 20px;">
                                                <button type="submit" name="add">Add To Cart</button>
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <!--<a href="cart.php?add=">Add To Cart</a>-->
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                            <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                                <div class="sin__desc product__share__link">
                                    <p><span>Share this:</span></p>
                                    <ul class="pro__share">
                                        <li><a href="#" target="_blank"><i class="icon-social-twitter icons"></i></a></li>

                                        <li><a href="#" target="_blank"><i class="icon-social-instagram icons"></i></a></li>

                                        <li><a href="https://www.facebook.com/Furny/?ref=bookmarks" target="_blank"><i class="icon-social-facebook icons"></i></a></li>

                                        <li><a href="#" target="_blank"><i class="icon-social-google icons"></i></a></li>

                                        <li><a href="#" target="_blank"><i class="icon-social-linkedin icons"></i></a></li>

                                        <li><a href="#" target="_blank"><i class="icon-social-pinterest icons"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        
                        
                    </div>
                </div>
            </div>
            
            <!-- End Product Details Top -->
        </section>
        <?php } } ?>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                            <li role="presentation" class="review"><a href="#review" role="tab" data-toggle="tab">review</a></li>
                            <li role="presentation" class="shipping"><a href="#shipping" role="tab" data-toggle="tab">shipping</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <h4 class="ht__pro__title">Description</h4>
                                    <p><?php echo $list['des']; ?></p>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="review" class="pro__single__content tab-pane fade">
                                <div class="pro__tab__content__inner">
                                    <h4 class="ht__pro__title">Review</h4>
                                    <p><?php echo $list['des']; ?></p>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="shipping" class="pro__single__content tab-pane fade">
                                <div class="pro__tab__content__inner">
                                    <h4 class="ht__pro__title">Shipping</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem</p>
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
        <!-- Start Product Area -->
        <section class="htc__product__area--2 pb--100 product-details-res">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <!-- Start Single Product -->
                        <?php
                            $get_product=get_product_type($conn);
                            foreach($get_product as $list){
                            ?>
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product-details.php?id=<?php echo $list['id']; ?>">
                                            <img src="admin_login/admin_dasboard/<?php echo $list['img']; ?>" width="300px" height="300px" alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.php?id=<?php echo $list['id']; ?>"><?php echo $list['name']; ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize">$<?php echo $list['Price']; ?></li>
                                            <li><?php
                                            $sale=$list['sale_price'];
                                            if($sale==0){
                                            }else{
                                                echo '$'. $sale;
                                            }
                                            ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
<?php
    require "footer.php";
?>