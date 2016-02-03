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


<script>

function act1(){
document.getElementById("form1").style.display="None"
document.getElementById("form2").style.display="None"
document.getElementById("form3").style.display="None"
document.getElementById("form4").style.display="None"

//document.getElementById("table-form1").style.display="None"


}
function act2(){
document.getElementById("form1").style.display=""
document.getElementById("form2").style.display="None"
document.getElementById("form3").style.display="None"
document.getElementById("form4").style.display="None"

//document.getElementById("table-form1").style.display="None"

}
function act3(){
document.getElementById("form1").style.display="None"
document.getElementById("form2").style.display=""
document.getElementById("form3").style.display="None"
document.getElementById("form4").style.display="None"

//document.getElementById("table-form1").style.display="None"

}
function act4(){
document.getElementById("form1").style.display="None"
document.getElementById("form2").style.display="None"
document.getElementById("form3").style.display=""
document.getElementById("form4").style.display="None"

//document.getElementById("table-form1").style.display="None"

}
function act5($value){
document.getElementById("form1").style.display="None"
document.getElementById("form2").style.display="None"
document.getElementById("form3").style.display="None"
document.getElementById("form4").style.display="None"

//document.getElementById("table-form1").style.display="None"

alert($value)
}
function act6(){
document.getElementById("form1").style.display="None"
document.getElementById("form2").style.display="None"
document.getElementById("form3").style.display="None"
document.getElementById("form4").style.display=""

//document.getElementById("table-form1").style.display="None"

}








window.addEventListener("load", act1)
</script>

<button onclick="act2()">Click To see Debts of Customer</button>
<button onclick="act3()">Click To see Debt records according to time</button>
<button onclick="act4()">Click to add new Debt record </button>
<button onclick="act6()">Click To Delete record </button>
<div id="form1" style="display:none;">
<form  name="form1" action="debt.php" method="post">
Customer Id: <input type="text" id="simple-search" name="name"><br>
<input name="form1-submit" type="submit">
</form>
</div>
<div id="form2" style="display:none;">
<form name="form2" action="debt.php" method="post">
Start Date: <input type="datetime-local" class="datepicker" name="name1"><br>
End Date: <input type="datetime-local" class="datepicker" name="name2">
<br>
<input name="form2-submit" type="submit">
</form>
</div> 
<div id="form3" style="display:none;">
<form name="form3" action="debt.php" method="post">
Customer ID : <input id="sample-search" type="text" name="name3"><br>
Value : <input type="text" name="name4"></br>
<input name="form3-submit" type="submit" >
</form>
</div>
<div id="form4" style="display:none;">
<form name="form4" action="debt.php" method="post">
Debt ID : <input type="text" name="name5"><br>

<input name="form4-submit" type="submit" >
</form>

</div>




<div id="answer"></div>

<?php


// Performing SQL query
if(!empty($_POST['form3-submit'])){

$id=$_POST["name3"];
$value=$_POST["name4"];
$query = 'INSERT INTO debt(CustomerId,Value) VALUES('.$id.','.$value.')';
$result = mysql_query($query);
if($result){
?>

<script>
act5("Succesfully Inserted");
</script>
<?php
}
else
{
?>
<script>
act5("Enter valid CustomerId and value");
</script>
<?php
}





}
if(!empty($_POST['form4-submit'])){

$id=$_POST["name5"];
$q='SELECT * FROM debt where ID='.$id.'';
$res=mysql_query($q);
if(mysql_num_rows($res) !=0)
{

$query = 'DELETE FROM debt where ID='.$id.'';
$result = mysql_query($query);

if($result===TRUE){
	//echo '<script>alert("YES");</script>';
	echo '<script>act5("Succesfully Deleted");</script>';
}
else
{
echo 
'<script>
act5("Could not DELETE");
</script>';

}



}
else
{
	echo '<script>act5("NO such record exists");</script>';
}

}
?>
<script type="text/javascript">
	function deleteit($value)
{   var value=document.getElementById("D-"+$value).innerHTML;
     //alert(value);
	$.ajax({
                type: "POST",
                url: "delete_debt.php",
                data: {
                    'search' : value
                },
                dataType: "text",
                success: function(msg){
                    //we need to check if the value is the same
       //             alert(msg);
                    location.reload();
                     /*var array=msg.split(">");
                     var ans=0;
                     document.getElementById("answer").innerHTML="";
                     $("#answer").append("<table>");
                     for(ans=1;ans<array.length;ans+=1)
                     {
                        $("#answer").append("<tr><td id="+ans +" onclick='checking(this.id)'"+">" + array[ans] +"</td></tr>");
                        
                     }
                                     $("#answer").append("</table>");


                     //document.getElementById("answer").innerHTML=msg;
                    //if (value==$(that).val()) {
                    //Receiving the result of search here
                    }*/}
                });
}
</script>

