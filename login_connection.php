<?php

include('config/db_connect.php');

if(isset($_POST['submit'])){
   
    //prevent XSS Attacks
    $email = htmlspecialchars($_POST['email']);
    $_password = htmlspecialchars($_POST['_password']);
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $_password = mysqli_real_escape_string($conn, $_POST['_password']);
    

    // //write query for all the clients
        
        $sql = mysqli_query($conn,
        "SELECT * FROM clients WHERE email = '"
        . $email . "' AND
        _password='" . $_password . "'    ");
       
        $num = mysqli_num_rows($sql);

        if($num > 0) {

            $row = mysqli_fetch_array($sql);
            header('Location: mainpage.html');
            echo "You're Sign In as '". $email;
            exit();
        }
        else {
            echo 'Email or password is incorrect';
        }

    mysqli_close($conn);
    }
?>