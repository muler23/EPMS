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
				table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #d5d5d5;
			border-color: #6ea1cc !important;
			text-transform: capitalize;
			border: none;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
			width: auto;
			border: none;
		}
		.data-table tbody td img{
			width: 100px;
			height: 20px;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: left;
			border: none;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
			border: none;
		}
		.data-table tbody tr:hover td {
			background-color: #69a3d6;
			border-color: #fbffff;
			border: none;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
			border: none;
		}
		.data-table tfoot th:first-child {
			text-align: left;
			border: none;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
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
<fieldset style="border: none;margin: 20px;">
<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
    {
		  $sql=mysql_query("select * from  feedback");
		  if(mysql_num_rows($sql)>0)
		  {
		  	
			echo"<center><table border='1' style='border-collapse:collapse;'>";
			echo"<caption class='title'>Details Of All FeedBacks</caption>";
			echo"<tr><th>ID_Number</th><th>Email_Address</th><th>Comment</th><th>Date</th></tr>";
				$num=1;
				while($row=mysql_fetch_array($sql))
				{
					
					echo "<tr><td>".$num."</td><td>".$row['email']."</td><td>".$row['comment']."</td><td>".$row['date']."</td></tr>";
					$num++;
				}
				
		echo"</table></center>";
		}
		else
		echo "No Recent Feedback";
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
