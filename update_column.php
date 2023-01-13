<?php
    include('config/db_connect.php');
    if(isset($_POST['column']) && isset($_POST['value'])) {
        $column = $_POST['column'];
        $newValue = $_POST['value'];
        // Get the latest entry's id

        $query = "SELECT IDUnitateCazare 
        FROM unitati_cazare 
        ORDER BY IDUnitateCazare 
        DESC LIMIT 1";
        
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $id = $row['IDUnitateCazare'];

        // Update the selected column with the new value
        $query = "UPDATE unitati_cazare 
        SET $column='$newValue' 
        WHERE IDUnitateCazare='$id'";

        mysqli_query($conn, $query);
        mysqli_close($conn);
        header('Location: form_for_update.html');
        
    }
?>