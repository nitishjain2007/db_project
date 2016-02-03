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

echo $_POST['search'];
$query='DELETE FROM debt where ID='.$_POST['search'].'';
$result=mysql_query($query);


 //echo 'SELECT name,id from workers where type="S" ';

