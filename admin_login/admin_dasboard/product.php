<?php
	include "top.inc.php";

	


	//add product
	if(isset($_POST['submit'])){
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
		$status=$_POST['status'];

		$imgname=$img['name'];
		$imgpath=$img['tmp_name'];
		$imgerror=$img['error'];
		if($imgerror==0){
			$destimg= 'media/product/'.$imgname;
			move_uploaded_file($imgpath,$destimg);
			
		}
			
		
		$sql_add="INSERT INTO product (name,product_code,cat_id,cat_name,Price,sale_price,qty,des,srt_des,meta_title,meta_des,meta_key,img,status) VALUES ('$name','$product_code','$cat_id','$cat_name','$Price','$sale_price','$qty','$des','$srt_des','$meta_title','$meta_des','$meta_key','$destimg','$status')";
		$add_query=mysqli_query($conn,$sql_add);
		
	
	
	}
	
	//active/deative_status
		if(isset($_GET['type']) && $_GET['type']!=''){
			$type=$_GET['type'];
			if($type=='status'){
				$operation=$_GET['operation'];
				$id=$_GET['id'];
				if($operation=='active'){
					$status='1';
				}else{
					$status='0';
				}
				$update_status= "UPDATE product SET status='$status' WHERE id='$id'";
				mysqli_query($conn,$update_status);
			}
		}
	//Show User data on admin dashboard
	$sql="SELECT * FROM `product` ORDER BY `product`.`id` DESC";
	$query=mysqli_query($conn,$sql);
	

	//delete_status
	if($type=='delete'){
		$id=$_GET['id'];
		$delete= "DELETE FROM product WHERE id='$id'";
			mysqli_query($conn,$delete);
		}
	
	
?>

<body>
  <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b> Products</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Product</span></a>
						<a href="up-product.php" class="btn btn-success" data-toggle=""><i class="material-icons">&#xE15C;</i> <span>Edit Product</span></a>
						<!--<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete Product</span></a>-->					
					</div>
                </div>
            </div>
            
        </div>
    </div>
	<!-- add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Add Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
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
							<label>Status</label>
							<input type="text" name="status" class="form-control" >*put '0' for Deactive or '1' for Active
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
						<input type="submit" name="submit" class="btn btn-success" value="Add Product">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
<!--	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="GET">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Categories</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	-->
                    
                        <!--<div class="form-group">
							<label>ID</label>
							<input type="text" name="id" class="form-control" required>
						</div>-->
                    
						<!--<div class="form-group">
							<label>Categorie Name</label>
							<input type="text" name="categories" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label>Code</label>
							<input type="text" name="code" class="form-control" >
						</div>
											
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="submit" class="btn btn-info" value="UPDATE">
					</div>
				</form>
			</div>
		</div>
	</div>-->
	<!-- Delete Modal HTML -->
	<!--<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>-->

	
	</div>
    <div class="container">
        <div class="table-wrapper">
            
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Product Name</th>
						<th>Product Code</th>
						<th>Categorie id</th>
						<th>Categorie Name</th>
                        <th>Price</th>
						<th>Sale Price</th>
						<th>Quantity</th>
						<!--<th>Description</th>
						<th>Short Description</th>
						<th>Meta Title</th>
						<th>Meta Description</th>
						<th>Meta Key</th>-->
						<th>Image</th>
						<th>Status</th>
						
                        
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($query)){ ?>
                    <tr>
	
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
						<td><?php echo $row['product_code']; ?></td>
						<td><?php echo $row['cat_id']; ?></td>
						<td><?php echo $row['cat_name']; ?></td>
						<td><?php echo $row['Price']; ?></td>
						<td><?php echo $row['sale_price']; ?></td>
						<td><?php echo $row['qty']; ?></td>
						<td><img src="<?php echo $row['img']; ?>" alt="" height="40px" width="40px"></td>
                        <td><?php if($row['status']==1){
                            /*echo "active";
                        }else{
                            echo "Deactive";

                        }*/
                            echo "<span class='ad' style='border-radius: 6px;
                            /* color: green; */
                            background-color: green;
                            padding: 10px;'><a style='color: #ffffff' href='?type=status&operation=deactive&id=" .$row['id'] . "'>Active</a></span>&nbsp";
                        }else{
                            echo "<span class='ad' style='border-radius: 6px;
                            /* color: green; */
                            background-color: #992f02;;
                            padding: 10px;'><a style='color: #ffffff' href='?type=status&operation=active&id=" .$row['id'] . "'>Deactive</a></span>&nbsp";
                        }
                        //echo "<a href='?type=delete&id=" .$row['id'] . "'>Delete</a>";
                         ?></td>
                        <td>
                            <a href="up-product.php" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>&nbsp;
                            <a href="?type=delete&id=<?php echo $row['id'];  ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
			<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
	

</body>


<?php
	include "footer.inc.php";
?>