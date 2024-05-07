<?php
session_start();
include("connection.php");
?>
<html>
<head>
<title>Add Contact Us</title>
<link  href="mystyles.css" rel="stylesheet" type="text/css"  />
</head>
<body style="background-color: #FFDEAD">
<center>
<div id="divWrapper">
<table>
<tr><td><div id="divHeader">		
		<?php
		include("../header.php");
	   ?></div></td></tr>
<tr><td colspan="3">
<div id="navmenu">
<div id="menu">
<?php
require("menu.php");
?>
Well come This Is Adiministrator Page
</div>
</div>
</td></tr>

<tr><td><div id="divSideContentLeft">

<h1>Management Links</h1>
<?php
include("Sidemenu.php");
?>


</div></td><td>
<div id="divContentCenter">
<?php
			if(isset($_POST['send']))
			{
				$position=$_POST['position'];
				$fname=$_POST['fname'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$sql=mysql_query("insert into contact(position,fname,email,phone) values('$position','$fname','$email','$phone')");
				if(!$sql)
				{
					die("Data not inserted:".mysql_error());
				}
				else
				{
					echo "contact has been sent successfully1";
				}
			}
?>
<form action="" method="post">
<table>
<tr><th colspan="2"><h1>Add contact us</h1></th></tr>
<tr><td>position:</td><td><input type="text" name="position" pattern="[a-zA-Z ]+" required=""></td></tr>
<tr><td>FirstName:</td><td><input type="text" name="fname" pattern="[a-zA-Z ]+" required=""></td></tr>
<tr><td>Email:</td><td><input type="email" name="email" required=""></td></tr>
<tr><td>phone:</td><td><input type="text"name="phone"required=""pattern="[0-9-+]+" value="+2519-000-000-00"></td></tr>
<tr><td><input type="submit" value="Send" name="send">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset"></td></tr>
</table>
</form>
</div></td><td>
		<div id="divSideContentRight">
		<img src="admin.jpg" height="100%"width="100%">
			</div>	
		</td>
		</tr>
		<tr><td colspan="3">
		<?php
		include("footer.php");
?>
</td></tr></table>
</div>
</center>

</body>
</html>