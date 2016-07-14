<?php
//Require Database connection configuration file
require_once('db_connection.php');
//Check whether the form data fields are set
if(!empty($_POST['title']) && !empty($_POST['name']))){
  $user_name = strip_tags($_POST['name']);
  mysqli_select_db($conn, $db_name);
  $sql = "SELECT * FROM user WHERE username='$user_name'";
  $result = mysqli_query($conn, $sql)or die('Query:<br />' . $sql . '<br /><br />Error:<br />' . mysql_error());
  $count_rows = mysqli_num_rows($result);
  if($count_rows > 0){
    $data = 'error';
    echo(json_encode($data));
  }
  else{
    $data = 'success';
    echo(json_encode($data));
  }
}
else{
  $data = 'No data recieved';
  echo (json_encode($data));
}
?>
