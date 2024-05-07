<?php
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
include("../Database/connection.php");
?>
<html>
<link  href="../css/allcss.css" rel="stylesheet" type="text/css"/>
<head>
<title>EPMS</title>
<style>
#content
{
	background-color: ##FFF;
	width: 740px;
	height: 590px;
	margin-left: 230px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: hidden;
}
#rightside
{
	background-color: #508abb;
	width: 220px;
	height: 580px;
	float: right;
	margin-top: 5px;
	margin-right: 40px;
}
#leftside
{
	background-color: #508abb;
	width: 220px;
	height: 580px;
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
<body style="background-color: #FFF">
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
													
					
				<div id="content">
			<p>This is Election commitee page</p>
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