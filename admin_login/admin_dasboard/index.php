<?php



require "top.inc.php";
$type='';

if(isset($_POST['submit'])){
    $categorie=$_POST['categories'];
    $code=$_POST['code'];
    $status=$_POST['status'];
    $sql_add="INSERT INTO categories(categories,code,status) VALUES ('$categorie','$code','$status')";
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
            $update_status= "UPDATE categories SET status='$status' WHERE id='$id'";
            mysqli_query($conn,$update_status);
        }
    }
    //SELECT * FROM categories order by categories desc
    $sql="SELECT * FROM `categories` ORDER BY `categories`.`id` DESC";
    $query=mysqli_query($conn,$sql);

//delete_status
if($type=='delete'){
    $id=$_GET['id'];
    $delete= "DELETE FROM categories WHERE id='$id'";
        mysqli_query($conn,$delete);
}


 
?>

  <body>
  <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b> Categories</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Categories</span></a>
						<a href="update.php" class="btn btn-success" data-toggle=""><i class="material-icons">&#xE15C;</i> <span>Edit Categories</span></a>
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
	<div id="deleteEmployeeModal" class="modal fade">
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
	</div>

	
	</div>
    <div class="container">
        <div class="table-wrapper">
            
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						
                        <th>ID</th>
                        <th> Code</th>
						<th>Categories</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($query)){ ?>
                    <tr>
						
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['code']; ?></td>
						<td><?php echo $row['categories']; ?></td>
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
                            <a href="update.php?id=<?php echo $row['id'];  ?>&nbsp;" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>&nbsp;
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