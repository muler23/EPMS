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
}
.textbox
	{
		height: 30px;
		width: 220px;
		font-family: Times New Roman;
		font-weight:italic;
		font-size: inherit;
		border: none;
		
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
				
<fieldset style="border:none;margin: 70px;background-color: #d9e8e6;padding: 50px;width: 400px;">
<legend align="center" style="color: #336699;"><b><h2>Add Report</h2></b></legend>
 <table>
<form action="" method="post" enctype="multipart/form-data">
<tr>
<td>Posted Date:</td><td><input type="date" name="ndate" required class="textbox" value="<?php echo  date("Y-m-d");?>" readonly="1"/></td>
</tr>
<tr>
<td>Expire date:</td><td><input type="date" name="exdate" required class="textbox"/></td>
</tr>
<tr>
<td>Title:</td><td><input type="text" name="title"  required class="textbox"/></td>
</tr>
<tr>
<td>Content:</td><td><textarea name="ncontent" placeholder="put here Any Notice......." class="textbox"></textarea></td>
</tr>
<tr>
<td>sender name:</td><td>
<input type="text" name="sender" class="textbox" value="<?php echo $_SESSION['username']; ?>"/> </td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="notice" value="Send" id="btn">
<input type="reset"  value="Cancel" id="btn"></td>
</tr>

</form>
</table>
<?php
if(isset($_POST['notice']))
{
$ndate=$_POST["ndate"];
$ex_date=$_POST["exdate"];
$tilte=$_POST["title"];
$content=$_POST["ncontent"];
$sender=$_POST["sender"];
$con=mysqli_connect("localhost","root","","osuvs");
if($con)
{
  $sql=mysqli_query($con,"insert into notice values(' ','$tilte','$ndate','$ex_date','$content','$sender')");
   if($sql)
    echo" Notice is inserted sucessfully";
	else
	echo" Notice not inserted".mysql_error($con);
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