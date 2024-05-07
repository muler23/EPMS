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
		#login
{
	margin-top: 3px;
	background-color: #718076;
	height: 220px;
	width: auto;
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
				<div id="content">
				<h2 align="center">Vission</h2>
			<p>&nbsp;&nbsp;&nbsp;The general objective of our project is to design and develop online voting system for Debre Markos University &nbsp;students union.</p>
&nbsp;&nbsp;The specific objectives of the our projects are:
<ul>
 	<li>To Study and understand the existing voting process.</li>
 	<li>To Design the proposed system including the system architecture.</li>
 	<li>To Develop/Implement a prototype election/voting system.</li>
 	<li>To Evaluate and recommend deployment strategies for the proposed system.</li>
 	<li>To select the appropriate development tools for the system.</li>
 	<li>To maintain and keeps all the information of all the candidates and voters.</li>
 	<li>To identify and analysis the problem with current system and functional and nonfunctional requirement of new system.</li>
 	<li>To develop more secured system to ensure voting fairness and a good interface to make it easy to use.</li>
 	 <li>To allow legally student can register to the system and participating in the voting process.</li>
</ul>
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
</div>
</body>
</html>