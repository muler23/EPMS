

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
	padding-top: 0px;
	width: auto;
	height: 190px;
}
	#login
{
	margin-top: 3px;
	background-color: #718076;
	height: 250px;
	width: auto;
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
	#btn
	{
		background-color: #2692d9;
		height: 50px;
		width: 170px;
		color: white;
		cursor: pointer;
		border: none;
		font-family: Times New Roman;
		font-size: 20px;
		margin-top: 20px;
	}
	#btn:hover
	{
		background-color: #808c97;
		height: 50px;
		width: 170px;
		color: white;
		cursor: pointer;
		border: none;
		font-family: Times New Roman;
		font-size: 20px;
		margin-top: 20px;
	}
#content
{
	background-color: #dfdfdf;
	width: 740px;
	height: 550px;
	margin-left: 230px;
	margin-top: -595px;
	overflow-x: hidden;
	overflow-y: hidden;
}
#rightside
{
	background-color: #336699;
	width: 220px;
	height: 600px;
	float: none;
	margin-left: 980px;
	margin-top: 1px;
}
</style>
</head>
<body style="background-color: #FFf">
<div id="container">
		
		<div id="menu">
		<?php
		include("../Main-Registrar/main_registrarmenu.php");
		?>
	</div>

				<div id="leftside">
					<div id="applyside">
						<?php
						include("../Main-Registrar/main_registrarsidemenu.php");
					   ?>	
					</div>    
				</div>
					<div id="rightside">
					<div id="login">
					<?php
					echo "<b>";
						echo "<img src='".$_SESSION['sphoto']."' width='220' height='230'/><br/>";
						echo "Main registrar:".$_SESSION['username'];
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


                <fieldset  style="height: auto;border: none;">
                <legend align="center"><img src="../images/contact.jpg" height="60px;" width="500px;"/> </legend>
<form method="post" name="contact" action="#">
<table>
<tr>
<td>
First Name:
</td>
<td>
<input type="text" pattern="[A-Za-z]*" name="first_name" maxlength="50"  required="true" class="textbox" placeholder="Enter First Name">
</td>
</tr>
<tr>
<td>
Last Name:
</td>
<td>
<input type="text" pattern="[A-Za-z]*" name="last_name" required="true" class="textbox" placeholder="Enter Last Name">
</td>
</tr>
<tr>
<td>
Email Address:
</td>
<td>
<input type="email" name="email" required="true" class="textbox" placeholder="Enter Email Address">
</td>
</tr>
<tr>
<td>
Position:
</td>
<td>
<input type="text" name="position" placeholder="Enter The position" class="textbox"/>
</td>
</tr>
<tr>
<td colspan="2" style="text-align:right">
<input type="submit" value="Submit" id="btn">���<input type="reset" value="Reset" id="btn">�
</td>
</tr>
</table>	
</form></fieldset>
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
