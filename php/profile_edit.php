<?php
//Require Database connection configuration file
require_once('db_connection.php');
mysqli_select_db($conn, $db_name);
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);//or die('Query:<br />' . $sql . '<br /><br />Error:<br />' . mysql_error());
$count_rows = mysqli_num_rows($result);
?>
