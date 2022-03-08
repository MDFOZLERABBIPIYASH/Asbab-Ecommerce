<?php
    
    include "db.php";

	$username= $_POST['username'];
	$password=$_POST['password'];

    if(empty($username)){
        header("Location: index.php?error=User Name is required");
        exit();
    }
    elseif(empty($password)){
        header("Location: index.php?error=Password is required");
        exit();
    }


	$sql="SELECT * FROM admis_users WHERE username='$username' and password='$password'";
	$query=mysqli_query($conn,$sql);

	if($query){
		if($row= mysqli_fetch_array($query)){

			session_start();
			$_SESSION['id']=$row['id'];
			$_SESSION['username']=$row['username'];
			$_SESSION['password']=$row['password'];
			

			header("location:admin_dasboard/index.php");

			//echo $row['username'] . $row['password'];
		}else{
            header("Location: index.php?error=Incorrect User Name or Password");
            exit();
        }
        /*else{
            header("location:index.php");
			echo "Provied Valied Data";
			//$msg="Provied Valied Data";
		}*/
	}
?>