<?php

    include "../db.php";
    
//take values
    $name= $_POST['name'];
    $email= $_POST['email'];
    $password=$_POST['password'];
    $repass=$_POST['re_pass'];

    //checking username
    if(empty($name)){
        header("Location: index.php?error= Name is Required");
        exit();
    }

    //checking email
    if(empty($email)){
        header("Email is required");
        exit();
    }

    //checking password
    if(empty($password)){
        header("Location: index.php?error=Password is requied");
        exit();
    }
    
    //checking re-password 
    if($repass!==$password){
        header("Location: index.php?error=Password not Matched");
        exit();
    }

    //checking password equalizatuion
    if($stmt = $conn->prepare('SELECT id, password FROM users WHERE email = ?')){
        $stmt->bind_param('s',$_POST['email']);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows>0){
            header("Location: index.php?error=Email Already Exists. Try Again");
                exit();
        }else{
            if($repass==$password){
                $sql="INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
                $query=mysqli_query($conn,$sql);
                echo "Successfull";
                header("location:../login/index.php");
                /*if($query){
                    if($row= mysqli_fetch_array($query)){
            
                        session_start();
                        $_SESSION['id']=$row['id'];
                        $_SESSION['name']=$row['name'];
                        $_SESSION['password']=$row['password'];
                        
            
                        //header("location:user_account/index.php");
            
                        echo $row['username'] . $row['password'];

                    }*/
            }else{
                header("Location: index.php?error=Password not Matched");
                exit();
                }
        }
    }
?>