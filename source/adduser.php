<?php
session_start();
require 'connect.php';
if((isset($_POST['username'])) && (isset($_POST['password'])) && (isset($_POST['name']))){
	if($_POST['password'] == $_POST['repassword']){
		$sql5 = "SELECT * FROM user WHERE username = '" . $_POST['username'] . "'";
		$query5 = mysql_query($sql5);
		if(mysql_num_rows($query) == 0){
			$query1 = "INSERT INTO admin (name) VALUES ('" . $_POST['name'] . "')";
			$result1 = mysql_query($query1) or die(mysql_error());
			if($result1 == 1){
				$sql3 = "SELECT ID FROM admin ORDER BY ID DESC LIMIT 1";
				$result3 = mysql_query($sql3) or die(mysql_error());
				$idreq = mysql_result($result3, 0, "ID");
				$query = "INSERT INTO user (username, password, active, Type, TypeId) VALUES ('" . $_POST['username'] . "', '" . md5($_POST['password']) . "', 0, 'A', " . $idreq . ")";
				$result = mysql_query($query) or die(mysql_error());
				if($result == 1){
					$_SESSION['message'] = "User Created Successfully";
				}
				else{
					$_SESSION['message'] = "User not created something went wrong";
				}
			}
			else{
				$_SESSION['message'] = "Problem in admin table";
			}
		}
		else{
			$_SESSION["message"] = "Username already exists";
		}
	}
	else{
		$_SESSION['message'] = "Passwords don't match";
	}
}
//$connection->close();
header("Location: home.php?click=getadmin");
?>

