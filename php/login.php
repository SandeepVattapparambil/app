<?php
require_once('db_connection.php');
if(isset($_POST['username']) && isset($_POST['password'])){
  $user_name = $_POST['username'];
  $password = $_POST['password'];
  get_user_record($user_name, $password, $conn, $db_name);
  //login($user_name, $password, $conn, $db_name);
}
else{
  echo "\nNo data found!";
}
function get_user_record($user_name, $password, $conn, $db_name){
  mysqli_select_db($conn, $db_name);
  $sql = "SELECT * FROM user WHERE username='$user_name' AND password='$password'";
  $result = mysqli_query($conn, $sql);//or die('Query:<br />' . $sql . '<br /><br />Error:<br />' . mysql_error());
  $count_rows = mysqli_num_rows($result);
  if($count_rows > 0){
    echo "\nRecord Found";
    while($row = mysqli_fetch_assoc($result)){
      $id = $row['id'];
      $username = $row['username'];
      $password = $row['password'];
    }
  }
  else{
    echo "\nRecord Not Found";
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
