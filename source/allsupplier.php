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
?>
<script type="text/javascript">

	function checker($value){
		var k=document.getElementById("in"+$value).innerHTML;
    var kk=document.getElementById("out"+$value).innerHTML;
		var dataString='id='+kk +'&status=' + k;
    
		$.ajax({
type: "POST",
url: "supplier_status.php",
data: dataString,
cache: false,
success: function(result){
  alert(result);
location.reload();
}
});
		
}




</script>
<table>
<tr>
<th> Supplier ID </th>
<th>Supplier Name </th>
<th> Time </th>
<th> Item</th>
<th> Quantity </th>
<th> status </th>
<th> Update option</th>
</tr>
<?php
 $query='select ID,Supplier,Time,Items,Quantities,status from transaction';
 $result=mysql_query($query);
 $count=1;
   while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
   {$i=0;?>
    <tr>
    <?php
   	foreach($line as $val)
    {$k=1;
      if($i==1)
      {
        $q='select Name from supplier where ID='.$val.' ';
        $q=mysql_query($q);
        while ($lin = mysql_fetch_array($q, MYSQL_ASSOC))
        {
          foreach($lin as $v)
          {
            $val=$v;
          }
        }

      }
      if($i==5)
      {
        if($val=='NO')
          $k=0;
        ?>
        <td id="in<?php echo $count;?>">
        <?php
      }
      else if($i==0)
      {
        ?>
        <td id="out<?php echo $count;?>">
        <?php
      }
      ?>
      <?php
      if($i!=5 && $i!=0){
     ?> <td>
<?php    }
      
       echo $val;
       ?>
       </td>
<?php
$i+=1;
    }
   	
   	
  if($k==0){
      ?>
   	<td> <button id="<?php echo $count;?>" onclick="checker(this.id)"> Update Status </button></td>
   <?php
 }
   ?>
   	</tr>
   	<?php
   	$count+=1;
   }
   ?>
   </table>
   <?php
