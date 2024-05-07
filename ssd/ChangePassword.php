<?php
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
include("../Database/connection.php");
?>
<html>
<link  href="../css/allcss.css" rel="stylesheet" type="text/css"/>
<head>
<title>Online Stuidenet Union Voting System</title>
<style>
.myButton {
	-moz-box-shadow:inset 0px 0px 14px -3px #f2fadc;
	-webkit-box-shadow:inset 0px 0px 14px -3px #f2fadc;
	box-shadow:inset 0px 0px 14px -3px #f2fadc;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #dbe6c4), color-stop(1, #9ba892));
	background:-moz-linear-gradient(top, #dbe6c4 5%, #9ba892 100%);
	background:-webkit-linear-gradient(top, #dbe6c4 5%, #9ba892 100%);
	background:-o-linear-gradient(top, #dbe6c4 5%, #9ba892 100%);
	background:-ms-linear-gradient(top, #dbe6c4 5%, #9ba892 100%);
	background:linear-gradient(to bottom, #dbe6c4 5%, #9ba892 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dbe6c4', endColorstr='#9ba892',GradientType=0);
	background-color:#dbe6c4;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #b2b8ad;
	display:inline-block;
	cursor:pointer;
	color:#fff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ced9bf;
	float: right;
	width: 250px;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #9ba892), color-stop(1, #dbe6c4));
	background:-moz-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:-webkit-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:-o-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:-ms-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:linear-gradient(to bottom, #9ba892 5%, #dbe6c4 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9ba892', endColorstr='#dbe6c4',GradientType=0);
	background-color:#9ba892;
}
.myButton:active {
	position:relative;
	top:1px;
}

	.textbox
	{
		height: 30px;
		width: 220px;
		font-family: Times New Roman;
		font-weight:italic;
		font-size: inherit;
		border: none;
		
	}
#content
{
	background-color: #dfdfdf;
	width: 740px;
	height: 550px;
	margin-left: 230px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: hidden;
}
#rightside
{
	background-color: #336699;
	width: 220px;
	height: 555px;
	float: right;
	margin-top: 5px;
	margin-right: 40px;
}
#calander
{
	margin-top: 1px;
	padding-top: 0px;
	width: auto;
	height: 190px;
}
</style>
<script type="text/javascript">
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
</head>
<body style="background-color: #FFf">
<div id="container">
		
		<div id="menu">
		<?php
include("../ssd/ssdmenu.php");
		?>
	</div>

				<div id="leftside">
					<div id="applyside">
						<?php
							include("../ssd/ssdsidemenu.php");
					   ?>	
					</div>    
				</div>
													<div id="rightside">
					<div style="background-color: #508abb;color: #fff;">
					<?php
					echo "<b>";
						echo "<img src='".$_SESSION['sphoto']."' width='220' height='230'/><br/>";
						echo "Student ServiceDirectorate:<br>".$_SESSION['username'];
						echo "</b>";
						?>
					</div> 
					<div id="calander">
					<b style="color: #12d7ed;">Calander</b>
						<?php
						include("../calander.php");
						?>
					</div>    
				</div>
						<div id="content">
						<fieldset style="border: none;margin: 30px;">
										<h1>Change Password</h1>
			   <form method="POST" enctype="multipart/form-data">
			    <table>
			    <tr><td>Enter your UserName</td>
			    <td><input type="username"  name="username" class="textbox" value="<?php echo $_SESSION['username'];?>" readonly></td></tr>
			    <tr><td>Enter your existing password:</td><td><input type="password"  name="password" class="textbox"required></td></tr>
			    <tr><td>Enter your new password:</td><td><input type="password"  name="newpassword" class="textbox"required></td></tr>
			    <tr><td>Re-enter your new password:</td><td><input type="password"  name="confirmnewpassword" class="textbox"required></td></tr>
			    <tr><td colspan="2"><input type="submit" value="Update Password" name="change" class="myButton"></td></tr>
			    </table>
			    
			    </form>
			    <?php
		    if(isset($_POST['change']))
		    {
				$username = $_POST['username'];
		        $password = md5($_POST['password']);
		        $newpassword = md5($_POST['newpassword']);
		        $confirmnewpassword = md5($_POST['confirmnewpassword']);
		        $result = mysql_query("SELECT * FROM account WHERE username='$username'");
		        $row=mysql_fetch_assoc($result);
		        $pass=$row['password'];
		        if($pass==$password)
		        {
			    if($newpassword==$confirmnewpassword)
			    {
		        $sql=mysql_query("UPDATE account SET password='$newpassword' where username='$username'");
		        if($sql)
		        {
		        echo "<font color='green'>Congratulations You have successfully changed your password</font>";
		        }
		        }
		       else
		        {
		       echo "<font color='red'>Password does not match</font>";
               }	
				}
				else
				print"<font color='red'>Your Old Password is not Correct</font>";

         }
      ?>
				
		
						</fieldset>
    
				    </div>
				<div id="footer">
					<?php
					include("../footer.php");
	?>
	</div>
	<?php
	}
	else
	{
		header("location:../index.php");
	}
			?>
<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="../images/top.png" style="width: 40px;height: 30px;border-radius: 170px;"/></button>
	</div>
</body>
</html>
