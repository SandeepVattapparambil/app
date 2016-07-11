<?php
//Require Database connection configuration file
require_once('db_connection.php');
//Check whether the form data fields are set
if(isset($_POST['username'])){
  $user_name = strip_tags($_POST['username']);
  mysqli_select_db($conn, $db_name);
  $sql = "SELECT * FROM user WHERE username='$user_name'";
  $result = mysqli_query($conn, $sql)or die('Query:<br />' . $sql . '<br /><br />Error:<br />' . mysql_error());
  $count_rows = mysqli_num_rows($result);
  if($count_rows > 0){
    return 1;
  }
  else{
    return 0;
  }
}
?>
