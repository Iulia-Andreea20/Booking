<?php
  // Connect to the database
 include('config/db_connect.php');

  // Get the email provided in the form
  $email = $_POST["email"];

  // Create the DELETE statement
  $query = "DELETE FROM clients 
  WHERE email = '$email'";

  // Execute the DELETE statement
  $result = $conn->query($query);

  // If the DELETE statement was successful, redirect the user to the main page
  if ($result) {
    header("Location: signup.html");
  }
  // If the DELETE statement was not successful, show an error message
  else {
    echo "Error deleting account: " . $conn->error;
  }

  // Close the database connection
  $conn->close();
?>
