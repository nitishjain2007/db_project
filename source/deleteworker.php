<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "ntsh.jain";
$dbname = "projectdb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $_SESSION['message'] = $conn->connect_error;
    header('Location: home.php');
}
if(isset($_POST['delete_id'])){
  $delete_id = $_POST['delete_id'];
  	if($conn->query("DELETE FROM  user WHERE `Type` = 'W' AND `TypeId` = " . $delete_id)){
  		if($conn->query("DELETE FROM workers WHERE `id` = " . $delete_id)){
  			$_SESSION['message'] = "Worker Deleted Successfully";
  		}
  		else{
  			$_SESSION['message'] = "something went wrong :" . $conn->error;
  		}
  	}
	else{
	  	$_SESSION['message'] = "something went wrong :" . $conn->error;
	}
}
else{
	$_SESSION['message'] = "Something Went Extremely Wrong";
}
header('Location: home.php');
?>
