<?php
session_start();
require 'connect.php';
?>
<?php
if($_POST['start'] == '2'){
	if(isset($_POST['updateid'])){
		mysql_query("UPDATE workers SET name='". $_POST['name'] . "', type='" . $_POST['type'] . "', emailid='" . $_POST['email'] . "', phoneno='" . $_POST['phone'] . "', salary=". $_POST['salary'] . " WHERE id=" . $_POST['updateid']);
		$sql="UPDATE workersAddress SET HouseNo='". $_POST['houseno'] . "', Street='" . $_POST['street'] . "', City='" . $_POST['city'] . "', State='" . $_POST["state"] . "', ZIP=" . $_POST['zip'] . " WHERE ID=" . $_POST['updateid'];
		mysql_query($sql);
		$_SESSION['message'] = 'Updated Records Successfully';
		$_SESSION['clicked'] = 'getworker';
	}
	else{
		$_SESSION['message'] = "Something went wrong";
	}
	header('Location: home.php');
}
?>