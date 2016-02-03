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
  if($_POST['typeid'] == 'R'){
  if($conn->query("DELETE FROM customerAddress WHERE `ID`=".$delete_id) === TRUE){
  	if($conn->query("DELETE FROM  user WHERE `Type` = 'C' AND `TypeId` = " . $delete_id)){
      if($conn->query("DELETE FROM debt WHERE `CustomerId` =" . $delete_id)){
  		  if($conn->query("DELETE FROM registeredCustomer WHERE `ID` = " . $delete_id)){
        $sql2 = "SELECT * FROM sale WHERE `PersonID` = " . $delete_id ;
        $result = $conn->query($sql2);
        while($row = $result->fetch_assoc()){
          $deleteid1 = $row['ID'];
        }
        if((!isset($deleteid1)) || ($deleteid1 == '')){
          $deleteid1 = 0;
        }
        if($conn->query("DELETE FROM shipping WHERE `transactionID` = " . $deleteid1)){
        if($conn->query("DELETE FROM sale WHERE `PersonID` = " . $delete_id)){
        if($conn->query("DELETE FROM customer WHERE `ID` = " . $delete_id)){
  			 $_SESSION['message'] = "Customer Deleted Successfully";
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
  else{
    $_SESSION['message'] = "something went wrong :" . $conn->error;
  }
}
else{
   if($conn->query("DELETE FROM customer WHERE `ID` = " . $delete_id)){
    $_SESSION['message'] = "Customer Deleted Successfully";
   }
   else{
    $_SESSION['message'] = "something went wrong :" . $conn->error;
   }
}
}
else{
	$_SESSION['message'] = "Something Went Extremely Wrong";
}
header('Location: home.php');
?>


