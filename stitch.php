<?php
include('driver/config.php');
include('merging.php');
session_start();

$fmat = mysqli_query($db, "select * from formats where formatid = '{$_POST['format']}'");
$details = mysqli_fetch_array($fmat, MYSQL_ASSOC);

if(isset($_POST['stitch'])){
	
	$total = mysqli_num_rows(mysqli_query($db, "select * from radiographs")) + 1;
	 
	$part1 = $_FILES['part1']['name'];
	$part2 = $_FILES['part2']['name'];
	$part3 = $_FILES['part3']['name'];
	$part4 = $_FILES['part4']['name'];
	

	$size1 = $_FILES['part1']['size'];
	$size2= $_FILES['part2']['size'];
	$size3 = $_FILES['part3']['size'];
	$size4 = $_FILES['part4']['size'];

	$tmp1 = $_FILES['part1']['tmp_name'];
	$tmp2 = $_FILES['part2']['tmp_name'];
	$tmp3 = $_FILES['part3']['tmp_name'];
	$tmp4 = $_FILES['part4']['tmp_name'];
	
	$location = "files/";
	move_uploaded_file($tmp1, $location.$part1);
	move_uploaded_file($tmp2, $location.$part2);
	move_uploaded_file($tmp3, $location.$part3);
	move_uploaded_file($tmp4, $location.$part4);

	$max = 1048576;
	$fmart = $_POST['format'];
	$number = $_POST['number'];
	$file = "files/rad".$total.".jpg";
	if($number == 2){
		if($fmart == "2h"){
			$merge = mergeTwoUp($location.$part1, $location.$part2, $file);
		}
		else {
			$merge = mergeTwoDown($location.$part1, $location.$part2, $file);
		}
	}
	
	if($number == 3){
		if($fmart == "3h"){
			$merge = mergeThreeUp($location.$part1, $location.$part2, $location.$part3, $file);
		}
		else 
		{
			$merge = mergeThreeDown($location.$part1, $location.$part2, $location.$part3, $file);
		}
	}
	
	if($number == 4){
		if($fmart == "4h"){
			 $merge = mergeFourUp($location.$part1, $location.$part2, $location.$part3, $location.$part4, $file);
		}
		else if($fmart == "4v"){
			 $merge = mergeFourDown($location.$part1, $location.$part2, $location.$part3, $location.$part4, $file);
		}
		else{
			 $merge = mergeFourSquare($location.$part1, $location.$part2, $location.$part3, $location.$part4, $file);			
		}
		
		
	}
		
	if($merge){
			header('location:send.php?img='.$merge);
		}
		else{
			$msg = "Image Stitching Failed!";
		}
		
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="css/form.css" />
</head>

<body>
<form method="post" enctype="multipart/form-data">
<table>
<tr>
<td colspan="3"><?php echo $msg!=""?$msg:"" ?></td>
</tr>
<tr>
<td>NUMBER OF PARTS</td>
<td>
<select name="number" onchange="this.form.submit()" class="select">
<option value="">--Select Number of X-ray Parts--</option>
<option value="2" <?php echo $_POST['number'] == "2"?"selected":""; ?>>2</option>
<option value="3" <?php echo $_POST['number'] == "3"?"selected":""; ?>>3</option>
<option value="4" <?php echo $_POST['number'] == "4"?"selected":""; ?>>4</option>

</select>
</td>
<?php  if(isset($_POST['format'])){  ?>
<td rowspan="2" style="padding-left:20px"><img height="160" width="160" src="images/<?php echo $details['picture'] ?>" ?></td>
<?php } ?>
</tr>

<?php  if(isset($_POST['number'])){ 

?>
<tr>
<td>SELECT FORMAT</td>
<td>
<select name="format" onchange="this.form.submit()" class="select">
<option value="">--Select Stitching Format--</option>
<?php 
$format = mysqli_query($db, "select * from formats where number = '{$_POST['number']}'");
while($formats = mysqli_fetch_array($format)){
?>
<option value="<?php echo $formats['formatid']; ?>" <?php echo $formats['formatid'] == $_POST['format']?"selected":""; ?>><?php echo $formats['description']; ?></option>
<?php } ?>
</select>
</td>
</tr>

<?php 

	if($_POST['format']!= ""){

if($_POST['number'] == 2 || $_POST['number'] == 3 || $_POST['number'] == 4){ ?>
<tr>
<td>1st PART</td>
<td><input type="file" name="part1" /></td>
</tr>

<tr>
<td>2nd PART</td>
<td><input type="file" name="part2" /></td>
</tr>
<?php }
 if($_POST['number'] == 3 || $_POST['number'] == 4){ ?>
<tr>
<td>3rd PART</td>
<td><input type="file" name="part3" /></td>
</tr>
<?php
} if($_POST['number'] == 4){ ?>
<tr>
<td>4th PATH</td>
<td><input type="file" name="part4" /></td>
</tr>
<?php }}?>
<tr>
<td></td>
<td><input type="submit" value="STITCH" name="stitch"  /></td>
</tr>
<?php } ?>
</table>
</form>
</body>
</html>
