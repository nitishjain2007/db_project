<?php
session_start();
include 'connect.php';
echo "YES";
 $username = '"' . $_POST["username"] . '"';
 $password = '"' . $_POST["password"] . '"';
 $name='"'. $_POST['name'].'"';
 $agency='"'.$_POST['agency'].'"';
 $materials='"'.$_POST['materials'].'"';
 $query1 = "SELECT * FROM user WHERE username = '" . $_POST["username"] . "'";
 $result1 = mysql_query($query1);
 if(mysql_num_rows($result) == 0){
 $query='INSERT INTO supplier (Name,AgencyName,Materials) VALUES('.$name.','.$agency.','.$materials.')';
 $result=mysql_query($query);
 if(!$result)
 {
 	echo "Something went wrong";
 }
 else{
 	$query3 = mysql_query("SELECT * FROM supplier ORDER BY ID DESC LIMIT 1");
 	while($row = mysql_fetch_array($query3))
 		$id = $row['ID'];
 	$result4 = mysql_query("INSERT INTO user (username,password,active,Type,TypeId) VALUES ('" . $_POST['username'] . "', '" . md5($_POST['password']) . "', 0, 'S', ". strval($id) . ")");
 		if($result4){
 	$_SESSION['message'] = "Supplier Created";
 	echo "Succesfully Inserted";
 }
 else{
 	$_SESSION["message"] = "Something went wrong with users"; 
 }
 }
}
else{
	$_SESSION['message'] = "Username already exists";
}
 ?>


