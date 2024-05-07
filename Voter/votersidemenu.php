<html>
<meta charset="utf-8">
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

			.menu ul li a {
			    display: block;
			    color: #fff;
			    padding:15px;
			    text-decoration: none;
			    
			}

			/* Change the link color on hover */
			.menu li a:hover {
			    background-color: #006699;
			    color: #fff;
			}
</style>
</head>
<body style="background-color: #FFDEAD">
<div class="menu">
<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
?>
<p style="background-color: #36a2e2;color: #e4ebe7;width: auto; height: 40px;text-align: center;font-size: 1.2em;font-family: Times New Roman;margin-bottom: 25px;padding-top: 6px;margin-top: -10px;"><b>Voter Management Links</b></p>
<ul>
	<li style="border-bottom: 1px solid #fff;height: 40px;">		
	<div style="color: #fff;margin-left: 50px;height: 45px;"> 
			<script src="../js/dateandtime.js"></script>
					<script type="text/javascript">
					var calendarDate = getCalendarDate();
					document.write(calendarDate);
					</script>
					<form name="clock">
					<input type="submit" class="trans" name="face" value="" style="color: #fff;border: none;background-color: #508abb;">
				</form>
	</div>
	</li>
	<!-- //<li style="border-top: none;"><a href="../Voter/vote.php">Vote</a></li> -->
	<li style="border-top: 1px solid white;"><a href="../Voter/ViewElectionResult.php">View Evaluatioln Result</a></li>
	<li style="border-top: 1px solid white;"><a href="../Voter/viewcandidate.php">Send any issue</a> </li>
	<!-- <li style="border-top: 1px solid white;"><a href="../Voter/View_Promotion.php">View Promotions</a> </li> -->

	<li style="border-top: 1px solid white;"> <a href="../Voter/ChangePassword.php">Change Password</a></li>
</ul>
<?php
	}
	else
	{
		header("location:../index.php");
	}?>
</div>
</body>
</html>