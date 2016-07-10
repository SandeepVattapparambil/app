<?php
//Require Database connection configuration file
require_once('db_connection.php');
//Check whether the form data fields are set
if(isset($_POST['username']) && isset($_POST['password'])){
  //Assign values to variables
  $user_name = $_POST['username'];
  $password = $_POST['password'];
  //Get user record based on form data
  $user_record = get_user_record($user_name, $conn, $db_name);
  //Check authentication
  check_user($user_name, $password, $user_record);
}
else{
  //User record not found
  echo "\nNo data found!";
}
//function to get user record
function get_user_record($user_name, $conn, $db_name){
  mysqli_select_db($conn, $db_name);
  $sql = "SELECT * FROM user WHERE username='$user_name'";
  $result = mysqli_query($conn, $sql);//or die('Query:<br />' . $sql . '<br /><br />Error:<br />' . mysql_error());
  $count_rows = mysqli_num_rows($result);
  if($count_rows > 0){
    echo "\nRecord Found";
    $user_record = array();
    while($row = mysqli_fetch_assoc($result)){
      $id = $row['id'];
      $username = $row['username'];
      $password = $row['password'];
    }
    $user_record = array($id, $username, $password);
    //echo count($user_record);
  }
  else{
    $user_record = array(0,0,0);
    echo "\nRecord Not Found";
  }
  return $user_record;
}
//function to check user for authentication
function check_user($user_name, $password, $user_record){
  if($user_name != $user_record[1]){
    echo "\nNo user found";
  }
  if($user_name == $user_record[1] && $password != $user_record[2]){
    echo "\nUser found but password not a match";
  }
}

function login($user_name, $password, $conn, $db_name){
  mysqli_select_db($conn, $db_name);
  $sql = "SELECT * FROM user WHERE username='$user_name' AND password='$password'";
  $result = mysqli_query($conn, $sql);//or die('Query:<br />' . $sql . '<br /><br />Error:<br />' . mysql_error());
  $count_rows = mysqli_num_rows($result);
  if($count_rows > 0) {
    session_start();
    $_SESSION['user_name'] = $user_name;
    $_SESSION['login'] = 1;
    header('location:../home.php');
  }
  else{
    session_start();
    $_SESSION['error'] = 1;
    header('location:../index.php?login=error');
  }
}
?>
