<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "ntsh.jain";
$dbname = "projectdb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if((isset($_POST["name"])) &&(isset($_POST["type"]))){
	if($_POST["type"] == "R"){
		$sql2 = "SELECT * FROM user WHERE username = '" . $_POST['username'] . "'";
		$result = $conn->query($sql2);
		$i = 0;
		while($row = $result->fetch_assoc()){
			$i = $i + 1;
		}
		if($i == 0){
			$sql1 = "INSERT INTO customer (Name, Type) VALUES ('" . $_POST['name'] . "', 'R')";
			if($conn->query($sql1) === TRUE){
				$sql3 = "SELECT ID FROM customer ORDER BY ID DESC LIMIT 1";
				$result = $conn->query($sql3);
				while($row = $result->fetch_assoc()){
					$idreq = $row["ID"];
				}
				$sql4 = "INSERT INTO registeredCustomer (ID, Email, PhoneNo) VALUES (" . strval($idreq) .", '" . $_POST["email"] . "', " . $_POST["phone"] . ")";
				if($conn->query($sql4) === TRUE){
					$sql5 = "INSERT INTO user (username, password, active, Type, TypeId) VALUES ('" . $_POST["username"] . "', '" . md5($_POST["password"]) . "', 0, 'C', ". $idreq . ")";
					if($conn->query($sql5) === TRUE){
						$sql6 = "INSERT INTO customerAddress (ID, HouseNo, Street, City, State, ZIP) VALUES (" . strval($idreq) . ", '" . $_POST["houseno"] . "', '" . $_POST["street"] . "', '" . $_POST["city"] . "', '" . $_POST["state"] . "', " . $_POST["zip"] . ")";
						if($conn->query($sql6) === TRUE){
							$_SESSION["message"] = "Customer added successfully";
						}
						else{
							$_SESSION["message"] = "Something Went Wrong :" . $conn->error;
						}
					}
					else{
						$_SESSION["message"] = "Something Went Wrong :" . $conn->error;
					}
				}
				else{
					$_SESSION["message"] = "Something Went Wrong :" . $conn->error;
				}
			}
			else{
				$_SESSION["message"] = "Something Went Wrong :" . $conn->error;
			}
		}
		else{
			$_SESSION["message"] = "Username already exists";
		}
		$conn->close();
		header("Location: home.php");
	}
	else{
		$sql1 = "INSERT INTO customer (Name, Type) VALUES ('" . $_POST['name'] . "', 'U')";
		if($conn->query($sql1) === TRUE){
			$_SESSION["message"] = "Customer added successfully";
		}
		else{
			$_SESSION["message"] = "Something Went Wrong: " . $conn->error;
		}
	}
}
else{
	$_SESSION["message"] = "Fill in details correctly";
}	
$conn->close();
header("Location: home.php");
?>

