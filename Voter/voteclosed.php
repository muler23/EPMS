	<?php
	session_start();
	if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
	include("../Database/connection.php");
	?>
<html>
<meta charset="utf-8">
<link  href="../css/allcss.css" rel="stylesheet" type="text/css"/>
<head>
<title>Online Stuidenet Union Voting System</title>
<style>
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
include("../Voter/votermenu.php");
		?>
	</div>

				<div id="leftside">
					<div id="applyside">
						<?php
							include("../Voter/votersidemenu.php");
					   ?>	
					</div>    
				</div>
				<div id="content">
			<img src="../Voter/userphoto/onlinevotingclosed.jpg" width="100%" height="100%"/>
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