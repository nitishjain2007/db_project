<?php
session_start();
require 'connect.php';
?>
<?php
if($_GET['start'] == '1'){
	if(isset($_GET['update_id'])){
		$query = mysql_query("SELECT * FROM workers WHERE `id` = " . $_GET['update_id']);
		while($row = mysql_fetch_array($query)) : ?>
			<div class="form-group">
			<input type="text" placeholder="Name" name="name" class="form-control" value="<?php echo $row['name'];?>" />
			</div>
			<div class="form-group">
			<input type="text" placeholder="Type" name="type" class="form-control" value="<?php echo $row['type'];?>" />
			</div>
			<div class="form-group">
			<input type="email" placeholder="E-mail" name="email" class="form-control" value="<?php echo $row['emailid'];?>"/>
			</div>
			<div class="form-group">
			<input type="text" placeholder="Phone No" name="phone" class="form-control" value="<?php echo $row['phoneno'];?>"/>
			</div>
			<div class="form-group">
			<input type="text" placeholder="Salary" name="salary" class="form-control" value="<?php echo $row['salary'];?>"/>
			</div>
			<?php
			$query1 = mysql_query("SELECT * FROM workersAddress WHERE `ID` = " . $row['id']);
			while($row1 = mysql_fetch_array($query1)) : ?>
				<div class="form-group">
				<input type="text" placeholder="HouseNo" name="houseno" class="form-control" value="<?php echo $row1['HouseNo']; ?>" />
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