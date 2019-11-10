<?php
include('driver/config.php');
include('driver/functions.php');
include('driver/auth.php');
session_start();



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="css/form.css" />
</head>
<body>
<form method="post">
<table width="100%">
<tr>
<td>SELECT CATEGORY</td>
<td colspan="3">

<select name="cat" class="select" onchange="this.form.submit()">
<option value="">--Select Category--</option>
<option value="0" <?php echo ($_POST['cat'] =="0" || ($_GET['id']!=""))?"selected":"" ?>>New</option>
<option value="1" <?php echo $_POST['cat'] =="1"?"selected":"" ?>>Seen</option>
</select>
</td>
</tr>
<?php
if(isset($_POST['cat']) || $_GET['id']!=""){
	$seen = isset($_POST['cat'])?$_POST['cat']:0;
$radiographer = mysqli_query($db, "select * from radiographs where seen = '$seen' and status = '2' and radiographer = '{$_SESSION['userid']}'");

if(mysqli_num_rows($radiographer) > 0){ ?>
<tr>
<td><strong>PATIENT ID</strong></td>
<td><strong>SPECIFICATIONS</strong></td>
</tr>
<?php
while($specs =mysqli_fetch_array($radiographer, MYSQLI_ASSOC)){
?>
<tr>
<td><?php echo $specs['patient']; ?></td>
<td><?php echo $specs['message']; ?></td>
</tr>
<?php }
$update = mysqli_query($db, "update radiographs set seen = '1' where radiographer = '{$_SESSION['userid']}' and status = '2'");

}
else{ ?>
<tr>
<td colspan="2" align="center">THERE ARE NO SPECIFICATIONS!</td>
</tr>
<?php }} ?>
</table>
</form>
</body>
</html>