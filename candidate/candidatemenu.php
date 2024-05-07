	<?php
	if(isset($_SESSION['username'])&& isset($_SESSION['password']))
	{
		?>
<ul>
    <li><a href="../candidate/Candidate.php">Home</a></li>

	<li><a href="../candidate/TakeExam.php" >Take Exam</a></li>
	<!-- <li><a href="../candidate/viewexamresult.php">View Exam Result</a></li> -->
	<!-- <li><a href="../candidate/ViewElectionResult.php">View Election Result</a> </li> -->
	<!-- <li><a href="../candidate/viewcandidate.php">View Candidates</a></li> -->
	<li><a href="../candidate/ChangePassword.php">Change Password</a> </li>
		<div id="photologin">	
	<?php
		echo "<li><a href=../logout.php>logout</a></li>";
if($_SESSION['role']=="Candidate")
{
echo "<li style='float:right;margin-top:5px;'><p><b>.</b>Online</p>". "<img src='".$_SESSION['sphoto']."'</li>";

}

	}
	else
	{
		header("location:../index.php");
	}?>
</div> 
</ul>



	