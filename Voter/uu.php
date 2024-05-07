<?php
	session_start();
	if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
	include("../Database/connection.php");
	$id=$_SESSION['userid'];
	?>
<html>
<meta charset="utf-8">
<link  href="../css/allcss.css" rel="stylesheet" type="text/css"/>

<head>
<title>Online Stuidenet Union Voting System</title>
</head>
     
<body>

   
					<?php
     	$sql=mysql_query("SELECT * FROM count JOIN requesttable ON count.candidate_id=requesttable.Student_ID  ORDER BY VOICE DESC ");
				//$sql=mysql_query("select * from count ORDER BY VOICE DESC ");
				$rank=1;
				while($row1=mysql_fetch_assoc($sql))
				{
                   if($rank==1)
                   $selected='ፕሬዘዳንት';
                   elseif($rank==2)
                   $selected='ምክትል ፕሬዘዳንት';
                   elseif($rank==3)
                   $selected='ጸሀፊ';
                   else
                   $selected='አባል';
                   ?>
     	
					<!-- if problem ocure here put ?> -->
					<div style="margin: 5px;float: left;border:1px Solid #dadcdc;
					 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
					<table cellspacing="0">
						<tr  style="background-color: #5078af;height: auto;color: #fff;"><th colspan="2">
						<label>Candidate:<?php echo ''.$fn.'';?></label></th></tr>
						<tr><td colspan="2"><?php echo "<img src='$photo' height=150>"?></td></tr>
						<tr><td><b>ID:</b></td><td><?php echo ''.$username.'';?></td></tr>
						<tr><td><b>Full Name:</b></td><td><?php echo ''.$fn.'&nbsp;'.$ln.'';?></td></tr>
						<tr><td><b>Collage:</b></td><td><?php  echo ''.$collage.''; ?></td></tr>
						<tr><td><b>Department:</b></td><td><?php echo ''.$dept.''; ?></td></tr>
						<tr><td><b>Year:</b></td><td><?php echo ''.$yr.'&nbsp;year'; ?></td></tr>
						<tr><td><b>CGPA:</b></td><td><?php echo ''.$cgpa.''; ?></td></tr>
						<tr><td colspan="2"><a href="vote.php?voteid=<?php echo $username;?>" class="btn">Vote<a/></td></tr>
					</table>
					

</body>
</html>
 