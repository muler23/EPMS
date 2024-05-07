<html>
<head>
<link rel="stylesheet" href="fontawesome.css"/>
<style type="text/css">
		

#leftside
{
	background-color: black;
	width: 200px;
	height: 620px;
	float: left;
	 /* //margin-top: -10px; */
    margin-left: -1350px;

}
.menu ul 
					{
				
			    list-style-type: none;
			    margin: 0;
			    padding: 0;
			    width: 220px;
			    background-color: black;
			}

			.menu ul li a {
			    display: block;
			    color: #fff;
			    padding:15px;
			    text-decoration: none;
			    
			}

			/* Change the link color on hover */
			.menu li a:hover {
			    background-color: black;
			    color: #fff;
			}
</style>
</head>
<body style="background-color: #FFf">
<div id="leftside"></div>
<div class="menu">
<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
		?>
<p style="background-color:
 black;color: #e4ebe7;width: auto; height: 40px;text-align: center;
 font-size: 1.2em;font-family:
 Times New Roman;margin-bottom: 5px;padding-top: 6px;margin-top: -5px;"><b>ADMIN Links</b></p>

		<div style="color: #fff;height: 45px;"> 
		<script src="../js/dateandtime.js"></script>
				<label style="margin-left: 10px;">
				<script type="text/javascript">
				var calendarDate = getCalendarDate();
				document.write(calendarDate);
				</script>
				<form name="clock">
				<input type="submit" class="trans" name="face" value="" style="color: #fff;border: none;background-color: black;margin-left: 50px;">
			</form>
			</label>
		</div>
	     <?php
	     $sql="select * from requesttable where requesttype='Candidate' and approved='no'";
		$query = mysql_query($sql);
		$coun = mysql_num_rows($query);
		if($coun!=0)
		{
		?>
	<!-- <li style="border-top: none;"><a href="../Admin/candidaterequest.php"><font color="yellow" size="3px">Candidate Request For Accountt[<font size="4px" color="#16f40b"><?php echo $coun;?></font>]</font></a></li> -->
	<?php
	}
	else
	{
		?>
			<!-- <li style="border-top: 1px solid white;"><a href="../Admin/candidaterequest.php"><font color="white" size="3px">Candidate Request For Account</font></a></li> -->
	<?php
	}
	?>
				     <?php
		$sql="select * from requesttable where requesttype='Voter' and approved='no'";
		$query = mysql_query($sql);
		$coun = mysql_num_rows($query);
		if($coun!=0)
		{
		?>
	<!-- <li style="border-top: 1px solid white;"><a href="../Admin/voterrequest.php"><font color="yellow">Voter Request For Account[<font size="4px" color="#16f40b"><?php echo $coun;?></font>]</font></a></li> -->
	<?php
	}
	else
	{
		?>
			<!-- <li style="border-top: 1px solid white;"><a href="../Admin/voterrequest.php"><font color="white" size="3px">Voter Request For Account</font></a></li> -->
	<?php
	}
	?>
	<!-- <li style="border-top: 1px solid white;"><a href="">View Report</a> </li> -->
		<li style="border-top: 1px solid white;"><a href="../Admin/Student.php">Register Employee Record</a></li>
		<li style="border-top: 1px solid white;"><a href="../Admin/ChangePassword.php">Change Password</a> </li>

<?php
}
	else
	{
		header("location:../index.php");
	}
?>
</div>
</body>
</html>