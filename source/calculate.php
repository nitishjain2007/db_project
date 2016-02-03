<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>



<?php
// Connecting, selecting database
$link = mysql_connect('127.0.0.1', 'root', 'ntsh.jain');
   if(!$link)
{
?>

<?php

}
//echo 'Connected successfully';

mysql_select_db('shop') or die('Could not select database');
$item='"';$item.=$_POST['item'];$item.='"';
$k=$_POST['k'];
$array=[];
//echo $item .$k;
$query='select Quantity from storeRoom where Item='.$item.'';
$query=mysql_query($query);
if(!$query)
{
	echo "Error".mysql_error();
}
else
{
while ($line = mysql_fetch_array($query, MYSQL_ASSOC))
	{
             foreach($line as $value)
             {
             	;
             	

             }
             

	}
	//echo gettype($value);
	//echo gettype($_POST['k']);

	settype($value, "integer");
	settype($_POST['k'], "integer");


	//echo $value-$_POST['k'];
	
	if($value>$_POST['k'])
	{$l=$value-$_POST['k'];
//     echo $l;
		$q='update storeRoom set Quantity='.$l.' where Item='.$item.' ';
		$q=mysql_query($q);
		if(!$q)
		{
			echo "hii";
		}
		else
		{
			echo "hiii";
		}

	}
	else
	{
		echo "hii";
	}
}
/*
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
echo 'update shipping set status='.$value.' where serialNo='.$_POST['value'].' ';
$query='update shipping set status='.$value.' where serialNo='.$_POST['value'].' ';
$result=mysql_query($query);
if(!$result)
{
	echo "TRY";

}
else
{
	echo "Success";
}
*/
