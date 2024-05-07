<?php
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
include("../Database/connection.php");
?>
<html>
<link  href="../css/allcss.css" rel="stylesheet" type="text/css"/>
<head>
<title> EPMS</title>
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
}
.textbox
	{
		height: 30px;
		width: 220px;
		font-family: Times New Roman;
		font-weight:italic;
		font-size: inherit;
		border: none;
		/*resize: none;*/
		
	}
	.textarea
	{
		height: 100px;
		width: 500px;
		border: none;
		
	}
	#btn
	{
		background-color: #2692d9;
		height: 50px;
		width: 170px;
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
		height: 50px;
		width: 170px;
		color: white;
		cursor: pointer;
		border: none;
		font-family: Times New Roman;
		font-size: 20px;
		margin-top: 20px;
	}
</style>
</head>
<body style="background-color: #FFF">
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
				
<fieldset style="border:none;margin: 70px;background-color: #d9e8e6;padding: 50px;width: 400px;">
<legend align="center" style="color: #336699;"><b><h2>Send Message to Managers Users</h2></b></legend>
 <table>
<form action="" method="post" enctype="multipart/form-data">
<tr>
<td>Subject:</td><td><input type="text" name="subject"  required class="textbox"/></td>
</tr>
<tr>
<td>message:</td><td><textarea name="message" placeholder="put here Any message......." class="textbox" pattern="[A-Za-z',.]"></textarea></td>
</tr>
<tr>
<td>to:</td><td>
					<select name="to" required="true" class="textbox" readonly>
					<?php
				$role=array("Main-Registrar");
				foreach($role as $i)
				echo "<option value=$i>$i</option>";
				?>	
				</select>
 </td>
</tr>
<tr>
<td colspan="2"><input type="reset"  value="Cancel" class="myButton"><input type="submit" name="notice" value="Send" class="myButton"">
</td>
</tr>

</form>
</table>
<?php
if(isset($_POST['notice']))
{
$subject=$_POST["subject"];
$message=$_POST["message"];
$to=$_POST["to"];
$con=mysqli_connect("localhost","root","","osuvs");
if($con)
{
  $sql=mysqli_query($con,"insert into ssdnotification values('identity(1,1)','$subject','$message','$to','unread')");
   if($sql)
    echo" Message is send sucessfully";
	else
	echo" Message not sent".mysql_error($con);
}
else
echo"Connection Failed:".mysql_error($con);
}
?>
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