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
if((isset($_POST['name'])) && (isset($_POST['type'])) && (isset($_POST['username'])) && (isset($_POST['password']))){
	if($_POST["password"] == $_POST["repassword"]){
		$sql3 = "SELECT * FROM user WHERE username = '" . $_POST['username'] . "'";
		$result = $conn->query($sql3);
		$i = 0;
		while($row = $result->fetch_assoc()){
			$i = $i + 1;
		}
		if($i == 0){
				$sql2 = "INSERT INTO workers (name, emailid, phoneno, salary, type) VALUES ('" . $_POST['name'] . "', '" . $_POST["email"] . "', '" . $_POST["phone"] . "', " . $_POST['salary'] . ", '" . $_POST["type"] . "')";
				if($conn->query($sql2) === TRUE){
					$sql3 = "SELECT ID FROM workers ORDER BY ID DESC LIMIT 1";
					$result = $conn->query($sql3);
					while($row = $result->fetch_assoc()){
						$idreq = $row["ID"];
					}
					$sql5 = "INSERT INTO workersAddress (ID, HouseNo, Street, City, State, ZIP) VALUES (" . strval($idreq) . ", '" . $_POST["houseno"] . "', '" . $_POST["street"] . "', '" . $_POST["city"] . "', '" . $_POST["state"] . "', '" . $_POST["zip"] . "')";
					if($conn->query($sql5) === TRUE){
						$sql1 = "INSERT INTO user (username, password, active, Type, TypeId) VALUES ('" . $_POST["username"] . "', '" . md5($_POST["password"]) . "', 0, 'W', " . $idreq . ")";
						if($conn->query($sql1) === TRUE){
							$_SESSION["message"] = "All records inserted successfully";
						}
						else{
							$_SESSION["message"] = "Error in creating user " . $conn->error;	
						}
					}
					else{
						$_SESSION["message"] = "Error in saving address " . $conn->error;
					}
				}
				else{
					$_SESSION["message"] = "Error in saving in workers table " . $conn->error;
				} 
		}
		else{
			$_SESSION["message"] = "Username already exists.. Pick another one";
		}
	}
	else{
		$_SESSION["message"] = "Passwords don't match";
	}
}
else{
	$_SESSION["message"] = "Form not proper";
}
$conn->close();
header("Location: home.php");
?>

