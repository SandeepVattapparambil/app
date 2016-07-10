<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['status']);
$_SESSION['status'] = 'success';
header('Location:../index.php?q=logout_success')
 ?>
