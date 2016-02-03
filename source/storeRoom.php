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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
table, th, td {
    border: 10px solid white;
}
</style>
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
    <?php if($_SESSION['type'] == 'A'){
        $_SESSION['click'] = "getadmin"?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getadmin" onclick="getadmin();"><font style="color:white;" size="4">Manage Users and Admins</font></button>
    <script>
    function getadmin(){
        window.location.assign("home.php");
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'C'){ 
        $_SESSION["click"] = "getcustomer"; ?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getcustomer" onclick="getcustomer();"><font style="color:white;" size="4">Manage Customers</font></button>
    <script>
    function getcustomer(){
        window.location.assign("home.php");
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A'){
        $_SESSION["click"] = "getworker"; ?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getworker" onclick="getworker();"><font style="color:white;" size="4">Manage Workers</font></button>
    <script>
    function getworker(){
        window.location.assign("home.php");
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'D'){ 
        $_SESSION['click'] = "getdebt"; ?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getdebt" onclick="getdebts();"><font style="color:white;" size="4">Manage Debts</font></button>
    <script>
    function getdebts(){
        window.location.assign("home.php");
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'C'){ 
        $_SESSION['click'] = "getsale"; ?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getsale" onclick="getsales();"><font style="color:white;" size="4">Manage Sales</font></button>
    <script>
    function getsales(){
        window.location.assign("home.php");
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'S'){ 
        $_SESSION["click"] = "getshipping"; ?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getshipping" onclick="getshippings();"><font style="color:white;" size="4">Manage Shippings</font></button>
    <script>
    function getshippings(){
        window.location.assign("home.php");
    }
    </script>
    <?php } ?>
    <?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'T'){ 
        $_SESSION['click'] = "getstore"; ?>
    <button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getstore" onclick="getstore();"><font style="color:white;" size="4">Manage Goods and Store</font></button>
    <script>
    function getstore(){
        window.location.assign("home.php");
    }
    </script>
    <?php } ?>
</div>
<div  id="div1" style="float:left;">
<script>
function act1(){
	//window.location.assign("http://localhost/storeRoom.php");

document.getElementById("form1").style.display="None"
document.getElementById("form2").style.display="None"
document.getElementById("form3").style.display="None"
document.getElementById("form4").style.display="None"



}
function act2(){
	//window.location.assign("http://localhost/storeRoom.php");

document.getElementById("form1").style.display=""
document.getElementById("form2").style.display="None"
document.getElementById("form3").style.display="None"
document.getElementById("form4").style.display="None"

//document.getElementById("table").style.display="None"

}
function act3(){
document.getElementById("form1").style.display="None"
document.getElementById("form2").style.display=""
document.getElementById("form3").style.display="None"
document.getElementById("form4").style.display="None"


}
function act4(){
document.getElementById("form1").style.display="None"
document.getElementById("form2").style.display="None"
document.getElementById("form3").style.display=""
document.getElementById("form4").style.display="None"


}
function act5($value){
document.getElementById("form1").style.display="None"
document.getElementById("form2").style.display="None"
document.getElementById("form3").style.display="None"
document.getElementById("form4").style.display="None"


alert($value)
}
function act6(){
document.getElementById("form1").style.display="None"
document.getElementById("form2").style.display="None"
document.getElementById("form3").style.display="None"
document.getElementById("form4").style.display=""


}









window.addEventListener("load", act1)
</script>
<script type="text/javascript">
//function acter(){
	$(document).ready(function(){
		var minlength=1;
		 $("#simple-search").keyup(function () {
		 	
        var that = this,
        value = $(this).val();


        if (value.length >= minlength ) {
            $.ajax({
                type: "POST",
                url: "list.php",
                data: {
                    'search' : value
                },
                dataType: "text",
                success: function(msg){
                    //we need to check if the value is the same
                    //alert(msg);
                     var array=msg.split(">");
                     var ans=0;
                     document.getElementById("answer").innerHTML="";
                     $("#answer").append("<table class='fancy'>");
                     for(ans=1;ans<array.length;ans+=1)
                     {
                        $("#answer").append("<tr><td id="+ans +" onclick='checking(this.id)'"+">" + array[ans] +"</td></tr>");
                        
                     }
                                     $("#answer").append("</table>");


                     //document.getElementById("answer").innerHTML=msg;
                    //if (value==$(that).val()) {
                    //Receiving the result of search here
                    }
                }
            );
        }
    });
 $("#sample-search").keyup(function () {
		 	
        var that = this,
        value = $(this).val();


        if (value.length >= minlength ) {
            $.ajax({
                type: "POST",
                url: "list.php",
                data: {
                    'search' : value
                },
                dataType: "text",
                success: function(msg){
                    //we need to check if the value is the same
                    //alert(msg);
                     var array=msg.split(">");
                     var ans=0;
                     document.getElementById("answer").innerHTML="";
                     $("#answer").append("<table class='fancy'>");
                     for(ans=1;ans<array.length;ans+=1)
                     {
                        $("#answer").append("<tr><td id="+ans +" onclick='checking1(this.id)'"+">" + array[ans] +"</td></tr>");
                        
                     }
                                     $("#answer").append("</table>");


                     //document.getElementById("answer").innerHTML=msg;
                    //if (value==$(that).val()) {
                    //Receiving the result of search here
                    }
                }
            );
        }
    });

$("#submit").click(function(){
var name = $("#nameI").val();
var email = $("#nameP").val();
var password = $("#nameQ").val();

// Returns successful data submission message when the entered information is stored in database.
var dataString = 'nameI='+ name + '&nameP='+ email + '&nameQ='+ password;

{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "store.php",
data: dataString,
cache: false,
success: function(result){
alert(result);
window.location.assign("http://localhost/storeRoom.php");
//history.go(0);

}
});
}
return false;
});
});
//}



</script>
<!--<form action="storeRoom.php" method="post">
<input name="list" type="submit" value="Click to see items">
</form>-->
<button onclick="getitems()">Click to see items</button>
<button onclick="act2()">Search Goods</button>
<button onclick="act3()">Click to add record for goods  </button>
<button onclick="act4()">Click to delete record </button>
<button onclick="act6()">Click to update record </button>
</form>
<div id="form1" style="display:none;">
<form  name="form1" action="storeRoom.php" method="post">
Type Good's name: <input id="simple-search"  type="text" name="name"><br>
<input name="form1-submit" type="submit">
</form>
</div>
<div id="form2" style="display:none;">
<form name="form2" action="storeRoom.php" method="post">
Name: <input type="text" name="name1"><br>
Price: <input type="text" name="name2">
<br>
Quantity: <input type="text" name="name3"><br>
<input name="form2-submit" type="submit">
</form>
</div> 
<div id="form3" style="display:none;">
<form name="form3" action="storeRoom.php" method="post">
Name : <input type="text" name="name4"><br>

<input name="form3-submit" type="submit" >
</form>
</div>
<div id="form4" style="display:none;">
<form name="form4" action="storeRoom.php" method="post">
Item : <input type="text" id="sample-search" name="name5"><br>

<input name="form4-submit" type="submit" >
</form>
</div>
<div id="answer"></div>
<script>
function getitems(){
    $('#div1').load("storeRoom.php?list=yes");
}
</script>



</body>
</html>

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

// Performing SQL query
if(!empty($_GET['list'])){
	?>


<?php


//$id=$_POST["name3"];
//$value=$_POST["name4"];
$query = 'SELECT * FROM storeRoom';
$result = mysql_query($query);
if($result){
	?>
	<div id="table">
<table class="fancy">
<tr><th>Name</th><th>Price</th><th>Quantity</th></tr>
<?php
$value=0;
$array=[];
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    ?>
    <tr>
    <?php
    $i=0;

    foreach ($line as $col_value) {
	    $i+=1;
	   // array_push($array[$i],$col_value);
	    ?>
	    <td>
	    <?php
	    if($i==2){echo "Rs ";}
        echo "$col_value\n";
        ?>
        </td>
        <?php
    }
    ?>
    </tr>
    <?php
}



?></table></div><?php 
}
}

	/*
?>

<script>
act5("Succesfully Inserted");
</script>
<?php
*/


if(!empty($_POST['form1-submit'])){
$id='"';
$id.=$_POST["name"];
$id.='"';

$query = 'SELECT * FROM storeRoom WHERE Item='.$id.'';

$result = mysql_query($query);



if(!$result)
{
?>
<script>
act5("Query failed");
</script>

<?php
}
else{

if(mysql_num_rows($result) ==0)
{
?>
<script>
act5("No Such Item");
</script>
<?php

}
else{

$value=0;
$array=[];
?>

<div id="table">
<table class="fancy"> 
	<tr>
	<th> Name </th>
	<th> Price  </th>
	<th> Quantity </th>
	</tr>
	<?php
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	echo "<br><br>";
	?>
	<tr>
       
   <?php
   $i=0;

	foreach($line as $value ){


	?>
	<td>
	<?php

//	echo ($line[0]);

   //echo "Price    Item Name    Quantity\n";
	if($i==1){echo "Rs ";}
   echo $value;
    $i+=1;
   ?>
   </td>

   <?php

}?></tr><?php
}
?>
</table>
</div>
<?php

 
}
}
}

