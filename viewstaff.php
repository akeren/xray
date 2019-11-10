<?php
session_start();
include('driver/config.php');
include('driver/functions.php');
include('driver/auth.php');

$select = mysqli_query($db, "select * from users u join login l using(userid) order by sname");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>View Staff</title>
	</head>
	<body>
		<table width="100%" border="1" style="border-collapse: collapse;">
			<?php
			  if(mysqli_num_rows($select) > 0){ ?>
			<tr>
				<td>USER ID</td>
				<td>TITLE</td>
				<td>STAFF NAME</td>
				<td>SEX</td>
				<td>ROLE</td>
			</tr>
		   <?php 
		   while($staff = mysqli_fetch_array($select)){
		   ?>
			<tr>
				<td><?=$staff['userid']; ?></td>
				<td><?=$staff['salutation']; ?></td>
				<td><?=name($staff['userid'],$db); ?></td>
				<td><?=$staff['sex']=="M"?"Male":"Female"; ?></td>
				<td><?=$staff['role']; ?></td>
			</tr>
			<?php } } else {?>
			<tr>
			<td colspan="5">No record Found!</td>
			</tr>
			<?php } ?>
		</table>
	</body>
</html>
