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
<body style="background-color: #FFDEAD">
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


                <fieldset  style="height: 500px;">
                <legend align="center"><img src="../images/contact.jpg" height="60px;" width="500px;"/> </legend>
<form method="post" name="contact" action="#">
<table>
<tr>
�<td>
First Name:
�</td>
�<td  align="right">
�<input type="text" pattern="[A-Za-z]*" name="first_name" maxlength="50"  required="true" class="textbox" placeholder="Enter First Name">
�</td>
</tr>
<tr>
<td>
Last Name:
�</td>
�<td>
��<input type="text" pattern="[A-Za-z]*" name="last_name" required="true" class="textbox" placeholder="Enter Last Name">
�</td>
</tr>
<tr>
�<td>
Email Address:
�</td>
�<td>
��<input type="email" name="email" required="true" class="textbox" placeholder="Enter Email Address">
�</td>
</tr>
<tr>
�<td>
Position:
�</td>
�<td>
��<input type="text" name="position" placeholder="Enter The position" class="textbox"/>
�</td>
�
</tr>
<tr>
�<td colspan="2" style="text-align:right">
��<input type="submit" value="Submit" class="btn">���<input type="reset" value="Reset" id="reset">�
�</td>
</tr>
</table>	
</form></fieldset>
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
