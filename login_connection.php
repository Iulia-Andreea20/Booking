<?php

include('config/db_connect.php');

if(isset($_POST['submit'])){
   
    $email = htmlspecialchars($_POST['email']);
    $_password = htmlspecialchars($_POST['_password']);
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $_password = mysqli_real_escape_string($conn, $_POST['_password']);
    

    // //write query for all the clients
        
        $sql = mysqli_query($conn,
        "SELECT * FROM clients WHERE email = '"
        . $email . "' AND
        password='" . $_password . "'    ");
       
        $num = mysqli_num_rows($sql);

        if($num > 0) {

            $row = mysqli_fetch_array($sql);
            echo 'You logged in as ' . $email.'.';
            exit();
        }
        else {
            echo 'Email or password is incorrect';
        }

    //close connection
    mysqli_close($conn);
    }
?>