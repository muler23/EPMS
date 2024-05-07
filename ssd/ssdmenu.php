 <?php
	if(isset($_SESSION['username'])&& isset($_SESSION['password']))
	{
		?>
<ul>
    <li><a href="../ssd/SSD.php">Home</a></li>
	<li><a href="../ssd/Notice.php">Generate Report</a> </li>
	<!-- <li><a href="#" style="color: white;">Exam Date&nbsp;<span style="font-size: 7px;">&#9660;</span></a> -->
	<ul>
 	<!-- <li><a href="../ssd/examdate.php">Set Exam Date</a></li>
 	<li><a href="../ssd/updateexamdate.php">Update Exam Date</a></li> -->
 	</ul>
	</li>
	<li><a href="../ssd/ElectionDate.php">Evaluation Date&nbsp;<span style="font-size: 7px;">&#9660;</span></a>
	
	<ul>
 	<li><a href="../ssd/ElectionDate.php">Set Evaluation Date</a></li>
 	<li><a href="../ssd/UpdateElectionDate.php">Update Evaluation Date</a></li>
 	</ul>
		 
	</li>
	<!-- <li><a href="#">Students ApplyDate <span style="font-size: 7px;">&#9660;</span></a> -->
	<ul>
	<!-- <li><a href="../ssd/setapplydate.php">Set Students Apply Date</a></li>
	<li><a href="../ssd/updateapplydate.php">Update Students Apply Date</a></li>
	</ul> -->
	</li>
			<li><a href="#.php">Manage FeedBack&nbsp;<span style="font-size: 7px;">&#9660;</span></a>
			<ul>
				<li   style="border-top: none;"><a href="../ssd/viewfeedback.php">&nbsp;&nbsp;&nbsp;&nbsp;View FeedBack</a> </li>
				<li   style="border-top: none;"><a href="../ssd/DeleteFeedback.php">&nbsp;&nbsp;&nbsp;&nbsp;Delete FeedBack</a> </li>
			</ul>
	</li>
   
<div id="photologin">	
<?php	
		echo "<li><a href=../logout.php>logout</a></li>";
if($_SESSION['role']=="SSD")
{
echo "<li style='float:right;margin-top:5px;'><p><b>.</b>Online</p>". "<img src='".$_SESSION['sphoto']."'</li>";

}
	}
	else
	echo "";
	?>
	</div> 
</ul>


	