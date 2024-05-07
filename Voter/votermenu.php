  <?php
	if(isset($_SESSION['username'])&& isset($_SESSION['password']))
	{
		?>
<ul>
    <li><a href="../Voter/Voter.php">Home</a></li>
  
		<div id="photologin">	
<?php	
		echo "<li style='margin-left:700px;'><a href=../logout.php>logout</a></li>";
if($_SESSION['role']=="Voter")
{
echo "<li style='float:right;margin-top:5px;'><p><b>.</b>Online</p>". "<img src='".$_SESSION['sphoto']."'</li>";

}
	}
	else
	echo "";
	?>
	</div> 
</ul>