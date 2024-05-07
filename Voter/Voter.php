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
</head>
<body style="background-color: #FFf">
<div id="container">
		
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
									<div id="rightside">
					<div style="background-color: #2d6fd2;color: #fff;">
					<?php
					echo "<b>";
						echo "<img src='".$_SESSION['sphoto']."' width='220' height='230'/><br/>";
						echo "Voter:".$_SESSION['username'];
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
			<p>This is voter page</p>
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