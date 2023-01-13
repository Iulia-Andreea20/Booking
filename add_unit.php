<?php
include('config/db_connect.php');

if(isset($_POST['submit'])){
    
    
    //prevent XSS Attacks
    $unitName = htmlspecialchars($_POST['NumeUnitateCazare']);
    $checkIn = htmlspecialchars($_POST['check_in']);
    $checkOut = htmlspecialchars($_POST['check_out']);
    $_location = htmlspecialchars($_POST['Locatie']);
    $unitDescription = htmlspecialchars($_POST['DescriereUnitateCazare']);
    $unitType = htmlspecialchars($_POST['TipUnitateCazare']);


    $unitName = mysqli_real_escape_string($conn, $_POST['NumeUnitateCazare']);
    $checkIn = mysqli_real_escape_string($conn, $_POST['check_in']);
    $_location = mysqli_real_escape_string($conn, $_POST['Locatie']);
    $unitDescription = mysqli_real_escape_string($conn, $_POST['DescriereUnitateCazare']);
    $checkOut = mysqli_real_escape_string($conn, $_POST['check_out']);
    $unitType = mysqli_real_escape_string($conn, $_POST['TipUnitateCazare']);
    
    //create sql
    $sql = "INSERT INTO unitati_cazare(NumeUnitateCazare, 
                        check_in, 
                        check_out, 
                        Locatie, 
                        DescriereUnitateCazare, 
                        TipUnitateCazare)VALUES('$unitName', '$checkIn', '$checkOut', '$_location', '$checkOut', '$unitType')";

    //save to DB and check
    if(mysqli_query($conn, $sql)){
        header('Location: show_units.html');
    }else{
        echo 'Query error' . mysqli_error($conn);
    }
}
?>
