<meta charset="utf-8"><?php
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
	overflow-x: scroll;
	overflow-y: hidden;
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
		margin-left: 80px;
	}
	#reset
{

		height: 50px;
		width: 170px;	
}
		table {
			border: 1px solid #717076;
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
<body style="background-color: #FFF">
<div id="container">
		
		<div id="menu">
		<?php
		include("../Admin/Adminmenu.php");
		?>
	</div>

				<div id="leftside">
						<?php
						include("../Admin/Adminsidemenu.php");
					   ?>	  
				</div>
				<div id="content">

		<?php
$result=mysql_query("select * from account");  
$total=mysql_num_rows($result);
if($total>0)
{
	?>
	<table class="data-table" style="margin-left: 15px;margin-right: 15px;margin-top: 15px;">
		<caption class="title"> User Information Detail&nbsp;&nbsp;[<?php	echo "Total Records=(".$total.")"; ?>]</caption>
		<thead>
			<tr>
				<th>Userid</th>
				<th>First_Name</th>
				<th>Last_Name</th>
				<th>User_Name</th>
				<th>Role</th>
				<th>Status</th>
				<th>Profile_Picture</th>
				<th>Block</th>
			</tr>
		</thead>
	<?php
		while($row=mysql_fetch_array($result))
				{
			echo '<tr>
					<td>'.$row['userid'].'</td>
					<td>'.$row['fname'].'</td>
					<td>'.$row['lname'].'</td>
					<td>'.$row['username'].'</td>
					<td>'.$row['role'].'</td>
					<td>'.$row['status'].'</td>
					<td><img src=' . $row['photo'] .'></td>';
					if($row['status']==1)
					{
						
					?>
<td><a href="ViewAccount.php?Block=<?php echo $row['username'];?>" style="text-decoration: none;height: 10px;background-color: #29d6bc;width: 100px;color: #fff4f4;width: 90px;">Block</a></td>
					<?php
				'</tr>';
				}
				else
				{
									?>
<td><a href="ViewAccount.php?Unblock=<?php echo $row['username'];?>" style="text-decoration: none;height: 10px;background-color: #29d6bc;width: 100px;color: #fff4f4;width: 90px;">Unblock</a></td>
					<?php	
				}
				}
		 if(isset($_GET['Block']))
	                {
		             $block=$_GET['Block'];
					 mysql_query("UPDATE account SET status='0' where username='$block'"); 
        
         
		}
				 if(isset($_GET['Unblock']))
	                {
		             $block=$_GET['Unblock'];
					 mysql_query("UPDATE account SET status='1' where username='$block'"); 
        
         
		}
		}
		?>
	</table>
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
