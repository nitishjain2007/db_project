<?php
session_start();
require 'connect.php'; 
if($_SESSION["type"] == 'C'){
	$query = mysql_query("SELECT * FROM storeRoom"); ?>
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
	<table class="fancy">
	<tr>
	<th>Item</th>
	<th>Price</th>
	</tr>
	<?php while($row = mysql_fetch_array($query)) : ?>
		<tr>
		<td><?php echo $row['Item']; ?></td>
		<td><?php echo $row['Price']; ?></td>
		</tr>
		<?php endwhile; 
}
else{
	echo "You don't have permissions to view contents of this page";	
}
?>