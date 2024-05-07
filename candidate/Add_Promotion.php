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

#calander
{
	margin-top: 5px;
	width: auto;
	height: 190px;
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
#file
{
		height:50px;
		width: 220px;;
		background-color: #ffffff;
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
							include("../candidate/cons.php");
					   ?>	
					</div>    
				</div>
				<div id="content">
			<fieldset style="border: none;font-size: 30px;">
<legend align="center">Post Promotion</legend>
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
<td>Discriptio:</td><td>
<textarea  name="ncontent"  required  class="textarea" id="file"></textarea></td>
</tr>
<tr>
<td>Posted By:</td><td>
<input type="text" name="sender" class="textbox" value="<?php echo $_SESSION['userid']; ?>" readonly="true"/> </td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="Post" value="Post" id="btn">
<input type="reset"  value="Cancel" id="btn"></td>
</tr>

</form>
</table>
<?php
if(isset($_POST['Post']))
{
$ndate=$_POST["ndate"];
$ex_date=$_POST["exdate"];
$tilte=$_POST["title"];
$content=$_POST["ncontent"];
$sender=$_POST["sender"];
$con=mysqli_connect("localhost","root","","osuvs");
if($con)
{
  $sql=mysqli_query($con,"insert into promotion values(' ','$ndate','$ex_date','$tilte','$content','$sender')");
   if($sql)
    echo "Posted sucessfully";
	else
	echo "Not Posted".mysql_error($con);
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