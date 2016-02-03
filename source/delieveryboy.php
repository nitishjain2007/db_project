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
$answer="";
$limit="$";
//$name='"';
$name=$_POST['search'];
//echo $name;
//$name.='"';
//echo $name;
//echo 'SELECT name,id from workers where type="S" and name like '% $name%'';
$query= "SELECT name,id from workers where type='S' and  name like '%$name%'";

//$query= 'SELECT name,id from workers where type="S"';

$result=mysql_query($query);
if(!$result)
{
	echo mysql_error();
}
while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
   {$i=0;$val="";
   	foreach($line as $value)
   	{
   		if($i==0){
   		$val.=$value;
   		$val.=" "; 
   	}
   	else
   	{
   		//$answer.= "->";
   		$val.=$value;
   		$val.=$limit;
   		
   	}
   	$i+=1;

   	}
   	$answer.=$val;
   }
   echo $answer;

//echo $query;
