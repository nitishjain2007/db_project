<?php
session_start();
require 'connect.php';
?>
<?php
if($_GET['start'] == '1'){
	if(isset($_GET['update_id'])){
		$query = mysql_query("SELECT * FROM customer WHERE `ID` = " . $_GET['update_id']);
		while($row = mysql_fetch_array($query)) : ?>
			<div class="form-group">
			<input type="text" placeholder="Name" name="name" class="form-control" value="<?php echo $row['Name'];?>" />
			</div>
			<div class="form-group">
			<input type="text" placeholder="Type" name="type" class="form-control" value="<?php echo $row['Type'];?>" />
			</div>
			<?php 
			$query2 = mysql_query("SELECT * FROM registeredCustomer WHERE `ID` = " . $row['ID']);
			while($row2 = mysql_fetch_array($query2)) : ?>
				<div class="form-group">
				<input type="email" placeholder="E-mail" name="email" class="form-control" value="<?php echo $row2['Email'];?>"/>
				</div>
				<div class="form-group">
				<input type="text" placeholder="Phone No" name="phone" class="form-control" value="<?php echo $row2['PhoneNo'];?>"/>
				</div>
			<?php endwhile; ?>
			<?php
			$query1 = mysql_query("SELECT * FROM customerAddress WHERE `ID` = " . $row['ID']);
			while($row1 = mysql_fetch_array($query1)) : ?>
				<div class="form-group">
				<input type="text" placeholder="HouseNo" class="form-control"name="houseno" value="<?php echo $row1['HouseNo']; ?>" />
				</div>
				<div class="form-group">
				<input type="text" placeholder="Street" name="street" class="form-control" value="<?php echo $row1['Street'];?>" />
				</div>
				<div class="form-group">
				<input type="text" placeholder="City" name="city" class="form-control" value="<?php echo $row1['City'];?>" />
				</div>
				<div class="form-group">
				<input type="text" placeholder="State" name="state" class="form-control" value="<?php echo $row1['State']; ?>"/>
				</div>
				<div class="form-group">
				<input type="text" placeholder="ZIP" name="zip" class="form-control" value="<?php echo $row1['ZIP']; ?>" />
				</div>
			<?php endwhile; ?>
			<input type="hidden" name="start" value="2" />
			<input type="hidden" name="updateid" value="<?php echo $_GET['update_id'];?>" />
		<?php endwhile;
	}
	else{
		$_SESSION['message'] = "Something went seriously wrong";
		header('Location: home.php');
	}
}
?>
