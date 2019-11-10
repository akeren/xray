<?php
session_start();
include('driver/config.php');
include('driver/functions.php');
include('driver/auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h2>Hello,<br /> <?php echo name($_SESSION['userid'],$db); ?></h2>
<h3>You Logged in as a <em><?php echo $_SESSION['role']; ?></em></h3>
<?php
if($_SESSION['role'] == "Radiographer"){
$radiographer = mysqli_query($db, "select * from radiographs where seen = '0' and status = '2' and radiographer = '{$_SESSION['userid']}'");
	if(mysqli_num_rows($radiographer) > 0){ ?>
    <a href="specifications.php?id=1" style="color:#F00">You <?php echo mysqli_num_rows($radiographer); ?> have Specification(s) From The Radiotherapist</a>
<?php
	}
}

if($_SESSION['role'] == "Radiotherapist"){

$radiotherapist = mysqli_query($db, "select * from radiographs where seen = '0' and status = '1' and radiologist = '{$_SESSION['userid']}'");
	if(mysqli_num_rows($radiotherapist) > 0){ ?>
        <a href="viewradiographs.php?id=1" style="color:#F00">You have <?php echo mysqli_num_rows($radiotherapist); ?> Radiograph(s) to attend to</a>

<?php
	}
}

?>
</body>
</html>