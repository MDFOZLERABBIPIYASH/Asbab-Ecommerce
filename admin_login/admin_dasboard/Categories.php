<?php
	include "top.inc.php";



if(isset($_POST['submit'])){
    $categorie=$_POST['categories'];
    $code=$_POST['code'];
    $status=$_POST['status'];
    $sql_add="INSERT INTO categories(categories,code,status) VALUES ('$categorie','$code','$status')";
    $add_query=mysqli_query($conn,$sql_add);
	header('location:incex.php');
	
	///header not working and confirm form resubmission problem
	
}
?>
<body>
<!--<div id="" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">-->
				<form action="" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Add Categories</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Categorie Name</label>
							<input type="text" name="categories" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Code</label>
							<input type="text" name="code" class="form-control" required>
						</div>
						<div class="form-group">
							<label>status</label>
							<input type="text" name="status" class="form-control" required>*put '0' for Deactive or '1' for Active
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="submit" class="btn btn-success" value="Add Categorie">
					</div>
				</form>
			<!--</div>
		</div>
	</div>-->
</body>
</html>

<?php
	include "footer.inc.php";
?>