<?php
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
include("../Database/connection.php");
?>
<html>
<meta charset="utf-8">
<link  href="../css/allcss.css" rel="stylesheet" type="text/css"/>
<head>
<title>Online Stuidenet Union Voting System</title>
<style>
	#login
{
	margin-top: 3px;
	background-color: #718076;
	height: 220px;
	width: auto;
}
	.textbox
	{
		height: 50px;
		width: 500px;
		border-top: none;
		border-left: none;
		font-family: Times New Roman;
		font-weight:italic;
		font-size: inherit;
		
	}
	.textarea
	{
		height: 100px;
		width: 500px;
		
	}
	.btn
	{
		height: 50px;
		width: 170px;
	}
	#reset
{

		height: 50px;
		width: 170px;	
}
	#content
{
	background-color: #dfdfdf;
	width: auto;
	height: 600px;
	margin-left: 220px;
	margin-bottom: 10px;
	margin-top: 10px;
}
</style>
</head>
<body>
<div id="container">
		<div id="header">
		<?php
		include("../header.php");
		?>
		</div>
		<div id="menu">
		<?php
		include("../Voter/votermenu.php");
		?>
	</div>

				<div id="leftside">
					<div id="applyside">
						<?php
						include("../Voter/votersidemenu.php");
					   ?>	
					</div>    
				</div>
				<div id="content">
				<?php
		if(isset($_POST['send']))
				{
					$fname=$_POST['fname'];
					$lname=$_POST['lname'];
					$email=$_POST['email'];
					$comment=$_POST['comment'];
					$date=$_POST['date'];
					$sql=mysql_query("insert into feedback(fname,lname,email,comment,date) values('$fname','$lname','$email','$comment','$date')");
					if(!$sql)
					{
						die("Data not inserted:".mysql_error());
					}
					else
					{
						echo "Feedback has been sent successfully1";
					}
				}
				?>
		<fieldset style="height: 500px;border: none;"><legend align="center"><img src="../images/feedback.jpg" height="60px;" width="500px;"/> </legend>
<form name="feedback" method="post" action="#">
<table>
<tr>
<td>
First Name:
</td>
<td align="right">
<input type="text" pattern="[A-Za-z]*" name="fname" maxlength="50"  required="true" class="textbox" placeholder="Enter First Name">
</td>
</tr>
<tr><td>
Last Name:
</td>
�<td>
<input type="text" pattern="[A-Za-z]*" name="lname" maxlength="50"  required="true" class="textbox" placeholder="Enter Last Name">
</td>
</tr>
<tr>
<td>
Email Address:
</td>
<td >
<input type="email" style="background-image:none;" name="email" required="true" class="textbox" placeholder="Enter Email Address">
</td>
</tr>
<tr>
<td>
Comments :
</td>
<td>
<textarea name="comment" maxlength="1000" cols="25" rows="6" class="textarea" placeholder="Put Here Your Coment"></textarea>
</td>
</tr>
<tr><td>Date:</td><td><input type="text" name="date" value="<?php echo date("d/m/y");?>" readonly class="textbox"></td></tr>
<tr>
<td colspan="2" style="text-align:right">
<input type="submit" value="Submit" class="btn" name="send"><input type="reset" value="Reset" id="reset">�
</td>
</tr>
</table>
</form>
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
