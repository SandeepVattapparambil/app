<?php
  //Set name of Database host
  $db_host_name = "localhost";
  //Set username for Database host
  $db_host_username = "root";
  //Set password for Database host
  $db_host_password = "";
  //Set name for Database
  $db_name = "nas_media_server";
  // Create connection
  $conn = mysqli_connect($db_host_name, $db_host_username, $db_host_password, $db_name);
  // Check connection
  if(!$conn){
    //Show error if not connected
    die("\nConnection failed: " . mysqli_connect_error());
  }
  //Show message if connection successfull
  echo "\nConnected successfully";
  //mysqli_close($conn);
?>
