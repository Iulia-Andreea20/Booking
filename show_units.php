<?php
include('config/db_connect.php');
session_start();

$user_id = $_SESSION['user_id'];

$query = "SELECT IDClient FROM clients WHERE IDClient='$user_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$id = $row['IDClient'];

$query = "SELECT * FROM unitati_cazare WHERE IDClient='$id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>
                <h3>Unit's Name: " . $row['NumeUnitateCazare'] . "</h3>
                <p>Location: " . $row['Locatie'] . "</p>
                <p>Check-In: " . $row['check_in'] . "</p>
                <p>Check-Out: " . $row['check_out'] . "</p>";
    }
}
?>