if(!empty($_POST['form2-submit'])){
	$name='"';
	$name.=$_POST['name1'];
	$name.='"';
	$price=$_POST['name2'];
	$quantity=$_POST['name3'];

$query = 'INSERT INTO storeRoom(Item,Price,Quantity) VALUES ('.$name.' ,'.$price.','.$quantity.')';
$result=mysql_query($query);
if(!$result)
{
	?><script type="text/javascript">
	act5("Query Failed.Enter valid Item");
	</script><?php
}
else
{?><script>
   act5("Succesfully Inserted!!");
   </script>
   <?php
  
}

}
if(!empty($_POST['form4-submit']))
{   
	$name='"';
	$name.=$_POST['name5'];
	$name.='"';
	$query = 'SELECT * FROM storeRoom where Item='.$name.'';
	$result=mysql_query($query);
if(!$result)
{
	?><script type="text/javascript">
	act5("Query Failed.Enter valid Item");
	</script><?php
}
else
{$array=[];
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
	{$i=0;
           foreach($line as $value)
           {
              array_push($array, $value) ;

           }

	}
	

	?>
	</form>
</div>

<div id="form5">
<form name="form5" onsubmit="acter()">
Item : <input readonly="true" id="nameI" type="text" value='<?php echo $array[0];?>' name="nameI"><br>
Price : <input id="nameP" type="text" value='<?php echo $array[1];?>' name="nameP"><br>
Quantity : <input id="nameQ" type="text" value='<?php echo $array[2];?>' name="nameQ"><br>
<input id="submit" name="form5-submit" type="submit" >






   
   
   <?php
   
  


}
}







if(!empty($_POST['form3-submit']))
{   
	$name='"';
	$name.=$_POST['name4'];
	$name.='"';
	$query = 'DELETE FROM storeRoom where Item='.$name.'';
	$result=mysql_query($query);
if(!$result)
{
	?><script type="text/javascript">
	act5("Query Failed.Enter valid Item");
	</script><?php
}
else
{?><script>
   act5("Succesfully Deleted!!");
   </script>
   <?php
  
}




}


// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>
<script type="text/javascript">
    function checking($value)
    {
    	var k=document.getElementById($value).innerHTML;

	//alert(k[2]);
	//alert(k);
	document.getElementById("simple-search").value=k;
    }
    function checking1($value)
    {
    	var k=document.getElementById($value).innerHTML;

	//alert(k[2]);
	//alert(k);
	document.getElementById("sample-search").value=k;
    }
	

</script>
</div>
</html>
<?php }?>
