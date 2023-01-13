<?php
function updatePassword($oldPass, $newPassword) {
    include('config/db_connect.php');

    $query = "SELECT IDClient 
    FROM clients WHERE _password='$oldPass'";
    
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $id = $row['IDClient'];
        $password =$newPassword;

        $query = "UPDATE clients 
        SET _password='$password'
         WHERE IDClient='$id'";

        mysqli_query($conn, $query);
        mysqli_close($conn);
        header("Location: login.html");
    }else{
        echo "Old password not found in the database";
    }
}

if(isset($_POST['new_password']) && isset($_POST['old_password'])) {
    updatePassword($_POST['old_password'], $_POST['new_password']);
}

?>