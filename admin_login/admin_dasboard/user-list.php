<?php
	require "top.inc.php";

	//add product
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$added_on=$_POST['added_on'];
		$password=$_POST['password'];
		
			
		
		$sql_add="INSERT INTO users (name,email,mobile,added_on,password) VALUES ('$name','$email','$mobile','$added_on','$password')";
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
				$update_status= "UPDATE users SET status='$status' WHERE id='$id'";
				mysqli_query($conn,$update_status);
			}
		}
	//Show User data on admin dashboard
	$sql="SELECT * FROM `users` ORDER BY `users`.`id` DESC";
	$query=mysqli_query($conn,$sql);
	

	//delete_status
	if($type=='delete'){
		$id=$_GET['id'];
		$delete= "DELETE FROM users WHERE id='$id'";
			mysqli_query($conn,$delete);
		}
	
?>


<body>
<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b> Users</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Users</span></a>
						<a href="user-update.php" class="btn btn-success" data-toggle=""><i class="material-icons">&#xE15C;</i> <span>Edit User</span></a>
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
						<h4 class="modal-title">Add Users</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Mobile</label>
							<input type="text" name="mobile" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Added On </label>
							<input type="date" name="added_on" class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>	
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="submit" class="btn btn-success" value="Add User">
					</div>
				</form>
			</div>
		</div>
	</div>

<div class="container">
        <div class="table-wrapper">
            
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Added On</th>
						<th>Password</th>
						<th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($query)){ ?>
                    <tr>
	
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['mobile']; ?></td>
						<td><?php echo $row['added_on']; ?></td>
						<td><?php echo $row['password']; ?></td>
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
                            <a href="user-update.php" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>&nbsp;
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