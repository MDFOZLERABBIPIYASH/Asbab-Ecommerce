<?php
require "top.inc.php";



if(isset($_POST['submit'])){
    $categories = $_POST['categories'];
    $id = $_POST['id'];
    $code = $_POST['code'];


    $sql = "UPDATE categories SET categories='$categories', code='$code' WHERE id='$id' ";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "Record Updated Succesfull";
        //header("location:index.inc.php");
    }
    else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT *FROM categories WHERE id=$id";
    $result = $conn->query($sql);

    if($result!==false && $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $categories = $row['categories'];
            $id = $row['id'];
            $code = $row['code'];
            
        }
    }
}

?>
<body>
    	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Categories</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
                    
                        <div class="form-group">
							<label>ID</label>
							<input type="text" name="id" class="form-control" required>
						</div>
                    
						<div class="form-group">
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
	</div>
</body>
<?php

require "footer.inc.php"

?>