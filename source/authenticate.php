<?php
session_start();
require 'connect.php';
if (isset($_POST['username']) and isset($_POST['password'])){
	$password = md5($_POST['password']);
	$query = "SELECT * FROM `user` WHERE username='" . $_POST['username'] . "' and password='" . $password . "'" ;
	$result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);
	if($count == 1){
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['type'] =	 mysql_result($result, 0, "Type");
		$_SESSION['typeid'] = mysql_result($result, 0, "TypeId");
		if($_SESSION['type'] == 'W'){
			$sql = "SELECT * FROM `workers`WHERE id=" . $_SESSION["typeid"];
			$result1 = mysql_query($sql) or die(mysql_error());
			$_SESSION['type2'] = mysql_result($result1, 0, "type");
		}
		header("Location: /home.php");
	}
	else{
		$_SESSION['message'] = "The credentials provided are not authentic";
		echo $password;
		echo "\n";
		echo $query;
		header("Location: login.php");
	}
}
else{
	header("Location: login.php");
}
?>

