<?php
include('config/db_connect.php');

// Delete the last entry from the table
$query = "DELETE FROM unitati_cazare 
ORDER BY IDUnitateCazare 
DESC LIMIT 1";
mysqli_query($conn, $query);

$result = mysqli_query($conn, "SELECT * FROM unitati_cazare");
    
//start an HTML table
echo "<table>";

//output table headers
echo "<tr>
        <th>Name of Unit: </th>
        <th>Location: </th>
        <th>Description: </th>
      </tr>";

//loop through the result set and output the data as table rows
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>".$row['NumeUnitateCazare']."</td>
            <td>".$row['Locatie']."</td>
            <td>".$row['DescriereUnitateCazare']."</td>
          </tr>";
}

//end the HTML table
echo "</table>";

//close the database connection
mysqli_close($conn);


?>

<a class="signup-btn margin-bottom" href="delete_last_entery.php">
        <button class="button-1" role="button">Delete last entery</button>
</a>
<a class="signup-btn margin-bottom" href="form_for_update.html">
        <button class="button-1" role="button">Update entery</button>
</a>
