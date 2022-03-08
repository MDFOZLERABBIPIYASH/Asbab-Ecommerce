<?php
    require "db.php";
    session_start();
    
    /*if(!isset($_SESSION['name'])){
        header("../index.php");
        exit();
    }*/

    //show chategoris in menu
     //SELECT * FROM categories order by categories desc
     $sql="SELECT * FROM `categories` WHERE status=1 ORDER BY `categories`.`code` DESC";
     $query=mysqli_query($conn,$sql);
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Asbab - eCommerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <li class="drop"><a>Category</a>
                                            <ul class="dropdown mega_dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="">Category</a>
                                                    <ul class="mega__item">
                                                    <?php while($row=mysqli_fetch_assoc($query)){ ?>
                                                        <li><a href="category.php?code=<?php echo $row['code']; ?>"><?php echo $row['categories']; } ?> </a></li>
                                                         
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <!--<li class="drop"><a href="#">women</a>
                                            <ul class="dropdown mega_dropdown">-->
                                                <!-- Start Single Mega MEnu -->
                                                <!--<li><a class="mega__title" href="product-grid.html">Shop Pages</a>
                                                    <ul class="mega__item">
                                                        <li><a href="product-grid.html">Product Grid</a></li>
                                                        <li><a href="cart.html">cart</a></li>
                                                        <li><a href="checkout.html">checkout</a></li>
                                                        <li><a href="wishlist.html">wishlist</a></li>
                                                    </ul>
                                                </li>-->
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <!--<li><a class="mega__title" href="product-grid.html">Variable Product</a>
                                                    <ul class="mega__item">
                                                        <li><a href="#">Category</a></li>
                                                        <li><a href="#">My Account</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="cart.html">Shopping Cart</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                    </ul>
                                                </li>-->
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <!--<li><a class="mega__title" href="product-grid.html">Product Types</a>
                                                    <ul class="mega__item">
                                                        <li><a href="#">Simple Product</a></li>
                                                        <li><a href="#">Variable Product</a></li>
                                                        <li><a href="#">Grouped Product</a></li>
                                                        <li><a href="#">Downloadable Product</a></li>
                                                        <li><a href="#">Simple Product</a></li>
                                                    </ul>
                                                </li>-->
                                                <!-- End Single Mega MEnu 
                                            </ul>
                                        </li>-->
                                        <!--<li class="drop"><a href="#">men</a>
                                            <ul class="dropdown mega_dropdown">-->
                                                <!-- Start Single Mega MEnu -->
                                                <!--<li><a class="mega__title" href="product-grid.html">Shop Pages</a>
                                                    <ul class="mega__item">
                                                        <li><a href="product-grid.html">Product Grid</a></li>
                                                        <li><a href="cart.html">cart</a></li>
                                                        <li><a href="checkout.html">checkout</a></li>
                                                        <li><a href="wishlist.html">wishlist</a></li>
                                                    </ul>
                                                </li>-->
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <!--<li><a class="mega__title" href="product-grid.html">Variable Product</a>
                                                    <ul class="mega__item">
                                                        <li><a href="#">Category</a></li>
                                                        <li><a href="#">My Account</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="cart.html">Shopping Cart</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                    </ul>
                                                </li>-->
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <!--<li><a class="mega__title" href="product-grid.html">Product Types</a>
                                                    <ul class="mega__item">
                                                        <li><a href="#">Simple Product</a></li>
                                                        <li><a href="#">Variable Product</a></li>
                                                        <li><a href="#">Grouped Product</a></li>
                                                        <li><a href="#">Downloadable Product</a></li>
                                                        <li><a href="#">Simple Product</a></li>
                                                    </ul>
                                                </li>-->
                                                <!-- End Single Mega MEnu
                                            </ul>
                                        </li>-->
                                        <!--<li class="drop"><a href="">Product</a>
                                            <ul class="dropdown">
                                                <li><a href="product-grid.php">Product Grid</a></li>
                                                <li><a href="product-details.php">Product Details</a></li>
                                            </ul>
                                        </li>-->
                                        <li class="drop"><a href="blog.php">Blog</a>
                                            <!--<ul class="dropdown">
                                                <li><a href="blog.php">Blog Grid</a></li>
                                                <li><a href="blog-details.php">Blog Details</a></li>
                                            </ul>-->
                                        </li>
                                        <!--<li class="drop"><a href="">Pages</a>
                                            <ul class="dropdown">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                                <li><a href="cart.html">Cart page</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                                <li><a href="product-grid.html">product grid</a></li>
                                                <li><a href="product-details.html">product details</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                            </ul>
                                        </li>-->
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.html">Home</a></li>
                                            <!--<li class="drop"><a href="">Product</a>
                                                <ul class="dropdown">
                                                    <li><a href="product-grid.php">Product Grid</a></li>
                                                    <li><a href="product-details.php">Product Details</a></li>
                                                </ul>
                                            </li>-->
                                            <li class="drop"><a href="">Blog</a>
                                                <ul class="dropdown">
                                                    <li><a href="blog.php">Blog Grid</a></li>
                                                    <!--<li><a href="blog-details.php">Blog Details</a></li>-->
                                                </ul>
                                            </li>
                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <?php
                                    
                                        if(isset($_SESSION['name'])){
                                            echo '<div >
                                                    <nav class="main__menu__nav hidden-xs hidden-sm"> 
                                                        <ul class="main__menu">   
                                                            
                                                            <li class="drop"><a href=""><i class="icon-user icons"></i></a>
                                                                <ul class="dropdown">
                                                                    <li><a href="./user_account/index.php">Profile</a></li>
                                                                    <li><a href="./user_account/order.php">Order</a></li>
                                                                    <li><a href="./user_account/wishlist.php">Wishlist</a></li>
                                                                    <li><a href="./user_account/logout.php">Logout</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>' ;
                                            }else{
                                                echo '<div >
                                                    <nav class="main__menu__nav hidden-xs hidden-sm"> 
                                                        <ul class="main__menu">   
                                                            
                                                            <li class="drop"><a href=""><i class="icon-user icons"></i></a>
                                                                <ul class="dropdown">
                                                                    <li><a href="./login/index.php">Login</a></li>
                                                                    <li><a href="./signup/index.php">Register</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>' ;
                                            }
                                        ?>
                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="cart.php"><i class="icon-handbag icons"></i></a>
                                        <a href="#"><span class="htc__qua">2</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/1.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$105.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">Brone Candle</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$25.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">$130.00</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.html">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->