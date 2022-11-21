<?php
//Connect to the database
$conn = mysqli_connect('localhost', 'admin', 'admin', 'booking');

//Check connection
if(!$conn){
    echo 'Connection error' . mysqli_connect_error();
}
?>