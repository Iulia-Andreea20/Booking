<?php
    //connect to the database
    include('config/db_connect.php');
    
    //retrieve data from the users table
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


<!-- HTML !-->

<a class="signup-btn margin-bottom" href="delete_last_entery.php">
        <button class="button-1" role="button">Delete last entery</button>
</a>
<a class="signup-btn margin-bottom" href="form_for_update.html">
        <button class="button-1" role="button">Update entery</button>
</a>



