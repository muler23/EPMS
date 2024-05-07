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
	height: 600px;
	margin-left: 230px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: hidden;
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
include("../candidate/candidatemenu.php");
		?>
	</div>

				<div id="leftside">
					<div id="applyside">
						<?php
							include("../candidate/candidatesidemenu.php");
					   ?>	
					</div>    
				</div>
			<div id="content">
		 	

<?php
//check take exam before or not
$sqq="select * from question";
$result = mysql_query($sqq,$con);
$Wronganswer=0;
$Correctanswer=0;
$totalquestion=0;
$total=0;

while($row = mysql_fetch_array($result))
{
$txAns=$row["txtansw"];
$qid=$row["qid"];
$selectedanswer=$_POST[$qid];
     if($selectedanswer==$txAns)
	       $Correctanswer++;
	else	
	       $Wronganswer++;
}
$totalquestion=$Wronganswer+$Correctanswer;

$total=($Correctanswer*100)/$totalquestion;
$total=round($total,2);
$total=$total."%";
if($total>50)
$results="Pass";
else
{
	$results="Fail";
	$sql=mysql_query("update account set role='Voter' where userid=$userid");
}

$sqlresult=mysql_query("insert into examresult values('$userid','$totalquestion','$Correctanswer','$Wronganswer','$total','$results')");
header('Location: Candidate.php');
?>

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
</html><?php

?>