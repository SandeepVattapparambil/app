<?php
//Require Database connection configuration file
require_once('db_connection.php');
//Check whether the form data fields are set
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['id'])){
  //Assign values to variables
  $id = $_POST['id'];
  $user_name = $_POST['username'];
  $password = $_POST['password'];
  update_user($id, $user_name, $password, $conn, $db_name);
}
else{
  echo "\nNo data found!";
}
function update_user($id, $user_name, $password, $conn, $db_name){
  echo $id. $user_name. $password;
  mysqli_select_db($conn, $db_name);
  $sql = "UPDATE user SET username = '$user_name', password = '$password' WHERE id = '$id'";
  $result = mysqli_query($conn, $sql)or die('Query:<br />' . $sql . '<br /><br />Error:<br />' . mysql_error());
  if($result){
    echo "\nUpdate successful";
    return;
  }
  else{
    echo "\nUpdate unsuccessful";
    return;
  }
}
?>
