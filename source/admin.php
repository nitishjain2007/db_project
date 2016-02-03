<?php
session_start(); 
require 'connect.php';
if($_SESSION['type'] == 'A'){ ?>
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
</head>
<?php $query = mysql_query("SELECT * FROM user"); ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Admin</h4>
      </div>
      <form method="post" action="adduser.php">
      <div class="modal-body">
      	<div class="form-group">
			<input type="text" class="form-control" placeholder="Name" name="name" />
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Username" name="username" />
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" />
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Re-enter Password" name="repassword" />
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Add Admin">
      </div>
</form>
    </div>
  </div>
</div>
<table class="fancy">
<tr>
<th>Username</th>
<th>Active</th>
<th>Type</th>
<th>TypeId</th>
<th>Action</th>
</tr>
<?php while($row = mysql_fetch_array($query)) : ?>
	<tr>
	<td><?php echo $row['username']; ?></td>
	<td><?php echo $row['active']; ?></td>
	<td><?php echo $row['Type']; ?></td>
	<td><?php echo $row['TypeId'] ?></td>
	<td>
	<form action="delete.php" method="post">
        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>" />
        <input type="hidden" name="typed" value="<?php echo $row['Type']; ?>" />
        <input type="hidden" name="typedid" value="<?php echo $row['TypeId']; ?>" />
        <input type="submit" value="Delete" />
    </form>
    </td>
    </tr>
<?php endwhile; ?>
</table>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Admins
</button>
<button onclick="createtable()" class="btn btn-primary">Create Table</button>
<div id="tableformdiv" style="display:none;">
<form id="tableform" method="post" action="addtable.php">
<input type="text" placeholder="Table Name" name="tablename"/>
<table id="fields">
<tr>
<td>Field Name</td>
<td>Type</td>
<td>Length</td>
<td>Auto Increment</td>
<td>Index</td>
</tr>
<tr>
<td><input type="text" name="field1" style="width:100px;"/></td>
<td><select name="field1type">
	<option value="INT">INT</option>
	<option value="VARCHAR">VARCHAR</option>
	<option value="TEXT">TEXT</option>
	<option value="DATE">DATE</option>
</select></td>
<td><input type="text" name="field1length" style="width:100px;"/></td>
<td><input type="checkbox" name="field1autoinc" value="AUTO INCREMENT"></td>
<td><select name="field1index">
	<option value="--">--</option>
	<option value="PRIMARY KEY">PRIMARY</option>
	<option value="UNIQUE">UNIQUE</option>
</select></td>
</tr>
</table>
<input type="int" value="1" name="total" id="totala" style="display:none;"/>
<button type="button" onclick="addfield()">Add Field</button>
<input type="submit" value="Submit">
</form>
</div>
<?php }else{
	echo $_SESSION["type"];
	echo "You don't have permissions to see the contents of this page";
} ?>
