<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>




<?php
// Connecting, selecting database
$link = mysql_connect('127.0.0.1', 'root', 'ntsh.jain');
   if(!$link)
{
?>

<?php

}
//echo 'Connected successfully';

mysql_select_db('projectdb') or die('Could not select database');
$nik1='"' .$_POST['name'] .'"';
$nik2=$_POST['quantity'];
$nik3=$_POST['supplier'];
$nik4='"'.'NO'.'"';

$query='INSERT INTO transaction (Supplier,Items,Quantities,status) VALUES('.$nik3.','.$nik1.','.$nik2.','.$nik4.')';
$result=mysql_query($query);
if(!$result)
{
	echo "sorry, try again";
}
else
{
	echo "Succesfully inserted!!";
}

