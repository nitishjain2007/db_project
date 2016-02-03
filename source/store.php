<?php
// Connecting, selecting database
$link = mysql_connect('127.0.0.1', 'root', 'ntsh.jain');
   if(!$link)
{
?>
<script>
act5("Not connected to database :( ");
</script>
<?php

}
//echo 'Connected successfully';

mysql_select_db('projectdb') or die('Could not select database');
$nameI="'";
$nameI.=$_POST['nameI'];
$nameI.="'";
$nameQ=$_POST['nameQ'];
$nameP=$_POST['nameP'];

$query='UPDATE storeRoom SET Quantity='.$nameQ.',Price='.$nameP.' WHERE Item='.$nameI.'';
$result=mysql_query($query);
if(!$result)
{
	
	echo "Query Failed.Enter valid ";
	
}
else
{
   echo "Succesfully Updated!!";
   
  
}
