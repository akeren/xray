<?php
include('driver/config.php');
session_start();

if(isset($_POST['sign'])){
	$pwd = $_POST['password'];
	$username = $_POST['username'];
	
	$check = mysqli_query($db,"select * from login where userid = '$username'");
	
	if(mysqli_num_rows($check) > 0){
		
		$login = mysqli_fetch_array($check, MYSQLI_ASSOC);
		if($login['password']==$pwd){
			
			$_SESSION['logged'] = 1;
			$_SESSION['userid'] = $username;
			$_SESSION['role'] = $login['role'];
			header('location:home.php');
			
		}
		else{
			$error = "Invalid Password!";
		}
		
	}
	else{
		$error = "Invalid Login Credentials!";
	}
}

?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>HOSPITAL - Login Page</title>
        <style>
		a{
			text-decoration:none;
		}
		</style>
    </head>
    <body style="margin-top:0px;">
<table align="center" width="70%" height="600" border="1" style="border-collapse:collapse; border-style:solid;">
<tr>
<td width="30%" height="100"><img height="100%" width="100%" src="images/download.jpg" ></td>
<td height="80" colspan="2" align="center" bgcolor="black">
 <h2 style="color:#ffF;">X-RAY FILMS DIGITALIZATION SYSTEM</h2>
</td>
</tr>
<tr style="border: 0px;">
    <td colspan="3" height="20%"  style="border-top: 0px; border-bottom: 0px;"><br><br><br> &nbsp;</td>
</tr>
<tr>
<td height="50%" colspan="3" align="center" style="border-top: 0px; border-bottom: 0px;">
<font face="Georgia, Times New Roman, Times, serif"><strong>Staff Login</strong></font>
<br /><br />
<form method="post">
<table style="border-radius:10px; background-color:#000; " align="center" width="51%">
<tr>
    <td colspan="2" align="center" style="color:#F00;"><strong><?php echo $error!=""?$error:"" ?></strong></td>
</tr>
<tr>
<td><strong style="color:#FFF;">USERNAME</strong></td>
<td><input type="text" name="username" required oninvalid="setCustomValidity('Pls Enter Username! ')"
    onchange="try{setCustomValidity('')}catch(e){}" /></td>
</tr>
<tr>
<td><strong style="color:#FFF;">PASSWORD</strong></td>
<td><input type="password" name="password" required oninvalid="setCustomValidity('Pls Enter Password! ')"
    onchange="try{setCustomValidity('')}catch(e){}" /></td>
</tr>
<tr>
<td colspan="2" align="center"><br><input type="submit" value="SIGN IN" name="sign" ></td>
</tr>

</table>
</form>
</td>
</tr>
<tr style="border: 0px;">
    <td colspan="3" height="130"  style="border-top: 0px; border-bottom: 0px;"><br><br><br> &nbsp;</td>
</tr>
</table>
<center><br /><font color="#000000" size="+1" face="Georgia, Times New Roman, Times, serif">&copy; Hulugh 2015</font>
</center>
    </body>
</html>
