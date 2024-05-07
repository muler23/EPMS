<?php
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
$userid=$_SESSION['userid'];
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
	width: auto;
	height: 190px;
}
#content
{
	background-color: #dfdfdf;
	width: 970px;
	height: 555px;;
	margin-left: 230px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: hidden;
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
<body style="background-color: #FFDEAD">
<div id="container">
		<div id="header">
		<?php
		include("../header.php");
	   ?>
		</div>
		<div id="menu">
		<?php
include("../candidate/candidatemenu.php");
		?>
	</div>
				<div id="leftside">
						<?php
							include("../candidate/cons.php");
					   ?>	
				</div>
				<div id="content">
				<fieldset style="height: 400px;width: 700px;margin: 50px;border: none;">
				<table border="1" style="border-collapse: collapse;">

				<?php
				$query=mysql_query("select * from account where userid='$userid'");
				while($row=mysql_fetch_assoc($query))
				{
					$id=$row['userid'];
					$fname=$row['fname'];
					$lname=$row['lname'];
				$sql=mysql_query("select * from examresult where candidate_ID=$userid");
				if(mysql_num_rows($sql))
				{				?>
				<caption style="color: #4d7dbb;font-weight: bold;font-size: 30px;">Your Exam Result</caption>
				<tr><th>Candidate Name</th><th>Total Quetions</th><th>Correct Answer</th><th>Incorrect Answer</th><th>Total(100%)</th><th>Status(pass/fail)</th></tr>
				<?php
				while($row=mysql_fetch_assoc($sql))
				{
				$cd=$row['candidate_ID'];	
				$TotalQuetions=$row['TotalQuetions'];
				$correct=$row['correct'];
				$incorrect=$row['incorrect'];
				$total=$row['Total'];
				$status=$row['status'];

				?>
		<tr><td><?php echo $fname.'&nbsp;'.$lname; ?></td><td><?php echo $TotalQuetions;?></td><td><?php echo $correct;?></td><td><?php echo $incorrect;?></td><td><?php echo $total;?></td><td><?php echo $status;?></td></tr>
		<?php
				}
				}
				else
				print("You couldn't take the exam");
				}
				?>
					
				</table>
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
<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="../images/top.png" style="width: 40px;height: 30px;border-radius: 170px;"/></button>
	</div>
</body>
</html>