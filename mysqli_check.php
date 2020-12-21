<?php

// Create connection
$conn = mysqli_connect("mysql", "root", "password", "mydb");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  
  $sql = "SELECT * FROM employee";
  
  if ($result = mysqli_query($con, $sql)) {
    // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {
      printf ("%s (%s)\n", $row[0], $row[1]);
    }
    mysqli_free_result($result);
  }
  
  mysqli_close($con);
?>