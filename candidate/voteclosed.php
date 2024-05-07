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

#calander
{
	margin-top: 5px;
	width: auto;
	height: 190px;
}
#content
{
	background-color: #dfdfdf;
	width: 970px;
	height: 555px;
	margin-left: 230px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: hidden;
}
</style>
</head>
<body style="background-color: #FFDEAD">
<div id="container">
		<div id="header">
		<?php
		include("../header.php");
	   ?>
		</div>
		<div id="menu">
		<?php
include("../candidate/candidatemenu.php");
		?>
	</div>

				<div id="leftside">
					<div id="applyside">
						<?php
							include("../candidate/candidatesidemenu.php");
					   ?>	
					</div>    
				</div>
				<div id="content">
			<img src="userphoto/onlinevotingclosed.jpg" width="100%" height="100%"/>
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
	}?>
	</div>
</body>
</html>