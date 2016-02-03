<?php
session_start();
require 'connect.php';
if($_POST['start'] == '2'){
	if(isset($_POST['updateid'])){
		mysql_query("UPDATE customer SET name='". $_POST['name'] . "', type='" . $_POST['type'] . "' WHERE id=" . $_POST['updateid']);
		mysql_query("UPDATE registeredCustomer SET Email='" . $_POST['email'] . "', PhoneNo='" . $_POST['phone'] . "' WHERE ID=" . $_POST['updateid']);
		$sql="UPDATE customerAddress SET HouseNo='". $_POST['houseno'] . "', Street='" . $_POST['street'] . "', City='" . $_POST['city'] . "', State='" . $_POST["state"] . "', ZIP=" . $_POST['zip'] . " WHERE ID=" . $_POST['updateid'];
		mysql_query($sql);
		$_SESSION['message'] = 'Updated Records Successfully';
	}
	else{
		$_SESSION['message'] = "Something went wrong";
	}
	header('Location: home.php?click=getcustomer');
}
?>