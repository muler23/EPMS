<?php
session_start();
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
	height: 200px;
}
	#btn
	{
		background-color: #5fa0a0;
		height: 40px;
		width: 150px;
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
		height: 40px;
		width: 150px;
		color: white;
		cursor: pointer;
		border: none;
		font-family: Times New Roman;
		font-size: 20px;
		margin-top: 20px;
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
<body style="background-color: #FFDEAD">
<div id="container">
		<div id="header">
		<?php
		include("../header.php");
		?>
		</div>
		<div id="menu">
		<?php
include("../Main-Registrar/main_registrarmenu.php");
		?>
	</div>

				<div id="leftside">
					<div id="applyside">
						<?php
							include("../Main-Registrar/main_registrarsidemenu.php");
					   ?>	
					</div>    
				</div>
				<div id="content">
<form method="post" enctype="multipart/form-data">
<fieldset style="border: none;">
<legend style="color: #4b9cd1;margin-left: 150px;font-size: 30px;">Student Data Submit Page</legend>
	 Select Student Data:
	 <input type="file" name="file" class="l" required="true"/></label> <br>
	 	<input type="submit" name="submit" value="Send" id="btn"/><input type="reset" name="reset" value="Cancle" id="btn"/>
	 	<br>
	 <?php
$con=mysqli_connect("localhost","root","","osuvs");
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
					$Did=mysqli_real_escape_string($con,$data[0]);
					$fname=mysqli_real_escape_string($con,$data[1]);
					$lname=mysqli_real_escape_string($con,$data[2]);
					$gender=mysqli_real_escape_string($con,$data[3]);
					$age=mysqli_real_escape_string($con,$data[4]);
					$collage=mysqli_real_escape_string($con,$data[5]);
					$dept=mysqli_real_escape_string($con,$data[6]);
					$year=mysqli_real_escape_string($con,$data[7]);
					$disciplineType=mysqli_real_escape_string($con,$data[8]);
					$sid=mysqli_real_escape_string($con,$data[9]);
				$sql="insert into discipline values('$Did','$fname','$lname','$gender','$age','$collage','$dept','$year','$disciplineType','$sid')";
				mysqli_query($con,$sql);
			}
          	?>
	<?php
}
}
?>
	 </fieldset>
</form>
		    </div>
		<div id="footer">
			<?php
			include("../footer.php");
			?>
	</div>
	</div>
</body>
</html>