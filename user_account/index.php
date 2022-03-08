<?php
    include "../db.php";
    session_start();
    if(!isset($_SESSION['name'])){
        header("../index.php");
        exit();
    }
    
?>
<h1>
<?php
echo $_SESSION['name'];
?>
</h1>
<h4>This is user page</h4>
<a href="../index.php"><h2>Go to Home</h2></a>
<a href="logout.php">logout</a>