<?php
include('driver/config.php');
include('driver/functions.php');
include('driver/auth.php');

session_start();

$update = mysqli_query($db, "update radiographs set seen = '1' where radiologist = '{$_SESSION['userid']}' and status = '1'");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="css/form.css" />
<script type="text/javascript">
                function open_win(url_add)
                {
                window.open(url_add,"","toolbar=no, close=no, channelmode=no,titlebar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, top=100,left=350, resizable=no, copyhistory=no, width=700, height=500");
                }
        </script>
        </head>
<body>
<form method="post">
<table width="100%">
<tr>
<td>SELECT CATEGORY</td>
<td colspan="3">

<select name="cat" class="select" onchange="this.form.submit()">
<option value="">--Select Category--</option>
<option value="1" <?php echo $_POST['cat'] =="1" || $_GET['id']!=""?"selected":"" ?>>New</option>
<option value="0" <?php echo $_POST['cat'] =="0"?"selected":"" ?>>Interpreted</option>
<option value="2" <?php echo $_POST['cat'] =="2"?"selected":"" ?>>Reverted</option>
</select>
</td>
</tr>
<?php 
	if($_POST['cat']!="" || $_GET['id']!=""){
		$rad = mysqli_query($db, "select * from radiographs where status = '{$_POST['cat']}' or status = '{$_GET['id']}'");
		if(mysqli_num_rows($rad) > 0){
	?>
    <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
<tr>
<td><strong>PATIENT</strong></td>
<td><strong>RADIOGRAPHER</strong></td>
<td width="40%"><strong>DESCRIPTION</strong></td>
<td><strong>DETAILS</strong></td>
</tr>
<?php while($radiographs = mysqli_fetch_array($rad, MYSQLI_ASSOC)){ ?>
<tr>
<td><?php echo $radiographs['patient']; ?></td>
<td><?php echo name($radiographs['radiographer'], $db); ?></td>
<td><?php echo $radiographs['description']; ?></td>
<td><a href="javascript:" onclick="open_win('details.php?id=<?php echo $radiographs['radid']; ?>')">Details</a></td>
</tr>
<?php }} else {?>
<tr>
<td colspan="4" align="center">NO RADIOGRAPHS FOUND!</td>

</tr>
<?php }} ?> 
</table>
</form>
</body>
</html>