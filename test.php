<?php
require "header.php";

    //for geting product by category
    function get_product_cat($conn,$cat_id=''){
        $cat_id=1127;



        $sql_pro="SELECT * FROM product  and cat_id='$cat_id'  WHERE status=1 ORDER BY id DESC limit 2";
        //$sql_pro="SELECT * FROM product WHERE cat_id='$cat_id' ";
        //for category id
        /*if($cat_id!=''){
            $cat_id_sql="and code='$cat_id'";
        }*/

        //for type
        /*if($type=='latest'){
            $sql=" ORDER BY id DESC";
        }*/

        //for limit
        /*if($limit!=''){
            $sql=" and limit $limit";
        }*/

        $pro_query=mysqli_query($conn,$sql_pro);
        $data=array();
        while($row=mysqli_fetch_assoc($pro_query)){
            $data[]=$row;
        }
        return $data;
    }
?>

<?php
                            $get_product_cat=get_product_cat($conn);
                            foreach($get_product_cat as $list){
                            ?>
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product-details.php?id=<?php echo $list['id']; ?>">
                                            <img src="admin_login/admin_dasboard/<?php echo $list['img']; ?>" width="290px" height="385px" alt="product images">
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
                                        <h4><a href=""><?php echo $list['name']; ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize">$<?php echo $list['Price']; ?></li>
                                            <li>$<?php echo $list['sale_price']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
                            <?php
                            }
                            ?>