<?php
if(!empty($_POST['form1-submit'])){
$id=$_POST["name"];
$query='SELECT Name from customer where ID='.$id.'';
$result=mysql_query($query);
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	foreach($line as $value){
		;
	}

}
$cuname=$value;


$query = 'SELECT ID,Value,Time FROM debt WHERE CustomerId='.$id.'';

$result = mysql_query($query);



if(mysql_num_rows($result) == 0)
{
?>
<script>
act5("No such customer or debt record.");
</script>

<?php
}
else{
{


// Printing results in HTML
?>
<div id="table-form1">
<table class="fancy">
<tr><th>Debt ID</th><th>Debt Value</th><th>Time</th><th>Clear record</th> </tr>
<?php
$value=0;
$array=[];
$count=0;
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    ?>
    <tr>
    <?php
    $i=0;

    foreach ($line as $col_value) {
	    if($i==1)
	    {
		    $value+=$col_value;
	    }
	   // array_push($array[$i],$col_value);
	    //$i+=1;
         if($i==0)
         {
         	?>
         	<td id="D-<?php echo $count;?>">
         	<?php
         }
         else
         {
         	?>
         	<td>
         	<?php
         }


	
	    if($i==1){echo "Rs";}
        echo "$col_value\n";
        ?>
        </td>
        <?php
        $i+=1;
    }
    ?>
    <td><button id="<?php echo $count;?>" onclick='deleteit(this.id)' >Clear Debt </button></td>
    </tr>
    <?php
    $count+=1;
}

echo "Customer Name :".$cuname."<br>";
echo "Total Debt is : Rs " . $value  ;
?></table></div><?php 
}
}
}

if(!empty($_POST['form2-submit'])){
	$id1=$_POST["name1"];
	//echo $id1;
	$id1=(string) $id1;
	$id1=explode("T",$id1);
	$id1[1].= ":59";
	$id1[0].=" ";
	$id1[0].=$id1[1];
	$id1[0]='"' . $id1[0] .'"';
	//echo $id1[0];


	
	$id2=$_POST["name2"];
	$id2=(string) $id2;
	$id2=explode("T",$id2);
	$id2[1].=":59";
	$id2[0].=" ";
	$id2[0].=$id2[1];
	$id2[0]='"' . $id2[0] . '"';

	$query = 'SELECT CustomerId,value,Time FROM debt WHERE Time > '.$id1[0].' AND Time < '.$id2[0].'' ;

	$result = mysql_query($query) or die('Query failed: ' . mysql_error());


	// Printing results in HTML
	echo "<table><tr><th>Customer ID</th><th>Value</th><th>Time</th>\n";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo "\t<tr>\n";
		
		foreach ($line as $col_value) {

			
			echo "\t\t<td>$col_value</td>\n";
		}   
		echo "\t</tr>\n";
	}
	echo "</table>\n";
}
?>

<script type="text/javascript">

function checking($value)
    {
    	var k=document.getElementById($value).innerHTML;
    	var kk=k.split(" ");

	//alert(k[2]);
	//alert(k);
	document.getElementById("simple-search").value=kk[kk.length-2];
    }
    function checking1($value)
    {
    	var k=document.getElementById($value).innerHTML;
    	var kk=k.split(" ");

	//alert(k[2]);
	//alert(k);
	document.getElementById("sample-search").value=kk[kk.length-2];
    }

	$(document).ready(function(){
		var minlength=1;
		 $("#simple-search").keyup(function () {
		 	
        var that = this,
        value = $(this).val();
        


        if (value.length >= minlength ) {
            $.ajax({
                type: "POST",
                url: "debtall.php",
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
                     $("#answer").append("<table>");
                     for(ans=0;ans<array.length;ans+=1)
                     {
                        $("#answer").append("<tr><td id="+ans +" onclick='checking(this.id)'"+">" + array[ans] +"</td></tr>");
                        
                     }
                                     $("#answer").append("</table>");


                     //document.getElementById("answer").innerHTML=msg;
                    //if (value==$(that).val()) {
                    //Receiving the result of search here
                    }
                });
        }
    });
$("#sample-search").keyup(function () {
		 	
        var that = this,
        value = $(this).val();

        


        if (value.length >= minlength ) {
            $.ajax({
                type: "POST",
                url: "debtall.php",
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
                     $("#answer").append("<table>");
                     for(ans=0;ans<array.length;ans+=1)
                     {
                        $("#answer").append("<tr><td id="+ans +" onclick='checking1(this.id)'"+">" + array[ans] +"</td></tr>");
                        
                     }
                                     $("#answer").append("</table>");


                     //document.getElementById("answer").innerHTML=msg;
                    //if (value==$(that).val()) {
                    //Receiving the result of search here
                    }
                });
        }
    });
});

</script>
<?php
// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>
</div>
</body>
</html>
<?php } ?>
