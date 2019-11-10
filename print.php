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
<title>Patient Radiograph | X-RAY FILMS DIGITALIZATION SYSTEM</title>

<link rel="stylesheet" href="css/form.css" />
<style>
@media print{
	.noprint{
		display:none;
	}
}
</style>
</head>

<body>
<form method="post">
<table width="100%">
<tr>
<td colspan="2" align="center"><h1 style="margin:0px;">X-RAY FILMS DIGITALIZATION SYSTEM</h1><BR /><H4 style="margin-top:1px;">Stitched Radiograph</H4></td>
</tr>
<tr>
<td colspan="2"><img id="show" src="<?php echo $details['radiograph']; ?>" height="500" width="100%" onmouseover="showMore()" onmouseout="showLess()"  />
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>

<tr>
<td>Patient ID</td>
<td><?php echo $details['patient']; ?></td>
</tr>
<?php
if($details['status'] == "1"){
?>

<?php }
else  if($details['status']=="0"){ ?>
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
<tr class="noprint">
<td colspan="2" align="center"><a href="javascript:" onclick="window.print();">[Print]</a></td>
</tr>
</table>
</form>
</body>
</html>