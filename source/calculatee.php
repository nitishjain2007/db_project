<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>



<?php
// Connecting, selecting database
session_start();
$link = mysql_connect('127.0.0.1', 'root', 'ntsh.jain');
   if(!$link)
{
?>

<?php

}
//echo 'Connected successfully';

mysql_select_db('projectdb') or die('Could not select database');
$id=(string)$_POST['status'];
echo gettype($id);
$id = trim( $id);
echo $id . "hiii";

if(strcmp($id,"NO")==0)
{

	$value='"YES"';
}
else
{
	$value='"NO"';
}
//echo 'update shipping set status='.$value.' where serialNo='.$_POST['value'].' ';
$query='update shipping set status='.$value.' where serialNo='.$_POST['id'].' ';
$result=mysql_query($query);
if(!$result)
{
	echo "TRY";

}
else
{
	echo "Success";
	$_SESSION['message'] = "Records updated successfully";
	//header('Location: home.php?click=getshipping');
}

