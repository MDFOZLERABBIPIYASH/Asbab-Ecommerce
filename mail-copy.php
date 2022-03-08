<?php
   require "db.php";
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
			$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $mobile = trim($_POST["mobile"]);
        $message = trim($_POST["query"]);

        $sql="INSERT * INTO contact (name,email,mobile,query) VALUES ($name,$email,$mobile,$message)";
        $query=mysqli_query($conn,$sql);
        echo $query;
        // Check that data was sent to the mailer.
        /*if ( empty($name) OR empty($subject) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Please complete the form and try again.";
            exit;
        }*/
    }else{
        echo "No Massage sent";
    }
        
?>
