<?php
session_start();
include('driver/config.php');
include('driver/auth.php');

?>
<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

            <title>HOME | Image Digitization System</title>
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/form.css" />
            <style type="text/css">
			a:hover {
	color:#FFFFFF;
	border:3px #ADADAD;
	border-top-style:outset;
	border-bottom-style:outset;
	border-left-style:inset;
	border-right-style:inset;
	
			}
			a:active {
	color:#FFFFFF;
	border:3px #ADADAD;
	border-top-style:outset;
	border-bottom-style:outset;
	border-left-style:inset;
	border-right-style:inset;
	
			}
</style>
        </head>
        <body style="font-family:Georgia, 'Times New Roman', Times, serif; border-top:0px; margin-top:0px; padding-top:0px;  background: #eee;" bgcolor="#FFFFFF" >
            <table width="85%" align="center" style="border-top:0px; margin-top:0px; padding-top:0px; ">
                <tr>
                    <td style="padding:0px;" height="100" valign="top"><div id="headerwrap" style="width:100%; background-color:#FFF;">
                            <!-- Repeats image across top of page -->
                            <div id="header" style="width:100%; background:url(images/download.jpg) no-repeat left center;
                            background-size: 20% 90%">

                                <h1 style="font-family:Georgia, 'Times New Roman', Times, serif; width:100%; height:100%; background:url(images/download.jpg) no-repeat right center;
                            background-size: 20% 90%; text-align:center; vertical-align:middle;" align="center" ><strong><br />X-RAY FILMS DIGITALIZATION SYSTEM<br></strong></h1>                                <!-- Close header -->
                            </div>
                            <!-- Close headerwrap -->
                        </div></td>
                </tr>
                <tr>
                    <td style="border:0px;" valign="top"><div id="navwrap"  style=" padding:0px; margin:0px;  border:0px;  background:url(images/button1a_2.gif) no-repeat; background-size: 1500px 500px;">
                            <!-- Repeats image across page behind navigation -->
                            <div id="menu" style=" background:url(images/button4_2.gif) padding:0px; border:0px; width:100%; margin:0px;">
                                <ul id="MenuBar2" class="MenuBarHorizontal">
                                    <li><a href="addstaff.php" target="main">Add Staff</a></li>
                                    <li><a href="viewstaff.php" target="main">View Staff</a></li>
                                    <li><a href="stitch.php" target="main">Upload Radiographs(Parts)</a></li>
                                    <li><a href="viewradiographs.php" target="main">View Radiographs</a></li>
                                    <li><a href="viewall.php" target="main">View All Radiographs</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul></div></div>
                    </td>
                </tr>
                <tr>
                    <td valign="top" style="padding:0px;" >
                        <iframe name="main" height="460" style="border:0px; padding:0px; width:100%; background-color:#FFF; overflow-y: hidden" src="welcome.php" scrolling="no"></iframe>
                    </td>
                </tr>
            </table>
            <center>
                <font color="#003366" size="+1" face="Georgia, Times New Roman, Times, serif">&copy; Hulugh 2015</font>
            </center>
        </body>
          <script type="text/javascript">
            var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
        </script>
    </html>