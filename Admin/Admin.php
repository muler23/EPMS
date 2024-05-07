<?php
session_start();
include("../Database/connection.php");
?>
<html>
<meta charset="utf-8">
<link  href="../css/allcss.css" rel="stylesheet" type="text/css"/>
<head>
<title>EPMS</title>
<style>
		#menu
{
    /* background-color: red; */
width: 1350px; 
/* height: 750px; */
    margin-top: -40px;
    margin-left: -72px;

}
#leftside
{
	background-color: black;
	width: 100px;
	height: 620px;
	float: left;
	 /* //margin-top: -10px; */
    margin-left: -1350px;

}
#content
{
	background-color: #dfdfdf;
	width: 740px;
	height: 570px;
	margin-left: 230px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: hidden;
}
#leftside
{
	background-color: #508abb;
	width: 220px;
	height: 550px;
	float: left;
	margin-top: 10px;
}
#rightside
{
	background-color: #508abb;
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
<body style="background-color: #FFF">
<div id="container">
		
		<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
			{
				
			   ?>
				
				<div id="menu">
				<?php
		include("../Admin/Adminmenu.php");
				?>
			</div>

						<div id="leftside">
							<div id="applyside">
								<?php
									include("../Admin/Adminsidemenu.php");
							   ?>	
							</div>    
						</div>
											<div id="rightside">
							<div style="background-color: #2d6fd2;color: #fff;">
							<?php
							echo "<b>";
								echo "<img src='".$_SESSION['sphoto']."' width='220' height='230'/><br/>";
								echo "Adiministrator:".$_SESSION['username'];
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
					<p>This is Admin page</p>
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
