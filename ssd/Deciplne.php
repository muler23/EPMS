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
	overflow-x: scroll;
	overflow-y: scroll;
}
.myButton {
	-moz-box-shadow:inset 0px 0px 14px -3px #f2fadc;
	-webkit-box-shadow:inset 0px 0px 14px -3px #f2fadc;
	box-shadow:inset 0px 0px 14px -3px #f2fadc;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #dbe6c4), color-stop(1, #9ba892));
	background:-moz-linear-gradient(top, #dbe6c4 5%, #9ba892 100%);
	background:-webkit-linear-gradient(top, #dbe6c4 5%, #9ba892 100%);
	background:-o-linear-gradient(top, #dbe6c4 5%, #9ba892 100%);
	background:-ms-linear-gradient(top, #dbe6c4 5%, #9ba892 100%);
	background:linear-gradient(to bottom, #dbe6c4 5%, #9ba892 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dbe6c4', endColorstr='#9ba892',GradientType=0);
	background-color:#dbe6c4;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #b2b8ad;
	display:inline-block;
	cursor:pointer;
	color:#fff;
	font-family:Times New Roman;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #0d100a;
	float: none;
	width: 130px;
	height: 40px;
	margin-left: -50px;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #9ba892), color-stop(1, #dbe6c4));
	background:-moz-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:-webkit-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:-o-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:-ms-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:linear-gradient(to bottom, #9ba892 5%, #dbe6c4 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9ba892', endColorstr='#dbe6c4',GradientType=0);
	background-color:#9ba892;
}
.myButton:active {
	position:relative;
	top:1px;
	background-color: #2d8cd2;
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
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: capitalize;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
			width: auto;
		}
				.data-table tbody td img{
			width: 90px;
			height: 40px;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: left;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #69a3d6;
			border-color: #fbffff;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
</style>
</head>
<body style="background-color: #FFf">
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
<form method="post" enctype="multipart/form-data">
<fieldset style="border: none;">
<div style="border: 1px solid #fff;height: 140px;background-color: transparent;font-size: 25px;width: 400pk;">
<legend style="color: #4b9cd1;margin-left: 150px;font-size: 30px;">Student Dscipline Record Submit Page</legend>
	 Select Student Data:
	 <input type="file" name="file" class="l" required="true" />
	 	<input type="submit" name="submit" value="Send" class="myButton"/>
	 	</div>
	 <?php
if(isset($_POST["submit"]))
{
	if($_FILES['file']['name'])
	{
		$filename=explode(".",$_FILES['file']['name']);
		if($filename[1]=='csv')
		{
			$handle=fopen($_FILES['file']['tmp_name'],"r");
			while($data=fgetcsv($handle))
			{
					
					$fname=mysql_real_escape_string($data[0]);
					$lname=mysql_real_escape_string($data[1]);
					$gender=mysql_real_escape_string($data[2]);
					$age=mysql_real_escape_string($data[3]);
					$collage=mysql_real_escape_string($data[4]);
					$dept=mysql_real_escape_string($data[5]);
					$year=mysql_real_escape_string($data[6]);
					$crime=mysql_real_escape_string($data[7]);
					$sid=mysql_real_escape_string($data[8]);
				$sql=mysql_query("insert into discipline values('identity(1,100)','$fname','$lname','$gender','$age','$collage','$dept','$year','$crime','$sid')");
			}
			if($sql)
			{
				print"Submited Successfully";
			}
			else
			print"Not Submited Successfully";
          	?>
        <table class="data-table" style="margin-left: 15px;margin-right: 15px;margin-top: 15px;">
		<caption class="title">Submited Students Detail Data</caption>
		<thead style="height: 20px;">
			<tr>
				<th>Did</th>
				<th>First_Name</th>
				<th>Last_Name</th>
				<th>Sex</th>
				<th>Age</th>
				<th>Collage</th>
				<th>Department</th>
				<th>Year</th>
				<th>Discipline_Crime</th>
				<th>Sid</th>
			</tr>
		</thead>
		<?php
$result=mysql_query("select * from discipline");  
		while($row=mysql_fetch_array($result))
				{
			echo '<tr>
					<td>'.$row['Did'].'</td>
					<td>'.$row['fname'].'</td>
					<td>'.$row['lname'].'</td>
					<td>'.$row['gender'].'</td>
					<td>'.$row['age'].'</td>
					<td>'.$row['collage'].'</td>
					<td>'.$row['department'].'</td>
					<td>'.$row['year'].'</td>
					<td>'.$row['disciplineType'].'</td>
					<td>'.$row['sid'].'</td>
				</tr>';
		}?>
	<?php
}
else
		print "<font color=red>file is not csv type</font>";
}
}
?>
</table>
	 </fieldset>
</form>
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