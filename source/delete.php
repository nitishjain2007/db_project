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
if((isset($_POST['delete_id'])) && ($_POST['delete_id']!= '')){
  $delete_id = $_POST['delete_id'];
  if($conn->query("DELETE FROM user WHERE `id`=".$delete_id) === TRUE){
	  if($_POST["typed"] == 'A'){
	  	if($conn->query("DELETE FROM admin where `ID`=".$_POST["typedid"]) === TRUE){
	  		$_SESSION['message'] = "user deleted successfully";
	  	}
	  	else{
	  		$_SESSION['message'] = "something went wrong :" . $conn->error;
	  	}
	  }
	  elseif($_POST["typed"] == 'C'){
	  	if($conn->query("DELETE FROM customerAddress where `ID`=".$_POST["typedid"]) === TRUE){
		  	if($conn->query("DELETE FROM registeredCustomer where `ID`=".$_POST["typedid"]) === TRUE){
		  		if($conn->query("DELETE FROM customer where `ID`=".$_POST["typedid"]) === TRUE){
		  			$_SESSION['message'] = "user deleted successfully";
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
			$_SESSION['message'] = "something went wrong :" . $conn->error;
		}
	  }
	  elseif($_POST["typed"] == 'W'){
	  	if($conn->query("DELETE FROM workersAddress where `ID`=".$_POST["typedid"]) === TRUE){
	  		if($conn->query("DELETE FROM workers where `id`=".$_POST["typedid"]) === TRUE){
	  			$_SESSION['message'] = "user deleted successfully";
	  		}
	  		else{
	  			$_SESSION['message'] = "something went wrong :" . $conn->error;
	  		}
	  	}
	  	else{
	  		$_SESSION['message'] = "something went wrong :" . $conn->error;
	  	}
	  }
	}
	else{
		$_SESSION['message'] = "something went wrong :" . $conn->error;
	}
  header('Location: home.php');
}
?>

