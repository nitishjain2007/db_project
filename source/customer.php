<?php
session_start();
require 'connect.php'; 
if($_SESSION['type'] == 'A' || $_SESSION['type2'] == 'C'){ ?>
<head>
<script>
function update(id){
	$('#body2').load("updatecustomer.php?update_id=" + id + "&start=1");
	document.getElementById("button2").click();
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
</head>
<body>
	<?php $query = mysql_query("SELECT * FROM customer"); ?>
	<table class="fancy">
	<tr>
	<th>Name</th>
	<th>Type</th>
	<th>Email</th>
	<th>PhoneNo</th>
	<th>Address</th>
	<th>Action</th>
	</tr>
	<?php while($row = mysql_fetch_array($query)) : ?>
		<tr>
		<td><?php echo $row['Name']; ?></td>
		<td><?php echo $row['Type']; ?></td>
		<?php if($row['Type'] == 'R'){
			$query2 = mysql_query("SELECT * FROM registeredCustomer WHERE `ID` = " . $row['ID']);
			while($row2 = mysql_fetch_array($query2)) : ?>
			<td><?php echo $row2['Email'];?></td>
			<td><?php echo $row2['PhoneNo'];?></td>
			<?php endwhile;
			$query1 = mysql_query("SELECT * FROM customerAddress WHERE `ID` = " . $row['ID']);
			while($row1 = mysql_fetch_array($query1)) : ?>
			<td><?php echo $row1['HouseNo'] . ", " . $row1['Street'] . ", " . $row1['City'] . ", " . $row1['State'] . ", ZIP: " . $row1['ZIP']; ?>
			</td>
			<?php endwhile; ?>
		<?php } 
		else{
			echo "<td></td><td></td><td></td>";
			}?>
		<td>
		<form action="deletecustomer.php" method="post" style="float:left;">
	        <input type="hidden" name="delete_id" value="<?php echo $row['ID']; ?>" />
	        <input type="hidden" name="typeid" value="<?php echo $row['Type']; ?>" />
	        <input type="submit" value="Delete" />
	    </form>
        	<input type="hidden" name="update_id" id="updateid" value="<?php echo $row['ID']; ?>" />
        	<input type="hidden" name="start" id="startid" value="1" />
        	<button type="button" onclick="update('<?php echo $row['ID']; ?>')">Update</button>
	    </td>
	    </tr>
	<?php endwhile; ?>
</table>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="add1">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <form method="post" action="addcustomer.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Customer</h4>
      </div>
      <div class="modal-body">
      <div class="form-group">
      	<input type="text" class="form-control" placeholder="Name" name="name" />
      </div>
      <div class="form-group">
		<input type="text" class="form-control" placeholder="Type" name="type" />
	  </div>
	  <div class="form-group">
		<input type="username" class="form-control" placeholder="Username" name="username" />
	  </div>
	  <div class="form-group">
		<input type="password" class="form-control" placeholder="Password" name="password" />
	  </div>
	  <div class="form-group">
		<input type="password" class="form-control" placeholder="Re-enter Password" name="repassword" />
	  </div>
	  <div class="form-group">
		<input type="email" class="form-control" placeholder="E-mail" name="email" />
	  </div>
	  <div class="form-group">
		<input type="text" class="form-control" placeholder="Phone No" name="phone" />
	  </div>
	  <div class="form-group">
		<input type="text" class="form-control" placeholder="HouseNo" name="houseno" />
	  </div>
	  <div class="form-group">
		<input type="text" class="form-control" placeholder="Street" name="street" />
	  </div>
	  <div class="form-group">
		<input type="text" class="form-control" placeholder="City" name="city" />
	  </div>
	  <div class="form-group">
		<input type="text" class="form-control" placeholder="State" name="state" />
	  </div>
	  <div class="form-group">
		<input type="text" class="form-control" placeholder="ZIP" name="zip" />
	  </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" Value="AddCustomer" />
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="add2">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <form method="post" action="updatecustomer1.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Customer</h4>
      </div>
      <div class="modal-body" id="body2">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" Value="Update Customer Info" />
      </div>
      </form>
    </div>
  </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add1">Add New Customer</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add2" id="button2" style="display:none;">Update</button>
<script>
function showform(){
	$('#addcustomerform').show();
	$('#addcustbutton').hide();
}
</script>
</body>
<?php }else{
	echo "You Don't have permissions to view contents of this page";
} ?>

