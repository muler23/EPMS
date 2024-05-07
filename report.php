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
	background-color: #508abb;
	width: 220px;
	height: 547px;
	float: right;
	margin-top: 5px;
	margin-right: 40px;
}
#leftside
{
	background-color: #508abb;
	width: 220px;
	height: 542px;
	float: left;
	margin-top: 10px;
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
<body style="background-color: #FFDEAD">
<div id="container">
		<div id="header">
		<?php
		include("../header.php");
	   ?>
		</div>
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
			<fieldset style="height:40px; width:460px;  background-color:#dde3e8;  margin-top:-173px; margin-left:10%; border-radius:9px;"> 
						<form name="search" action="reportregistrar.php" method="post" style=" margin-top:-2px; margin-left:23px;">
						<select name="pid"  style="height:30px; width:280px;" required>
									<option value="">Choose....</option>
									<option value="Male">Only active male prisoner</option>
									<option value="Female">Only active female prisoner</option>
									<option value="Active">All active prisoner</option>
									<option value="Inactive">All inactive prisoner</option>
									<option value="Murder">Murder prisoner</option>
									<option value="court">Ongoing prisoner</option>
									<option value="Inactive_by_transfer">Inactive prisoner by transfer</option>
									<option value="Inactive_by_parol">Inactive prisoner by parol</option>
									
									</select>
						<input type="submit" name="searche" value="View" style="margin-left:3px;height:70%;width:70px; border-radius:6px;">
						</form>
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
	}?>
	</div>
</body>
</html>