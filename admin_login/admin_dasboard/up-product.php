<?php
require "top.inc.php";



if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name=$_POST['name'];
    $product_code=$_POST['product_code'];
    $cat_id=$_POST['cat_id'];
	$cat_name=$_POST['cat_name'];
    $Price=$_POST['Price'];
    $sale_price=$_POST['sale_price'];
    $qty=$_POST['qty'];
    $des=$_POST['des'];
    $srt_des=$_POST['srt_des'];
    $meta_title=$_POST['meta_title'];
    $meta_des=$_POST['meta_des'];
    $meta_key=$_POST['meta_key'];
    $img=$_FILES['img'];
    
	//print_r($img);
	$imgname=$img['name'];
	$imgpath=$img['tmp_name'];
	$imgerror=$img['error'];
	if($imgerror==0){
		$destimg= 'media/product/'.$imgname;
		move_uploaded_file($imgpath,$destimg);
		
	}
    
    $sql = "UPDATE product SET name='$name', product_code='$product_code',cat_id='$cat_id',cat_name='$cat_name',Price='$Price',sale_price='$sale_price',qty='$qty',des='$des',srt_des='$srt_des',meta_title='$meta_title',meta_des='$meta_des',meta_key='$meta_key',img='$destimg' WHERE id='$id' ";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "Record Updated Succesfull";
        //header("up-product.php");
    }
    else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}



?>
<body>
    <!-- add Modal HTML -->
	<div id="addEmployeeModal" class="">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
                        <div class="form-group">
							<label>ID</label>
							<input type="text" name="id" class="form-control" required>
						</div>					
						<div class="form-group">
							<label>Product Name</label>
							<input type="text" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Product Code</label>
							<input type="text" name="product_code" class="form-control" >
						</div>
						
						<div class="form-group">
							<label>Categorie Name</label>
							<Select class="form-control" name="cat_name" required>
								<option value="">Select Categorie</option>
								<?php 
									$sqlpd="SELECT * FROM `categories` ORDER BY `categories`.`categories` ASC";
									$res=mysqli_query($conn,$sqlpd);
									while($row=mysqli_fetch_assoc($res)){
										echo "<option value=".$row['categories'].">".$row['categories']."</option>" ;
									}
								?>
							</Select>
							
						</div>

						<div class="form-group">
							<label>Categorie id</label>
							<Select class="form-control" name="cat_id">
								<option value="">Select Categorie</option>
								<?php 
									$sqlpd="SELECT * FROM `categories` ORDER BY `categories`.`code` DESC";
									$res=mysqli_query($conn,$sqlpd);
									while($row=mysqli_fetch_assoc($res)){
										echo "<option value=".$row['code'].">".$row['categories']."</option>" ;
									}
								?>
							</Select>
							
						</div>
							
						<div class="form-group">
							<label>Price</label>
							<input type="text" name="Price" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Sale Price</label>
							<input type="textt" name="sale_price" class="form-control">
						</div>
						<div class="form-group">
							<label>Quantity</label>
							<input type="text" name="qty" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea name="des" id="" class="form-control" cols="30" rows="10"></textarea>
							
						</div>
						<div class="form-group">
							<label>Short Description</label>
							<textarea name="srt_des" id="" class="form-control" cols="30" rows="10"></textarea>
							
						</div>
						<div class="form-group">
							<label>Meta Title</label>
							<input type="text" name="meta_title" class="form-control">
						</div>
						<div class="form-group">
							<label>Meta Description</label>
							<textarea name="meta_des" id="" class="form-control" cols="30" rows="10"></textarea>
							
						</div>
						
						<div class="form-group">
							<label>Meta Key</label>
							<input type="text" name="meta_key" class="form-control" >
						</div>
						<div class="form-group">
							<label>Product Image</label>
							<input type="file" name="img" class="form-control">
							
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<a href="product.php"><input type="submit" name="submit" class="btn btn-success" value="Edit Product"></a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php

    require "footer.inc.php"

?>