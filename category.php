<?php
    require "header.php";
    require "funcition.php";
    $cat_id=$_GET['code'];
?>

    <!-- Start Bradcaump area -->
    <!--Page Header Image start-->
            <div style="background-image: url('images/banner/4.jpg'); background-size: cover; height: 150px;"> 
                             <div style="text-align: center;  height: 150px; padding-top: 60px;">
                                <a class="breadcrumb-item" href="index.html">Home</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">Category</span>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">
                                <?php
                                if(isset($_GET['code'])){
                                    $cat_id=$_GET['code'];
                                    $sql="SELECT * FROM categories WHERE code='$cat_id'";
                                    $query=mysqli_query($conn,$sql); 
                                    if(mysqli_num_rows($query)>0){
                                        foreach($query as $row){
                                            echo $row['categories'];
                                        }
                                    }                                   
                                }
                                ?>
                                </span>
                            </div>
            </div>
    <!--Page Header Image End-->
    <!-- End Bradcaump area -->


    <!-- Start Product Grid -->
    <section class="htc__product__grid bg__white ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="htc__product__rightidebar">
                        <div class="htc__grid__top">
                            <div class="htc__select__option">
                                <select class="ht__select">
                                    <option>Default softing</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by newness</option>
                                </select>
                                <select class="ht__select">
                                    <option>Show by</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by newness</option>
                                </select>
                            </div>
                            <div class="ht__pro__qun">
                                <span>Showing 1-12 of 1033 products</span>
                            </div>
                            <!-- Start List And Grid View -->
                            <ul class="view__mode" role="tablist">
                                <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                            </ul>
                            <!-- End List And Grid View -->
                        </div>
                        <!-- Start Product View -->
                        <div class="row">
                            <div class="shop__grid__view__wrap">
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                    <!-- Start Single Category -->
                            <?php
                                $get_product_cat=get_product_cat($conn);
                                if(count($get_product_cat)>0){
                                foreach($get_product_cat as $list ){
                            ?>
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product-details.php?id=<?php echo $list['id']; ?>">
                                            <img src="admin_login/admin_dasboard/<?php echo $list['img']; ?>" width="300px" height="300px" alt="product images">
                                        </a>
                                    </div>
                                    <!--<div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                            <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                        </ul>
                                    </div>-->
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.php?id=<?php echo $list['id']; ?>"><?php echo $list['name']; ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize"><?php echo '$'.$list['Price']; ?></li>
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
                            } }else{
                                echo "No Product Here";
                            }
                            ?>
                                </div>
                                <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                        <?php
                                            $get_product_cat=get_product_cat($conn);
                                            if(count($get_product_cat)>0){
                                            foreach($get_product_cat as $list ){
                                        ?>
                                    <div class="col-xs-12">
                                        <div class="ht__list__wrap">
                                            <!-- Start List Product -->
                                            
                                            <div class="ht__list__product">
                                                <div class="ht__list__thumb">
                                                    <a href="product-details.php?id=<?php echo $list['id']; ?>"><img src="admin_login/admin_dasboard/<?php echo $list['img']; ?>" height="250px" width="250px"></a>
                                                </div>
                                                <div class="htc__list__details">
                                                    <h2><a href="product-details.php?id=<?php echo $list['id']; ?>"><?php echo $list['name']; ?></a></h2>
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
                                                    <ul class="rating">
                                                        <li><i class="icon-star icons"></i></li>
                                                        <li><i class="icon-star icons"></i></li>
                                                        <li><i class="icon-star icons"></i></li>
                                                        <li class="old"><i class="icon-star icons"></i></li>
                                                        <li class="old"><i class="icon-star icons"></i></li>
                                                    </ul>
                                                    <p><?php echo $list['meta_des']; ?></p>
                                                    <div class="fr__list__btn">
                                                        <a class="fr__btn" href="cart.php">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- End List Product -->
                                        </div>
                                    </div>
                                    <?php } }else{
                                        echo "No Product Found";
                                    }
                                     ?>
                                </div>
                            </div>
                        </div>
                        <!-- End Product View -->
                    </div>
                    <!-- Start Pagenation -->
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="htc__pagenation">
                                <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li> 
                                <li><a href="#">1</a></li> 
                                <li class="active"><a href="#">3</a></li>   
                                <li><a href="#">19</a></li> 
                                <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li> 
                            </ul>
                        </div>
                    </div>
                    <!-- End Pagenation -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grid -->


    <?php
        require "footer.php";
    ?>