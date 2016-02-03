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
$sql = "CREATE TABLE " . $_POST["tablename"] . "(";
$num = intval($_POST["total"]);
for($i=1;$i<=$num;$i++){
	$var1 = "field" . strval($i);
	//$sql = $sql . " " . $_POST["$var1"];
	$var2 = $var1 . "length";
	$var3 = $var1 . "autoinc";
	$var4 = $var1 . "index";
	$var5 = $var1 . "type";
	$sql = $sql . " " . $_POST[$var1];
	$sql = $sql . " " . $_POST[$var5];
	if($_POST[$var2] == "")
		$sql = $sql . "(255)";
	else
		$sql = $sql . "(" . $_POST[$var2] . ")";
	if($_POST[$var3] != NULL){
		$sql = $sql . " AUTO_INCREMENT";
	}
	if($_POST[$var4] != '--')
		$sql = $sql . " " . $_POST[$var4];
	if($i != $num)
		$sql = $sql . ",";
}
$sql = $sql . ");";
if($conn->query($sql) === TRUE){
	$_SESSION['message'] = "Table " . $_POST["tablename"] . " created";
}
else{
	$_SESSION['message'] = "Error creating table: " . $conn->error;
}
$conn->close();
header("Location: home.php");
?>

