<?php

include('config/db_connect.php');

if(isset($_POST['submit'])){
   
    $email = $_POST['email'];
    $_password = $_POST['_password'];
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $_password = mysqli_real_escape_string($conn, $_POST['_password']);
    

    // //write query for all the clients
        
        $sql = mysqli_query($conn,
        "SELECT * FROM clients WHERE email = '"
        . $email . "' AND
        password='" . $_password . "'    ");
       
        $num = mysqli_num_rows($sql);
    //    echo gettype($sql);

    //----------------
        //make query and get results
        // $results = mysqli_query($conn, $sql);



        // //fetch the resulting rows as an array
        // $clients = mysqli_fetch_array($results, MYSQL_ASSOC);
        // print_r($clients);
// //-----------------
        if($num > 0) {

            $row = mysqli_fetch_array($sql);
            echo 'You logged in as ' . $email.'.';
            exit();
        }
        else {
            echo 'Email or password is incorrect';
        }
    //free result from memory
    // mysqli_free_result($results);
    //close connection
    mysqli_close($conn);
    }
?>