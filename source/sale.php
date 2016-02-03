<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <?php
  $Items=[];
  $Prices=[];
  $Quantities=[];
  $Items_clicked=[];
  $Prices_clicked=[];
  ?>
  <script type="text/javascript">
	var lastOption;
	var array=[];
	var items=[];
	var costs=[];
	var i,total,res;
	
	

	
	function act4()
	{total=0;
         for(i=0;i<array.length;i+=1)
         {var k;
         	
            //$("#nik").append(items[array[i]] + " " + costs[i] + " " + k);
            


         	k=document.getElementById("in"+array[i]).value;
         //	document.getElementById("nik-copy").innerHTML+= items[array[i]] + " " +costs[i] + " " +k +" ";
         	//$("#nik-copy").append(items[array[i]] + " " + costs[i] + " " + k );

         	//$("#nik").append("</br>" + k );

         //	alert(k);
         	//alert(costs[0]);
         	total+=k * costs[array[i]];
		}
		document.getElementById("total").innerHTML= "Total Value : "+ total + "</br>";
		//$("nik-copy").append("  Total  " + total);
		//document.getElementById("nik-copy").innerHTML+= "Total Value : " + total + "<br>";


	}
	
	function check($value){
		if(array.indexOf($value)==-1)
		{

		array.push($value);
		lastOption=document.getElementById($value).innerHTML;

		$("#nik").append("<br>" + lastOption +  " Quantity: <input id='in" + $value + "' type='text'>") ;


		//alert($value);
	}
}



	function bill(){
		//total=0;
		//$Istring="";
		//$Pstring="";

         //<?php        
           // for($i=0;$i<sizeof($Items_clicked);$i+=1)
            //{
            //	$Istring.=$Items_clicked[$i] . ",";
            //	$Pstring.=$Prices_clicked[$i] . ",";
            //}
            
			//var res;          

            //$query="INSERT INTO sale (PersonID,Value,List,Quantity,ValuePerItem) VALUES(1,) "
            //?>
            //alert(total);
            //var variable=document.getElementById()
            total=0;
            var z=document.getElementById("cname").value;
            if(z=="")
            {
              alert("Please fill customer data");
            }
else{
         for(i=0;i<array.length;i+=1)
         {var k;
         	
          //  $("#nik").append(items[array[i]] + " " + costs[i] + " " + k);
            


         	k=document.getElementById("in"+array[i]).value;
         	var zz="item=" + items[array[i]] + "&k="+k;
         	$.ajax({
type: "POST",
url: "calculate.php",
data: zz,
cache: false,
success: function(result){
	var arr=result.split(">");
    var my=(arr.length);
    //arr[my-1].replace(" ","");
    //alert(arr[my-1].length);


if(arr[my-1].length<8)
{
	alert("Sorry We dont have this much amount of item");
	location.reload();
}
else
{
	;
}
         	
}
});
         //alert(res);
         	//if(res=='1'){
         	document.getElementById("nik-copy").innerHTML+= items[array[i]] + " " +costs[array[i]] + " " +k +" ";
         	//$("#nik-copy").append(items[array[i]] + " " + costs[i] + " " + k );

         	//$("#nik").append("</br>" + k );

         //	alert(k);
         	//alert(costs[0]);
         	total+=k * costs[array[i]];
         //}
         //else
         //{
         	//alert("Sorry we dont have this much quantity of :"+items[array[i]]);
         //}
		}
		
		//document.getElementById("total").innerHTML= "Total Value : "+ total + "</br>";
		//$("nik-copy").append("  Total  " + total);
		//if(res=='1'){
		document.getElementById("nik-copy").innerHTML+= "->" + total + "<br>";
		            document.getElementById("nik-copy").innerHTML+= "->" +z;
       
       
		  var resval = $('#nik-copy').text();  
		  window.location = 'bill.php?resval=' + resval;
//}




}

	}




</script>

	

<?php
// Connecting, selecting database
$link = mysql_connect('127.0.0.1', 'root', 'ntsh.jain');
   if(!$link)
{
?>


<?php

}
//echo 'Connected successfully';
?>

<?php

mysql_select_db('projectdb') or die('Could not select database');



$query='SELECT Item,Price from storeRoom';
$result=mysql_query($query);
if($result)
{
	

	while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
	{$i=0;
             foreach($line as $value)
             {
             	if($i==0)
             	{
             		array_push($Items, $value);
             		array_push($Quantities, 0);
             	}
             	else
             	{
             		array_push($Prices, $value);
             	}
             	$i+=1;

             }
             

	}

	?>
	
	


	
	


<div id="content" >

<select multiple="multiple">


<?php
for($i=0;$i<sizeof($Items);$i+=1)
{
	?>

	<option id="<?php echo $i;?>" onclick="check(this.id)"><?php echo $Items[$i] . '  Rs ' . $Prices[$i] . ' each' ?></option>

	
<?php
}
?>
</select>
</div>
<button onclick="checkit()">Start bill </button>

<?php
//echo '<script>checkit();</script>';
?>

<script type="text/javascript">
	function checkit()
	{    
		//alert(<?php echo $Items[0];?>);
		<?php
           
         
		 for($i=0;$i<sizeof($Items);$i+=1)
		 {

             array_push($Items_clicked, $Items[$i]);
             array_push($Prices_clicked, $Prices[$i]);
		 	?>
              
              items.push('<?php echo $Items[$i];?>');
              //alert(<?php echo $Items[$i];?>);

              costs.push('<?php echo $Prices[$i];?>');
              <?php



		 }
		 ?>





	}


</script>

<div id="nik"></div>
<div id="nik-copy" style="display:none"></div>
<div >
	<h2 id="total"></h2>

</div>
<div><form>Customer Id :<input id="cname" type="text"></form></div>
<button onclick="act4()">submit</button>
<button onclick="bill()">Go to Billing</button>
<?php

}












