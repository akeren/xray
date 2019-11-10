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
<table width="100%">
<?php
		$rad = mysqli_query($db, "select * from radiographs");
		if(mysqli_num_rows($rad) > 0){
	?>
    <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
<tr>
<td><strong>PATIENT</strong></td>
<td><strong>DATE</strong></td>
<td><strong>RADIOTHERAPIST</strong></td>
<td width="40%"><strong>DESCRIPTION</strong></td>
<td><strong>STATUS</strong></td>
<td><strong>DETAILS</strong></td>
</tr>
<?php while($radiographs = mysqli_fetch_array($rad, MYSQLI_ASSOC)){ ?>
<tr>
<td><?php echo $radiographs['patient']; ?></td>
<td><?php echo $radiographs['date']; ?></td>
<td><?php echo name($radiographs['radiologist'], $db); ?></td>
<td><?php echo $radiographs['description']; ?></td>
<td><?php echo ($radiographs['status'] > 0)?($radiographs['status'] == 1)?"Pending":"Referred":"Interpreted" ; ?></td>
<td><a href="javascript:" onclick="open_win('print.php?id=<?php echo $radiographs['radid']; ?>')">Details</a></td>
</tr>
<?php }} else {?>
<tr>
<td colspan="4" align="center">NO RADIOGRAPHS FOUND!</td>

</tr>
<?php } ?> 
</table>
</form>
</body>
</html>