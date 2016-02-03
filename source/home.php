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
<?php if((isset($_GET["click"])) && ($_GET["click"] != '')){ ?>
<script>
window.onload = function(){
	document.getElementById("<?php echo $_GET['click']; ?>").click();
}
</script>
<?php //$_SESSION["click"] = "";
}?>
<style>
table, th, td {
    border: 0px solid white;
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
		$('#div1').load('admin.php');
	}

	</script>
	<?php } ?>
	<?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'C'){ ?>
	<button type="submit" class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getcustomer" onclick="getcustomer();"><font style="color:white;" size="4">Manage Customers</font></button>
	<script>
	function getcustomer(){
		$('#div1').load('customer.php');
	}
	</script>
	<?php } ?>
	<?php if($_SESSION['type'] == 'A'){ ?>
	<button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getworker" onclick="getworker();"><font style="color:white;" size="4">Manage Workers</font></button>
	<script>
	function getworker(){
		$('#div1').load('worker.php');
	}
	</script>
	<?php } ?>
	<?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'D'){ ?>
	<button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getdebt" onclick="getdebts();"><font style="color:white;" size="4">Manage Debts</font></button>
	<script>
	function getdebts(){
		window.location.replace('debt.php');
	}
	</script>
	<?php } ?>
	<?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'C'){ ?>
	<button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getsale" onclick="getsales();"><font style="color:white;" size="4">Manage Sales</font></button>
	<script>
	function getsales(){
		$('#div1').load('sale.php');
	}
	</script>
	<?php } ?>
	<?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'S'){ ?>
	<button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getshipping" onclick="getshippings();"><font style="color:white;" size="4">Manage Shippings</font></button>
	<script>
	function getshippings(){
		$('#div1').load('allshippings.php');
	}
	</script>
	<?php } ?>
	<?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'T'){ ?>
	<button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getstore" onclick="getstore();"><font style="color:white;" size="4">Manage Goods and Store</font></button>
	<script>
	function getstore(){
		$('#div1').load('storeRoom1.php');
	}
	</script>
	<?php } ?>
	<?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'C'){ ?>
	<button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getorder" onclick="getorder();"><font style="color:white;" size="4">Manage Orders</font></button>
	<script>
	function getorder(){
		window.location.replace('order.php');
	}
	</script>
	<?php } ?>
	<?php if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'C'){ ?>
	<button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getsupplier" onclick="getsupplier();"><font style="color:white;" size="4">Manage Suppliers</font></button>
	<script>
	function getsupplier(){
		window.location.replace('supplier.php');
	}
	</script>
	<?php } ?>
	<?php if($_SESSION['type'] == 'C'){ ?>
	<button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getviewitems" onclick="getviewitems();"><font style="color:white;" size="4">Items Available</font></button>
	<script>
	function getviewitems(){
		$('#div1').load('viewitems.php');
	}
	</script>
	<?php } ?>
	<?php if($_SESSION['type'] == 'C'){ ?>
	<button type="submit"class="btn btn-warning" style="border-radius:0px;height:45px;width:100%;" id="getviewdebts" onclick="getviewdebts();"><font style="color:white;" size="4">View Debts</font></button>
	<script>
	function getviewdebts(){
		$('#div1').load("viewdebts.php?uid=<?php echo $_SESSION['typeid']; ?>");
	}
	</script>
	<?php } ?>

</div>
<div  id="div1">

</div>
</html>
<?php } ?>

