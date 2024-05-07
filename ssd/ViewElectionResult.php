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
	overflow-x: hidden;
	overflow-y: hidden;
	border-right: 1px solid #336699;
}
#rightside
{
	background-color: #508abb;
	width: 220px;
	height: 560px;
	float: right;
	margin-top: 5px;
	margin-right: 40px;
}
#leftside
{
	background-color: #508abb;
	width: 220px;
	height: 590px;
	float: left;
	margin-top: 10px;
}
#calander
{
	margin-top: 1px;
	padding-top: 0px;
	width: auto;
	height: 190px;
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
<fieldset style="margin: 50px;width:850px;border: none;">
				<legend align="center" style="color: #418cbe;font-size: 30px;">Total Election Result</legend>
				<table class="data-table"  border="1" style="border-collapse: collapse;">
				<thead style="background-color: #89bcae;"><tr><th>Candidate_ID</th><th>Full Name</th><th>Age</th><th>sex</th><th>College</th><th>Department</th><th>Year</th><th>CGPA</th><th>Number of Voice</th><th>Rank</th><th>Selected As</th></tr></thead>
				<?php
				$sql=mysql_query("SELECT * FROM count JOIN requesttable ON count.candidate_id=requesttable.Student_ID  ORDER BY VOICE DESC "); 
				// $sql=mysql_query("select * from count ORDER BY VOICE DESC ");
				 $rank=1;
				while($row1=mysql_fetch_assoc($sql))
				{
                   if($rank==1)
                   $selected='Presdant';
                   elseif($rank==2)
                   $selected='Vice Presdant';
                   elseif($rank==3)
                   $selected='Secretary';
                   else
                   $selected='Member of Student Union';
                   ?>
				<tr><td><?php echo $row1['candidate_id']; ?></td><td><?php echo $row1['fname'];?></td><td><?php echo $row1['age'];?></td><td><?php echo $row1['sex'];?></td><td><?php echo $row1['collage'];?></td><td><?php echo $row1['department'];?></td><td><?php echo $row1['year'];?></td><td><?php echo $row1['cgpa'];?></td><td><?php echo $row1['VOICE'];?></td><td><?php echo $rank;?></td><td><?php echo $selected;?></td></tr>
				<?PHP
				$rank++;
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
	</div>
</body>
</html>