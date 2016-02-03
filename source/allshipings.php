<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<head>
<style>

table{
  margin: 0em 0em 0em 0em;
  background: whitesmoke;
  border-collapse: collapse;
}
table.fancy th, table.fancy td {
  border: 3px solid #DCDCDC;
  padding: 0.2em;
}
table.fancy th {
  background: gainsboro;
  text-align: left;
}
table.fancy tr:hover td {
   background: #5BC0DE !important;
   border: 3px solid ##46B8DA;
}
table.fancy caption {
  margin-left: inherit;
  margin-right: inherit;
}
</style>
</head>

<?php
session_start();
$link = mysql_connect('127.0.0.1', 'root', 'ntsh.jain');
   if(!$link)
{
?>

<?php

}
//echo 'Connected successfully';

mysql_select_db('projectdb') or die('Could not select database');
if(isset($_GET["Message"]))
{   $k='"';
	$k.=$_GET["Message"];
	$k.='"';
	echo "<script> alert(<?php echo $k;?>);</script>";
}
?>
<script type="text/javascript">

	function checker($value){
    //alert($value);
		var k=document.getElementById("in"+$value).innerHTML;
    var k1=document.getElementById("out"+$value).innerHTML;

		var dataString='value='+$value +'&status=' + k +'&id=' + k1;
		$.ajax({
type: "POST",
url: "calculatee.php",
data: dataString,
cache: false,
success: function(result){
window.location.assign("home.php?click=getshipping");
}
});
}




</script>
<table class="fancy">
<tr>
<th> Serial No </th>

<th> Transaction ID </th>
<th> Customer ID </th>
<th> Delivery Boy Name </th>
<th> Status </th>
<th> Update option</th>
</tr>
<?php
 $query='select serialNo,transactionID,customerID,shippingBoyID,status from shipping';
 $result=mysql_query($query);
 $count=1;
   while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
   {$i=-1;?>
    <tr>
    <?php
   	foreach($line as $val)
   	{?>
        <?php if($i==3){?>
        <td id="<?php echo 'in' . $count;?>"><?php
    }
    else if($i==-1)
    {
    	?>
    	<td id="<?php echo 'out' .$count;?>">
    	<?php
    }
    else
    {
      ?>
      <td>
      <?php
    }

        $i+=1;
        if($i==3){
        $q='select name from workers where id='.$val.'';
        $ans=mysql_query($q);
        while ($lin = mysql_fetch_array($ans, MYSQL_ASSOC))
        	{
        		foreach($lin as $val)
        		{
                       ;
        	}
        }


    }
   		echo $val;
   		?>
   		</td>
   		<?php
   	}
   	?>
   	<td> <button id="<?php echo $count;?>" onclick="checker(this.id)"> Update Status </button></td>
   	</tr>
   	<?php
   	$count+=1;
   }
   ?>
   </table>

