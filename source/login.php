<?php
session_start();
if(isset($_SESSION["username"]) && ($_SESSION["username"]!='')){
	header("Location: home.php");
}
else{ ?>
<html>
<head>
<title>LOGIN</title>
<style>
body {
    background-image: url("back1.jpg");
} 
</style>
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
</head>
<body>
<div style="height:45px;background-color:black;">
<font style="color:white;" size="6">SAB KUCH KIRANA MERCHANT</font> 
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
<div align="center" style="margin-top:10%;">
<div style="background-color:grey;opacity:0.9;border-radius:15px;height:250px;width:400px;">
<div style="background-color:black;height:45px;border-top-left-radius:15px;border-top-right-radius:15px;">
<font style="color:white;" size="5">LOGIN</font>
</div>
<form method="post" action="authenticate.php"><br><br>
<div class="form-group">
<input type="text" placeholder="Username" class="form-control" style="width:200px;" name="username" />
</div>
<div class="form-group">
<input type="password" placeholder="Password" class="form-control" style="width:200px;" name="password" />
</div>
<div class="form-group">
<input class="btn btn-primary" type="submit" value="Login" />
</div>
</form>
</div>
</div>
</body>
</html>
<?php 
} ?>
