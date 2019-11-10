<?php
include('driver/config.php');
include('driver/functions.php');
session_start();

if(isset($_POST['prescribe'])){
	$id = $_GET['id'];
	$message = $_POST['message'];
	$prescription = $_POST['prescription'];
	$interpretation = $_POST['interpretation'];
	$accept = $_POST['accept'];
	if($accept =="a") $update = mysqli_query($db, "update radiographs set interpretation = '$interpretation', prescription = '$prescription', status = '0' where radid = '$id'");
	else $update = mysqli_query($db, "update radiographs set message = '$message', status = '2' where radid = '$id'");
	
	if($update) $msg = "Posted Successfully!";
	else $msg = "Posting Failed";
}


$select = mysqli_query($db, "select * from radiographs where radid = '{$_GET['id']}'");

$details = mysqli_fetch_array($select, MYSQLI_ASSOC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
function showMore(){
	document.getElementById("show").style.height = "300px";
}

function showLess(){
	document.getElementById("show").style.height = "200px";
}
</script>
<link rel="stylesheet" href="css/form.css" />
</head>

<body>
<form method="post">
<table width="100%">
<tr>
<td></td>
<td><?php echo $msg!=""?$msg:"" ?></td>
</tr>
<tr>
<td colspan="2"><img id="show" src="<?php echo $details['radiograph']; ?>" height="200" width="100%" onmouseover="showMore()" onmouseout="showLess()"  />
</td>
</tr>
<?php
if($details['status'] == "1"){
?>
<tr>
<td>Action</td>
<td><input type="radio" name="accept" id="a" onclick="this.form.submit()" value="a"  <?php echo $_POST['accept']=="a"?"checked":"" ?> /><label for="a">Accept</label><input type="radio" name="accept" id="r"  onclick="this.form.submit()" value="r" <?php echo $_POST['accept']=="r"?"checked":"" ?>  /><label for="r"> Request For Another X-ray</label>
<input type="radio" name="accept" id="re"  onclick="this.form.submit()" value="re" <?php echo $_POST['accept']=="re"?"checked":"" ?>  /><label for="re"> Refer To Another Professional</label></td>
</tr>
<?php if(isset($_POST['accept'])){ 
		if($_POST['accept'] == "a"){ 
?>
<tr>
<td>Interpretation</td>
<td><textarea name="interpretation" required cols="45" rows="3" class="textarea"></textarea>
</td>
</tr>

<tr>
<td>Prescription</td>
<td><textarea name="prescription" required cols="45" rows="3" class="textarea"></textarea>
</td>
</tr>
<?php } else if($_POST['accept']=="r") { ?>
<tr>
<td>Message</td>
<td><textarea name="message" required cols="45" rows="3" class="textarea"></textarea>
</td>
</tr>
<?php } 
else { ?>
<tr>
<td>Remote Radiotherapist</td>
<td>
<select name="radiologist" class="select">
<option value="">--Select Radiotherapist--</option>
<?php 
$select = mysqli_query($db, "select u.userid,concat_ws(' ',u.salutation, u.mname, u.sname, u.fname) as name from users u join login l on u.userid = l.userid where l.role = 'Radiotherapist'");
while($therapists = mysqli_fetch_array($select, MYSQLI_ASSOC)){
?>
<option value="<?php echo $therapists['userid']; ?>"><?php echo $therapists['name']; ?></option>
<?php } ?>
</select>
</td>
</tr>
<?php } ?>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="prescribe" value="SUBMIT" />
</td>
</tr>
<?php }} else if($details['status']=="0"){ ?>
<tr>
<td>Interpretation</td>
<td><?php echo $details['interpretation']; ?></td>
</tr>
<tr>
<td>Prescription</td>
<td><?php echo $details['prescription']; ?></td>
</tr>
<?php } else { ?>
<tr>
<td>Message</td>
<td><?php echo $details['message']; ?></td>
</tr>
<?php } ?>

</table>
</form>
</body>
</html>