<?php
    if(isset($_POST['submit'])){
        include_once 'dbh.php'; //Importing connection file
        
        $name =  mysqli_real_escape_string($conn, $_POST['name']);
        $subject =  mysqli_real_escape_string($conn, $_POST['subject']);
        $email = mysqli_real_escape_string($conn, $_POST['e-mail']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        
        //Error handling
        if(empty($name) || empty($subject) || empty($email) || empty($message)){
            echo "Error fill out";
            exit();
        } else { //no error
            $sql = "INSERT INTO Contact (senderName, senderEmail, senderSubject, senderMessage) VALUES ('$name', '$email', '$subject', '$message');";
            mysqli_query($conn, $sql);
            
            header("Location: index.html");
            exit;
        }
    } else {
        exit();
    }
    
?>
