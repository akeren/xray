<?php
include('driver/config.php');
session_start();

if(isset($_POST['send'])){
	$total = mysqli_num_rows(mysqli_query($db, "select * from radiographs")) + 1;
	$patient = $_POST['patient'];
	$radiologist = $_POST['radiologist'];
	$radiographer = $_SESSION['userid'];
	$radiograph = $_GET['img'];
	$desc = $_POST['desc'];
	$radid = $patient.$total;
	$date = date('Y-n-d');
	
	$send = mysqli_query($db, "insert into radiographs(radid, radiographer, radiologist, patient, radiograph, description, date, seen,status) values('$radid', '$radiographer', '$radiologist', '$patient', '$radiograph', '$desc', '$date', '0', '1')");
	if($send) $msg = "Radiograph Forwarded Successfully!";
	else $msg = "Radiograph Forwarding Failed!";

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
function showMore(){
	document.getElementById("show").style.height = "300px";
	document.getElementById("show").style.width = "900px";
}

function showLess(){
	document.getElementById("show").style.height = "200px";
	document.getElementById("show").style.width = "200px";
}
</script>
<link rel="stylesheet" href="css/form.css" />

</head>

<body>
<form method="post">
<table width="100%">
<tr>
<td>&nbsp;</td>
<td><?php echo $msg!=""?$msg:"" ?></td>
</tr>
<tr>
<td colspan="2">
<img id="show" src="<?php echo $_GET['img']; ?>" height="200" width="200" onmouseover="showMore()" onmouseout="showLess()"  />
</td>
</tr>
<tr>
<td width="30%">PATIENT ID</td>
<td width="70%"><input type="text" name="patient" required class="text" /></td>
</tr>

<tr>
<td>RADIOTHERAPIST</td>
<td>
<select name="radiologist" class="select">
<option value="">--Select Radiologist--</option>
<?php 
$select = mysqli_query($db, "select u.userid,concat_ws(' ',u.salutation, u.mname, u.sname, u.fname) as name from users u join login l on u.userid = l.userid where l.role = 'Radiotherapist'");
while($therapists = mysqli_fetch_array($select, MYSQLI_ASSOC)){
?>
<option value="<?php echo $therapists['userid']; ?>"><?php echo $therapists['name']; ?></option>
<?php } ?>
</select>
</td>
</tr>

<tr>
<td>RADIOGRAPH DESCRIPTION</td>
<td>
<textarea name="desc" cols="45" rows="3" class="textarea"></textarea>
</td>
</tr>

<tr>
<td>&nbsp;</td>
<td>
<input type="submit" name="send" value="SEND"  />
</td>
</tr>
</table>
</form>
</body>
</html>