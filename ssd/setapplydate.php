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
		.textbox
	{
		height: 30px;
		width: 220px;
		font-family: Times New Roman;
		font-weight:italic;
		font-size: inherit;
		border: none;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		
	}
	#btn
	{
		background-color: #2692d9;
		height: 40px;
		width: 150px;
		color: white;
		cursor: pointer;
		border: none;
		font-family: Times New Roman;
		font-size: 20px;
		margin-top: 20px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	#btn:hover
	{
		background-color: #808c97;
		height: 40px;
		width: 150px;
		color: white;
		cursor: pointer;
		border: none;
		font-family: Times New Roman;
		font-size: 20px;
		margin-top: 20px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
#content
{
	background-color: #dfdfdf;
	width: 970px;
	height: 600px;
	margin-left: 230px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: hidden;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.title
{
	color: #66996d;
	font-size: 30px;
	font-family: Times New Roman;
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
<fieldset style="border:none;margin: 70px;background-color: #d9e8e6;padding: 50px;width: 400px;">
<legend align="center" style="color: #336699;"><h1>Set Students Apply Date</h1></legend>
 <table>
<form action="" method="post" enctype="multipart/form-data">
<tr>
<td>Students Apply Start Date:</td></tr><tr><td><input type="datetime-local" name="opendate" required class="textbox"/></td>
</tr>
<tr>
<td>Students Apply close Date:</td></tr><tr><td><input type="datetime-local" name="closedate" required class="textbox"/></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="time" value="Set" id="btn">
<input type="reset"  value="Cancel" id="btn"></td>
</tr>
</form>
</table>
<?php

if(isset($_POST['time']))
{
	if($con)
{
$opendate=$_POST["opendate"];
$Closedate=$_POST["closedate"];
$con=mysqli_connect("localhost","root","","osuvs");
$c=1;
$sql=mysql_query("select * from apply_date");
if(mysql_num_rows($sql)==0)
{

  $sql=mysqli_query($con,"insert into apply_date values('$c','$opendate','$Closedate')");
  $c++;
   if($sql)
    echo "Students  Apply Date and time is setted sucessfully";
	else
	echo "Students  Apply Date and time is not setted sucessfully".mysql_error($con);
}
else
echo("Student Apply Date is already setted!!!");
}
else
echo"Connection Failed:".mysql_error($con);
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
	}?>
	</div>
</body>
</html>