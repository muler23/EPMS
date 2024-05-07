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
#content
{
	background-color: #dfdfdf;
	width: 970px;
	height: 600px;
	margin-left: 230px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: hidden;
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
	.textarea
	{
		height: 100px;
		width: 500px;
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
<legend align="center" style="color: #336699;"><b><h2>Update Student Apply Date</h2></b></legend>
			<?php
			
			$sql="select * from apply_date";
								$recorfound=mysql_query($sql);
							if(mysql_affected_rows($con))
							 {
							$row=mysql_fetch_assoc($recorfound);
											
echo"<form action='' method='post' enctype='multipart/form-data'>";
echo"<table>";
echo"<tr><td>Start Date</td><td><input type='datetime' name='sdate' value='".$row["StartDate"]."'required class='textbox'/></td></tr>";
echo"<tr><td>End Date</td><td><input type='datetime' name='edate' value='".$row["EndDate"]."'  required='true'class='textbox'/></td></tr>";
echo"<tr><td colspan='2'><input type='submit' value='Update' name='Update' id='btn'/>&nbsp;<input type='reset'
			 value='Reset'id='btn'/></td></tr></table></form>";
										
										}
										else
										echo "No Record Found!!";	
					 if(isset($_POST["Update"]))
									{
						$sdate=$_POST['sdate'];
						$edate=$_POST['edate'];
						$updated=mysql_query("update apply_date set StartDate='$sdate',EndDate='$edate'");
										if(mysql_affected_rows($con))
										echo " Student Request Date Is updated successfully!";
										 else
										echo "Unable to update!";
													
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