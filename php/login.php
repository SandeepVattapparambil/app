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
    $user_record = array();
    $user_record = array_filter($user_record);
    echo "\nRecord Not Found";
  }
  return $user_record;
}
//function to check user for authentication
function check_user($user_name, $password, $user_record){
  if(empty($user_record)){
    echo "\nNo user found";
    session_start();
    $_SESSION['status'] = 'error';
    $url = '../index.php?q=login_error';
    redirect($url);
  }
  else if($user_name = $user_record[1] && $password != $user_record[2]){
    echo "\nUser found but password not a match";
    session_start();
    $_SESSION['status'] = 'warning';
    $url = '../index.php?q=login_warning';
    redirect($url);
  }
  else if($user_name = $user_record[1] && $password = $user_record[2]){
    echo "\nUser & password a match -> Login success";
    session_start();
    $_SESSION['id'] = $user_record[0];
    $_SESSION['user_name'] = $user_record[1];
    $_SESSION['status'] = 'success';
    $url = '../home.php?q=login_success';
    redirect($url);
  }
  return;
}
//function to redirect
function redirect($url){
  header('Location:'.$url.'');
  return;
}
?>
