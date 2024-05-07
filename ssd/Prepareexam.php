<?php
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
$userid=$_SESSION['userid'];
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
		height: 60px;
		width: 250px;
		border: none;
		resize: none;
		
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
<body style="background-color: #FFDEAD">
<div id="container">
		<div id="header">
		<?php
		include("../header.php");
	   ?>
		</div>
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
	<fieldset style="text-align: center;color: #3f76c0;font-weight: bold;font-family: Times New Roman;margin: 20px;border: none;"><legend><b>Well Come Mr. Studet Service Directorate,You Can Set Question In Below Form!!</b></legend>
<br>
<div style="margin-left: 20px;">
	<table>
<form action="" method="post">
<tr>
<td>Question:</td><td> <textarea name="txtquest" rows="4" cols="50" pattern="[a-zA-Z0-9/_.\-+]+" placeholder="Fill Question properly..." class="textarea"></textarea> </td>

</tr>
<tr>
<td>Choice A:</td><td><input type="text" name="txta" pattern="[a-zA-Z0-9/_.\-+ ]+" required placeholder="Enter Choice 1...." class="textbox"/></td>
<td>Choice B:</td><td><input type="text" name="txtb" pattern="[a-zA-Z0-9/_.\-+ ]+" required placeholder="Enter Choice 2...."class="textbox"/></td>
</tr>

<tr>
<td>Choice C:</td><td><input type="text" name="txtc" pattern="[a-zA-Z0-9/_.\-+ ]+" required placeholder="Enter Choice 3...."class="textbox"/></td>
<td>Choice D:</td><td><input type="text" name="txtd" pattern="[a-zA-Z0-9/_.\-+ ]+" required placeholder="Enter Choice 4...."class="textbox"/></td>
</tr>

<tr>
<td>Answer:</td>
<td>
<select name="txtansw" required class="textbox">
<option value="">choose correct answer</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
</select>
</td>
<td>Exam Setter_ID:</td><td><input type="text" name="sid" value="<?php echo($userid);?>" readonly class="textbox"/></td>

</tr>

<tr>
<td colspan="2"><input type="submit" name="savequestion" value="save" id="btn">&nbsp;<input type="reset"  value="Cancel" id="btn"></td>
</tr>

</form>
</table>
</div>

<?php

if(isset($_POST['savequestion']))
{
$txtquest=$_POST["txtquest"];
$txta=$_POST["txta"];
$txtb=$_POST["txtb"];
$txtc=$_POST["txtc"];
$txtd=$_POST["txtd"];
$txtansw=$_POST["txtansw"];
$sid=$_POST["sid"];
if($con)
{

  $sql="insert into question values(' ','$txtquest','$txta','$txtb','$txtc','$txtd','$txtansw','$sid')";
   $insert=mysql_query($sql,$con);
   if($insert)
    echo" Question is inserted sucessfully";
	else
	echo" NO Question inserted inserted !!!".mysql_error($con);			
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