<?php
session_start();
include('driver/config.php');
include('driver/functions.php');
include('driver/auth.php');

if(isset($_POST['add'])){
	
	$userid = userid($db); 
	$salutation = $_POST['salutation']; 
	$sname = $_POST['sname']; 
	$fname = $_POST['fname']; 
	$mname = $_POST['mname']; 
	$sex = $_POST['sex'];
	$role = $_POST['role'];
	
	$add = mysqli_query($db, "insert into users(userid, salutation, sname, fname, mname, sex, status) values('$userid', '$salutation', '$sname', '$fname', '$mname', '$sex', '1')");
	
	if($add){
		$login = mysqli_query($db, "insert into login(userid, password, role, status) values('$userid', '$userid', '$role', '1')");
		if($login){
			header('location:success.php?id='.$userid);
		}
		else {
			$delete = mysqli_query($db, "delete from users where userid = '$userid'");
			$error = "Operation Failed!";
		}
	}
	
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Add Staff</title>
    </head>
    <body>
        <form method="post">
            <table width="100%">
                <tr>
                    <td colspan="2" align="center" style="color:#F00; font-size:14px;"><?=$error!=""?$error:"" ?></td>
                </tr>
                <tr>
                    <td>SALUTATION</td>
                    <td>
                        <input type="text" name="salutation" required style="width:200px;"/>
                    </td>
                </tr>
                <tr>
                    <td>SURNAME</td>
                    <td><input name="sname" type="text" required style="width:200px;"/></td>
                </tr>
                <tr>
                    <td>FIRST NAME</td>
                    <td><input name="fname" type="text" required style="width:200px;"/></td>
                </tr>
                <tr>
                    <td>MIDDLE NAME</td>
                    <td><input name="mname" type="text" required  style="width:200px;"/></td>
                </tr>
                <tr>
                    <td>SEX</td>
                    <td>
                    <select name="sex" required style="width:205px;">
                    <option value="">--Select Sex--</option>
                    <option value="F">Female</option>
                    <option value="M">Male</option>
                    
                    </select>
                   </td>
                </tr>
                <tr>
                    <td>ROLE</td>
                    <td>
                        <select name="role" required style="width:205px;">
                            <option value="">--Select Role--</option>
                            <option value="Radiographer">Radiographer</option>
                            <option value="Radiotherapist">Radiotherapist</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="add" value="ADD STAFF"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
