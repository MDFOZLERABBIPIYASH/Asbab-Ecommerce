<?php
require "top.inc.php";

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $added_on=$_POST['added_on'];
    $password=$_POST['password'];

    
    $sql = "UPDATE users SET name='$name', email='$email',mobile='$mobile',added_on='$added_on',password='$password' WHERE id='$id' ";
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
<div id="addEmployeeModal" class="">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Users</h4>
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
						<input type="submit" name="submit" class="btn btn-success" value="Edit User">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>



<?php
    require "footer.inc.php";
?>