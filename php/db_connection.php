<?php
  $db_host_name = "localhost";
  $db_host_username = "root";
  $db_host_password = "";
  $db_name = "nas_media_server";
  // Create connection
  $conn = mysqli_connect($db_host_name, $db_host_username, $db_host_password, $db_name);
  // Check connection
  if (!$conn) {
      die("\nConnection failed: " . mysqli_connect_error());
  }
    echo "\nConnected successfully";
    //mysqli_close($conn);
?>
