<?php

    include('config/db_connect.php');

    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $_password = $_POST['_password'];

    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $_password = mysqli_real_escape_string($conn, $_POST['_password']);
    
    //create sql
    $sql = "INSERT INTO clients(firstName, lastName, phoneNumber, email, password) VALUES('$firstName', '$lastName', '$phoneNumber', '$email', '$_password')";

    //save to DB and check
    if(mysqli_query($conn, $sql)){
        header('Location: login.html');
    }else{
        echo 'Query error' . mysqli_error($conn);
    }

?>

