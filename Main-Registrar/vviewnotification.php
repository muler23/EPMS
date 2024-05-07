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
	margin-top: 0px;
	padding-top: 0px;
	width: auto;
	height: 190px;
}
	#login
{
	margin-top: 0px;
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
	background-color: #fff;
	width: 970px;
	height: 550px;
	margin-left: 50px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: hidden;
}
#rightside
{
	background-color: #336699;
	width: 220px;
	height: 545px;
	float: left;
	margin-left: 0px;
	margin-top: 5px;
	margin-right: 10px;
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
					
				<div id="content">
			<fieldset style="border: none;">
<?php
	$date=date('Y-m-d hh:mm');
	$sql1=mysql_query("SELECT * from ssdnotification where status='unread'");
	$ro=mysql_num_rows($sql1);
	if($ro!='0')
	{
	$sql=mysql_query("SELECT * from ssdnotification where status='unread'") or die(mysql_error());
	while($row=mysql_fetch_array($sql))
	{
	?>
	<div style="width: 700px;margin-top: 25px;background-color:#dfdfdf;font-size: 20px;margin-left: 100px;">
	<label style="font-size: 20px;margin-left: 70px;"><?php echo $row['subject']; ?></label>
	<p><?php echo $row['message']; ?></p>
	<label style="margin-left: 520px;"><a href="vviewnotification.php?send=<?php echo $row['notificationid'];?>" style="text-decoration: none;height: 10px;background-color: #29d6bc;width: 100px;color: #fff4f4;">Send Now</a></label>
          <!-- echo"<font size='4' color='#00000b'><br><u><i>Posted By:".$row['sender']."</i></u>"."</p>";-->
   </div>
<?php
	}
			 if(isset($_GET['send']))
	                {
		             $block=$_GET['send'];
					 mysql_query("UPDATE ssdnotification SET status='read' where notificationid='$block'");  
						header("location:stud.php");
				}
	}
	else
	{
		echo "<center>No Sended Notification!!!</center>";
		
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