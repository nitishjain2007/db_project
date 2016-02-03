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
echo $_POST['id'] .$_POST['status'];
//$z=explode(" ", $_POST['status']);
//echo gettype($z);
//$z=trim($_POST['status']);
//echo (gettype($z));

//if($_POST['status']=='NO')
//{   //echo "yes";
	$k='"YES"';
//}

$q='select Items,Quantities from transaction where ID='.$_POST['id'].'';
$r=mysql_query($q);
$item='"';
while ($line = mysql_fetch_array($r, MYSQL_ASSOC))
{
	$i=0;
	foreach($line as $value)
	{
		if($i==0)
			{$value=str_replace(" ", "", $value);$item.=$value;}
		else
			$qu=$value;
		$i+=1;
	}
}

$query='UPDATE transaction SET status='.$k.' where ID='.$_POST['id'].'';

$query=mysql_query($query);
if(!$query)
{
	echo "Something went wrong.Couldnt update";
}
else
   echo "Updated Succesfully";
$item.='"';


$query='SELECT * from storeRoom where Item='.$item.'';
echo $query;
$query=mysql_query($query);
if(mysql_num_rows($query) == 0)
{
     $query='INSERT INTO storeRoom (Item,Quantity) VALUES('.$item.','.$qu.')';
     $result=mysql_query($query);
     if(!$result)
{
	echo "Could not INSERT";
}
else
echo "Done INSERT";



}
else
{
$query='UPDATE storeRoom SET Quantity=Quantity + '.$qu.' where Item='.$item.'';
$result=mysql_query($query);
if(!$result)
{
	echo "Could not Update";
}
else
echo "Done";
}
