<html>
<head>
<link rel="stylesheet" href="fontawesome.css"/>
<style type="text/css">
				.menu ul 
					{
				
			    list-style-type: none;
			    margin: 0;
			    padding: 0;
			    width: 220px;
			    background-color: #508abb;
			}

			.menu li a {
			    display: block;
			    color: #fff;
			    padding:15px;
			    text-decoration: none;
			    border-top: 1px solid white;
			}

			/* Change the link color on hover */
			.menu li a:hover {
			    background-color: #006699;
			    color: #fff;
			}
</style>
</head>
<body style="background-color: #FFDEAD">
<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
?>
<div class="menu">
<p style="background-color: #36a2e2;color: #e4ebe7;width: auto; height: 45px;text-align: center;font-size: 1.2em;font-family: Times New Roman;margin-bottom: 5px;padding-top: 6px;margin-top: -5px;"><b>Main Registrar Management Links</b></p>
<ul>
	<li style="height: 40px;">		

	</li>
	<!--<li  style="border-top: none;"><a href="stud.php">Submit Student Data</a></li>-->
	<li><a href="../Main-Registrar/ChangePassword.php">Change Password</a></li>
		     <?php
	     $sql="select *  from ssdnotification where status='unread'";
		$query = mysql_query($sql);
		$coun = mysql_num_rows($query);
		if($coun!=0)
		{
		?>
    <li><a href="../Main-Registrar/vviewnotification.php">Notification<font color="yellow">[<?php echo $coun;?>]</font></a></li>
    <?php
    }
    else
    {
				?>
    <li><a href="../Main-Registrar/vviewnotification.php">Notification<font color="yellow">[0]</font></a></li>
    <?php
	}
    
    ?>
</ul>
</div>
<?php
	}
	else
	{
		header("location:../index.php");
	}?>
</body>
</html>