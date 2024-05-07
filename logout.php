
	<?php 
session_start();
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['age']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['role']);
unset($_SESSION['satus']);
if(!isset($_SESSION['fname'])||!isset($_SESSION['lname'])||!isset($_SESSION['age'])||!isset($_SESSION['username'])||!isset($_SESSION['password'])||!isset($_SESSION['satus']))
header("location:index.php");
?>
