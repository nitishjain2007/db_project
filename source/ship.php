<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
 <?php
    include 'connect.php';
     $id=$_POST['search'];
     $value1=$_POST['value1'];
     echo $value1;
   $query='select name from workers where ID='.$id.' and type="S" ';
   //echo $query;
    $result=mysql_query($query);
    //echo mysql_num_rows($result);
   if(mysql_num_rows($result) == 1){
 while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
   {
   	foreach($line as $val)
   	{
   		$value3=$val;
   	}
   }
   $query='select PersonID from sale where ID ='.$value1.' ';
   $result=mysql_query($query);
   while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
   {
   	foreach($line as $val)
   	{
   		$value2=$val;
   	}
   }
   $k='"';   $k.='NO';$k.='"';
   			  $result = mysql_query('SELECT * FROM shipping WHERE transactionID = '.$value1.'');
if(mysql_num_rows($result) == 0) {
    
              $quer='INSERT INTO shipping(transactionID,customerID,shippingBoyID,status) VALUES ('.$value1.' , '.$value2.','.$id.','.$k.')';
              $resul=mysql_query($quer);
              if(!$resul)
              {
              	echo '<script>alert("shipping could no be placed");</script>';
              	echo mysql_error();
              }
              else
              {
              	$Message="Shipping Placed!!";

     }
}
   else
   {
   	echo '<script> alert("Shipping is already placed");</script>';
   }
}
else{
	echo '<script> alert ("No such ID exists");</script>';
}


