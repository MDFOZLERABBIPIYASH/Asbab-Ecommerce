<?php
	include "top.inc.php";
	$sql="SELECT * FROM `contact` ORDER BY `contact`.`id` DESC";
    $query=mysqli_query($conn,$sql);

	//delete_status
	if($type=='delete'){
		$id=$_GET['id'];
		$delete= "DELETE FROM contact WHERE id='$id'";
			mysqli_query($conn,$delete);
	}
    
?>
<body>
<div class="container">
        <div class="table-wrapper">
            
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						
                        <th>ID</th>
                        <th> Name</th>
						<th>Email</th>
						<th>Query</th>
						<th>Mobile</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($query)){ ?>
                    <tr>
						
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['query'];?></td>
						<td><?php echo $row['mobile'];?></td>
                        <td>
                            <!--<a href="update.php?id=<?php //echo $row['id'];  ?>&nbsp;" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>&nbsp;-->
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