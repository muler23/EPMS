<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
		?>
		<meta charset="utf-8">
		<ul>
    <li><a href="../Admin/aAdmin.php">ሆም</a></li>
	<li><a href="../Admin/Backup.php" >ለቀጣይ አስቀምጥ</a></li>
	<li><a href="../Admin/restore.php">ያስቀመጥከውን መልስ</a></li>
		<li><a href="#">አካውንቱን አስተዳድር&nbsp;<span style="font-size: 7px;">&#9660;</span></a>
			<ul>
				<li   style="border-top: none;"><a href="../Admin/create_account.php">&nbsp;&nbsp;&nbsp;&nbsp;አካውንት ፍጠር</a> </li>
				<li   style="border-top: none;"><a href="../Admin/ViewAccount.php">&nbsp;&nbsp;&nbsp;&nbsp;የተጠቃሚወችን አካውንት እይ</a> </li>
				<li   style="border-top: none;"><a href="../Admin/UpdateAccount.php">&nbsp;&nbsp;&nbsp;&nbsp;አካውንቱን አዘምን</a> </li>
				<li   style="border-top: none;"><a href="../Admin/Block.php">&nbsp;&nbsp;&nbsp;&nbsp;አካውንቱን ዝጋ</a> </li>
			</ul>
	</li> <li><li><a href="">እይ&nbsp;<span style="font-size: 7px;">&#9660;</span></a>
	<ul>
	<li><a href="../Admin/viewstudentdata.php">የተማሪውችን መረጃ እይ</a> </li>	
	<li><a href="../Admin/viewcandidate.php">እጩ ተወዳዳሪውችን እይ</a> </li>
	<li><a href="../Admin/viewvoter.php">መራጮችን እይ</a> </li>
		
	</ul></li>	
		<div id="photologin">	
	<?php
		echo "<li><a href=../logout.php>ውጣ</a></li>";
if($_SESSION['role']=="Adminstrator")
{
echo "<li style='float:right;margin-top:5px;'><p><b>.</b>መስመር ላይ</p>". "<img src='".$_SESSION['sphoto']."'</li>";

}
	}
	else
	echo "";
	?>
					</div> 
</ul>


	