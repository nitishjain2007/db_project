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
?>


<form name="form1" onsubmit="insert()" >
Username : <input type="text" id="uname"><br>
Password : <input type="password" id="pass"><br>
Re-enter Password : <input type="password" id="repass"><br>
Supplier Name : <input type="text" id="sname"><br>
Agency Name : <input type="text" id="aname"><br>
Materials Name: <input type="text" id="matname"><br>

<input name="form1-submit" type="submit" >
</form>

<script type="text/javascript">
//$(document).ready(function(){
	function insert()
	{   
	var zz="username=" + document.getElementById("uname").value + "&password=" + document.getElementById("pass").value + "&repassword=" + document.getElementById("repass").value + "&name=" + document.getElementById("sname").value + "&agency=" + document.getElementById("aname").value + "&materials=" + ","+document.getElementById("matname").value+",";
	//alert('name' + document.getElementById('sname').value+
      //              'agency' + document.getElementById('aname').value+
        //            'materials' + document.getElementById('matname').value);
        	$.ajax({
type: "POST",
url: "insert_supplier.php",
data: zz,
cache: false,
done: function(result){
    alert(result);
	//window.location.replace("home.php?click=getsupplier");
	}
});
}

</script>
</div>
<?php } ?>


