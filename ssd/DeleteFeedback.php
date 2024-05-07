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
	.textbox
	{
		height: 50px;
		width: 500px;
		border-top: none;
		border-left: none;
		font-family: Times New Roman;
		font-weight:italic;
		font-size: inherit;
		
	}
	.textarea
	{
		height: 100px;
		width: 500px;
		
	}
	.btn
	{
		height: 50px;
		width: 170px;
	}
	#reset
{

		height: 50px;
		width: 170px;	
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
<fieldset style="border: none;margin: 50px;">
<?php
	if(isset($_POST['deleteab'])||isset($_POST['deleteb']))
	{
			if(isset($_POST['deleteall'])&&isset($_POST['deleteab']))
				$result=mysql_query("delete from feedback");
			else if(isset($_POST['delete']) &&isset($_POST['deleteb']))
			{
				$deletevalue=$_POST['delete'];
				$result=mysql_query("delete from feedback where id='$deletevalue'");
			}
	if($result)
		echo "Record deleted!</";
	else 
		echo "No records found!</div>";
	}
	$result=mysql_query("select * from feedback order by Date desc");
if($row1=mysql_fetch_array($result))
{
$result=mysql_query("select * from feedback order by Date desc");
	echo "<h2>Detail's Of Feedbacks and Delete Them</h2><div id=form><form action='' method=post>
	<table border=1 style='border-collapse:collapse;'><tr><th>Number</th><th> Email</th><th>Comment</th><th>Date</th><th>Delete All<input type=checkbox name=deleteall value=all><input type=submit name=deleteab value='Delete All'></th></tr>";
		$num=1;
		while($row=mysql_fetch_array($result))
		{
			echo "<tr><td>".$num."</td>
			<td>".$row['email']."</td>
			<td>".$row['comment']."</td>
			<td>".$row['date']."</td>
			<td><input type=radio name=delete value=".$num."><input type=submit name=deleteb value='Delete'></td>
			<tr>";
			$num++;
		}
		echo "</table></form></div>";
       }
else{
	echo "<div id=error>No Record Found!</div>";
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
<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="../images/top.png" style="width: 40px;height: 30px;border-radius: 170px;"/></button>
	</div>
</body>
</html>