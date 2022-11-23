<?php
include('config/db_connect.php');
$var = 0;
if(isset($_POST['submit'])){

    $firstName = htmlspecialchars($_POST['firstName']);
    //prevent XSS Attacks
    $email = htmlspecialchars($_POST['email']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $_password = htmlspecialchars($_POST['_password']);
    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);


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
}
?>
