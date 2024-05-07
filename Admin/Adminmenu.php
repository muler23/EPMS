<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
		
		?>
		<meta charset="utf-8">
		<ul>
    <li><a href="../Admin/Admin.php">Home</a></li>
	<!-- <li><a href="../Admin/Backup.php" > Take backup</a></li>
	<li><a href="../Admin/restore.php">Reset backup</a></li> -->
		<li><a href="#">Manage Account&nbsp;<span style="font-size: 7px;">&#9660;</span></a>
			<ul>
				<li   style="border-top: none;"><a href="../Admin/create_account.php">&nbsp;&nbsp;&nbsp;&nbsp;Create Account</a> </li>
				<li   style="border-top: none;"><a href="../Admin/ViewAccount.php">&nbsp;&nbsp;&nbsp;&nbsp;View user Account</a> </li>
				<li   style="border-top: none;"><a href="../Admin/UpdateAccount.php">&nbsp;&nbsp;&nbsp;&nbsp;Update Account</a> </li>
				<li   style="border-top: none;"><a href="../Admin/Block.php">&nbsp;&nbsp;&nbsp;&nbsp;Block Account</a> </li>
			</ul>
	</li>
	 <li><li><a href="">View&nbsp;<span style="font-size: 7px;">&#9660;</span></a>
	<ul>
	<li><a href="../Admin/viewstudentdata.php">View EMPLOYE Data</a> </li>	
	<!-- <li><a href="../Admin/viewcandidate.php">View Candidates</a> </li>
	<li><a href="../Admin/viewvoter.php">View Voters</a> </li> -->
		
	</ul></li>	
		<div id="photologin">	
	<?php
		echo "<li><a href=../logout.php>logout</a></li>";
if($_SESSION['role']=="Adminstrator")
{
echo "<li style='float:right;margin-top:5px;'><p><b>.</b>Online</p>". "<img src='".$_SESSION['sphoto']."'</li>";

}
	}
	else
	echo "";
	?>
					</div> 
</ul>


	