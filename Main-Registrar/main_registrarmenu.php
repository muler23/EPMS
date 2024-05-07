<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
?>
		<ul>
    <li><a href="../Main-Registrar/Main-Registrar.php">Home</a></li>
    	<li><a href="../Main-Registrar/ChangePassword.php">Change Password</a></li>
		<li><a href="#">Manage&nbsp;<span style="font-size: 7px;">&#9660;</span></a>
			<ul>
				<li   style="border-top: none;"><a href="../Main-Registrar/Viewteam.php">&nbsp;&nbsp;&nbsp;&nbsp;Eevaluate your team</a> </li>
				<li   style="border-top: none;"><a href="../Main-Registrar/viewstudentdata.php">&nbsp;&nbsp;&nbsp;&nbsp;View Evaluation criteria</a> </li>
				</ul>
	</li>
		     <?php
	     $sql="select *  from ssdnotification where status='unread'";
		$query = mysql_query($sql);
		$coun = mysql_num_rows($query);
		if($coun!=0)
		{
		?>
    <li><a href="../Main-Registrar/vviewnotification.php">Notification<font color="yellow">[<?php echo $coun;?>]</font></a></li>
    <?php
    }
    else
    {
				?>
    <li><a href="../Main-Registrar/vviewnotification.php">Notification<font color="yellow">[0]</font></a></li>
    <?php
	}
    
    ?>
  
		<div id="photologin">	
<?php
	
		echo "<li style='margin-left:400px;'><a href=../logout.php>logout</a></li>";
if($_SESSION['role']=="Main-Registrar")
{
echo "<li style='float:right;margin-top:5px;'><p><b>.</b>Online</p>". "<img src='".$_SESSION['sphoto']."'</li>";

}
	}
	else
	echo "";
	?>
	</div> 
</ul>


	