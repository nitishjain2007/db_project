<?php
include('connect.php');


$answer="";
$limit=">";
//$name='"';
$name=$_POST['search'];
//echo $name;
//$name.='"';
//echo $name;
//echo 'SELECT name,id from workers where type="S" and name like '% $name%'';
$query= "SELECT ID,Name from customer where   Name like '%$name%'";

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
   		//$val.=">"; 
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

