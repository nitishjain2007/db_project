<?php
session_start();
require 'connect.php';
if(!(isset($_SESSION["username"])) || ($_SESSION["username"] == "")){
    header("Location: login.php");
}
else{ ?>
<html>
<head>
<title>HOME PAGE</title>
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrapvalidator/dist/css/bootstrapValidator.css" rel="stylesheet">
<script type="text/javascript" src="bootstrapvalidator/vendor/jquery/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="jquery-ui/development-bundle/themes/base/jquery.ui.all.css">
<script src="jquery-ui/development-bundle/jquery-1.10.2.js"></script>
<script src="jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script src="jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script src="jquery-ui/development-bundle/ui/jquery.ui.mouse.js"></script>
<script src="jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<script src="jquery-ui/development-bundle/ui/jquery.ui.draggable.js"></script>
<script src="jquery-ui/development-bundle/ui/jquery.ui.position.js"></script>
<script src="jquery-ui/development-bundle/ui/jquery.ui.resizable.js"></script>
<script src="jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<script src="jquery-ui/development-bundle/ui/jquery.ui.dialog.js"></script>
<script src="jquery-ui/development-bundle/ui/jquery.ui.effect.js"></script>
<script src="jquery-ui/development-bundle/ui/jquery.ui.datepicker.js"></script>
<script src="bootstrapvalidator/dist/js/bootstrapValidator.js"></script>
<script src="bootstrap/dist/js/bootstrap.js"></script>
<script src="bootstrap/js/tooltip.js"></script>
<script src="bootstrap/js/popover.js"></script>
<script src="bootstrap/js/alert.js"></script>
<script src="bootstrap/js/dropdown.js"></script>
<script>
window["count"]=1;
function createtable(){
    $('#tableformdiv').show();
}
function addfield(){
    window["count"]++;
    document.getElementById("totala").value = window["count"];
    var query = "<tr><td><input type='text' name='field" + window["count"].toString() + "' style='width:100px;' /></td><td><select name='field" + window["count"].toString() + "type'><option value='INT'>INT</option><option value='VARCHAR'>VARCHAR</option><option value='TEXT'>TEXT</option><option value='DATE'>DATE</option></select></td><td><input type='text' name='field" + window["count"].toString() + "length' style='width:100px;'/></td><td><input type='checkbox' name='field" + window["count"].toString() + "autoinc' value='AUTO INCREMENT'></td><td><select name='field" + window["count"].toString() + "index'><option value='--'>--</option><option value='PRIMARY KEY'>PRIMARY</option><option value='UNIQUE'>UNIQUE</option></select></td></tr>";
    $('#fields').append(query);
}
</script>
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
 <script>
$(function() {
$( ".datepicker" ).datepicker();
});
</script>
<style>
table, th, td {
    border: 10px solid white;
}
</style>
</head>
<body>
<div style="height:45px;background-color:black;">
<font style="color:white;" size="6">SAB KUCH KIRANA MERCHANT</font>
<font style="color:white;" size="4">
<div style="float:right;"><div style="margin-top:10px;float:left;">Hi <?php echo $_SESSION['username']; ?></div><div style="float:left;margin-left:10px;"><button type="submit"class="btn btn-danger" style="border-radius:0px;height:45px;width:90px;" onclick="window.location.replace('logout.php');"><font style="color:white;" size="4">Logout</font></button></div></div>
</font> 
</div>
<?php if((isset($_SESSION['message'])) && ($_SESSION['message']!='')){ ?>
    <div style="position:absolute;margin-top:2%;margin-left:50%;">
    <div style="float:right;margin-right:2%;" class="bs-example">
        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo $_SESSION['message']; ?>
        </div>
    </div>
    </div>
    <?php 
    $_SESSION['message'] = '';
}?>
<div style="width:18%;background-color:black;float:left;min-height:1200px;max-height:7000px;">
    <?php if($_SESSION['type'] == 'A'){?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getadmin" onclick="getadmin();"><font style="color:white;" size="4">Manage Users and Admins</font></button>
    <script>
    function getadmin(){
        window.location.assign("home.php?click=getadmin");
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'C'){  ?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getcustomer" onclick="getcustomer();"><font style="color:white;" size="4">Manage Customers</font></button>
    <script>
    function getcustomer(){
        window.location.assign("home.php?click=getcustomer");
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A'){ ?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getworker" onclick="getworker();"><font style="color:white;" size="4">Manage Workers</font></button>
    <script>
    function getworker(){ 
        window.location.assign("home.php?click=getworker");
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'D'){ ?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getdebt" onclick="getdebts();"><font style="color:white;" size="4">Manage Debts</font></button>
    <script>
    function getdebts(){ 
        window.location.assign("home.php?click=getdebt");
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'C'){  ?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getsale" onclick="getsales();"><font style="color:white;" size="4">Manage Sales</font></button>
    <script>
    function getsales(){
        window.location.assign("home.php?click=getsale");
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'S'){ ; ?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getshipping" onclick="getshippings();"><font style="color:white;" size="4">Manage Shippings</font></button>
    <script>
    function getshippings(){
        window.location.assign("home.php?click=getshipping");
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'T'){ ?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getstore" onclick="getstore();"><font style="color:white;" size="4">Manage Goods and Store</font></button>
    <script>
    function getstore(){ 
        window.location.assign("home.php?click=getstore");
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'C'){ ?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getorder" onclick="getorder();"><font style="color:white;" size="4">Manage Orders</font></button>
    <script>
    function getorder(){
        window.location.assign('order.php?click=getorder');
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'C'){ ?>
  <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getsupplier" onclick="getsupplier();"><font style="color:white;" size="4">Manage Suppliers</font></button>
  <script>
  function getsupplier(){
    window.location.replace('home.php?click=getsupplier')
  }
  </script>
  <?php } ?>

</div>
<div  id="div1" style="float:left;">



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
 
$Item[0]='"';
$Item[1]='"';
$Item[2]='"';
$value=(string)$_GET['resval'];
echo $value;
$value=explode("->", $value);
$value[0]=explode(" ",$value[0]);
//$t=explode(":",$value[1]);

?>
<table id="table1">
<tr>
<th>Item Name</th>
<th>Price</th>
<th>Quantity</th>
</tr>
<?php
$Item[0].=$value[0][0];
$Item[1].=$value[0][1];
$Item[2].=$value[0][2];
?>
<tr>
<td><?php echo $value[0][0];?></td>
<td><?php echo $value[0][1];?></td>
<td><?php echo $value[0][2];?></td>
</tr>
<?php




for($i=3;$i<sizeof($value[0]);$i+=3)
{ ?>
       <tr>
       <?php
       for($j=0;$j<3;$j+=1)
       	{
       		?>
       		<td>
       		<?php
       		$Item[$j].="," .$value[0][$i+$j];

       		echo $value[0][$i+$j];
       		?>
       		</td>
       		<?php
       	}
       	?>
       	</tr>
       	<?php


}
$Item[0].='"';
$Item[1].='"';
$Item[2].='"';

$q='select Name from customer where ID='.$value[2].'';
$q=mysql_query($q);
while ($line = mysql_fetch_array($q, MYSQL_ASSOC)) {
	foreach ($line as $values){
		echo "Customer Name: ".$values;
	}
}


?>

<?php
//echo $Item[0] . $Item[1] .$Item[2] . $value[1];

$query='INSERT INTO sale (PersonID,Value,List,Quantity,ValuePerItem) VALUES('.$value[2].' , '.$value[1].','.$Item[0].','.$Item[2].','.$Item[1].')';
$result=mysql_query($query);
if(!$result)
{
	
	echo "<script>Query Failed.Enter valid Item :</script> " ;
	
}
else
{
   echo '<script>alert("Succesfully Inserted!!");</script>';
   
  
}
$Item[2]=explode(",",$Item[2] );
$Item[0]=explode(",", $Item[0]);
$str= ltrim ($str, ':');
$Item[2][0]=ltrim($Item[2][0],'"');
$Item[0][0]=ltrim($Item[0][0],'"');

//$Item[0][0][0] = "";
$str='"';
$str.= $Item[0][0];
$str.='"';
$query='UPDATE storeRoom set Quantity=Quantity - ' . $Item[2][0]. ' where Item=' .$str. '';
$query=mysql_query($query);
if($query)
{
  echo '<script>alert("done");</script>';
}
else
echo '<script>alert("Not Done");</script>';
?>
<br><br>
<h2 id="table2"> <?php echo "Total Bill of Rs ".$value[1];?></h2>
<script type="text/javascript">
//$(document).ready(function(){



	



//window.addEventListener("load", act1)

</script>

<form action="bill.php" method="post">

<input id="submit" name="form1-submit" type="submit" value="click here for shipping">
</form>
<?php
if(!empty($_POST['form1-submit']))
{
?>
<form action="bill.php" method="post">
   Delivery Boy(start typing name): <input id="sample_search" type="text" name="val1">
   <input id="submit1" name="form11-submit" type="submit">
   </form>
   <?php
}
?>
   <div id="answer"></div>
   <?php
   if(!empty($_POST['form11-submit']) && !empty($_POST['val1'])){
      
      $query="select MAX(ID) from sale";
      $result=mysql_query($query);
      while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
      {
      foreach($line as $valu)
      {
            $value1=$valu;
      }
   }

     $id=$_POST["val1"];
     
   
   $query='select name from workers where ID='.$id.' and type="S" ';
    $result=mysql_query($query);
   if(mysql_num_rows($result) == 1){

    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
   {
      foreach($line as $val)
      {
            $value3=$val;
      }
   }




   $query='select PersonID from sale where ID ='.$value1.' ';
   $result=mysql_query($query);
   while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
   {
      foreach($line as $val)
      {
            $value2=$val;
      }
   }
   $k='"';
   $k.='NO';
   $k.='"';
   
                    $result = mysql_query('SELECT * FROM shipping WHERE transactionID = '.$value1.'');
if(mysql_num_rows($result) == 0) {
        
              $quer='INSERT INTO shipping(transactionID,customerID,shippingBoyID,status) VALUES ('.$value1.' , '.$value2.','.$id.','.$k.')';
              $resul=mysql_query($quer);
              if(!$resul)
              {
                  echo '<script>alert("shipping could no be placed");</script>';
                  echo mysql_error();
              }
              else
              {
                  $Message="Shipping Placed!!";
                //echo '<script>alert("shipping placed");</script>';
                header('Location: http://localhost/allshippings.php');



              }



   }
   else
   {
      echo '<script> alert("Shipping is already placed");</script>';
   }
}
else{
      echo '<script> alert ("No such ID exists");</script>';
}

}


?>
<script type="text/javascript">
function check($value)
{  var k=document.getElementById($value).innerHTML;
      
      k=k.toString();
      k=k.split(" ");
      //alert(k[2]);
      //alert(k);
      document.getElementById("sample_search").value=k[1];

}
$(document).ready(function(){
    var minlength = 1;




    $("#sample_search").keyup(function () {
        var that = this,
        value = $(this).val();

        if (value.length >= minlength ) {
            $.ajax({
                type: "POST",
                url: "delivery_boy.php",
                data: {
                    'search' : value
                },
                dataType: "text",
                success: function(msg){
                    //we need to check if the value is the same
                     var array=msg.split("$");
                     var ll=array[0].split(">");
                     array[0]=ll[ll.length-1];
                     //alert(array[0]);
                     var ans=0;
                     document.getElementById("answer").innerHTML="";
                     $("#answer").append("<table>");
                     for(ans=0;ans<array.length;ans+=1)
                     {  array[ans]=array[ans].toString();
                        $("#answer").append("<tr><td id="+ans +" onclick='check(this.id)'"+">" + array[ans] +"</td></tr>");
             //           alert(array[ans]);
                        
                     }
                                     $("#answer").append("</table>");

                    }
                }
            );
        }
    });
});
</script>
</div>
</html>
<?php }?>

