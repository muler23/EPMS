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
	#login
{
	margin-top: 20px;
	background-color: #718076;
	height: 220px;
	width: auto;
}
#calander
{
	margin-top: 5px;
	width: auto;
	height: 190px;
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
		.textbox
	{
		padding-left: 10px;
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
		float: right;
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
	.myButton {
	-moz-box-shadow:inset 0px 0px 14px -3px #f2fadc;
	-webkit-box-shadow:inset 0px 0px 14px -3px #f2fadc;
	box-shadow:inset 0px 0px 14px -3px #f2fadc;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #dbe6c4), color-stop(1, #9ba892));
	background:-moz-linear-gradient(top, #dbe6c4 5%, #9ba892 100%);
	background:-webkit-linear-gradient(top, #dbe6c4 5%, #9ba892 100%);
	background:-o-linear-gradient(top, #dbe6c4 5%, #9ba892 100%);
	background:-ms-linear-gradient(top, #dbe6c4 5%, #9ba892 100%);
	background:linear-gradient(to bottom, #dbe6c4 5%, #9ba892 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dbe6c4', endColorstr='#9ba892',GradientType=0);
	background-color:#dbe6c4;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #b2b8ad;
	display:inline-block;
	cursor:pointer;
	color:#fff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ced9bf;
	float: none;
	width: 150px;
	height: 35px;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #9ba892), color-stop(1, #dbe6c4));
	background:-moz-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:-webkit-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:-o-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:-ms-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:linear-gradient(to bottom, #9ba892 5%, #dbe6c4 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9ba892', endColorstr='#dbe6c4',GradientType=0);
	background-color:#9ba892;
}
.myButton:active {
	position:relative;
	top:1px;
}
</style>
<script type="text/javascript">
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
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
include("../Admin/Adminmenu.php");
		?>
	</div>

				<div id="leftside">
					<div id="applyside">
						<?php
							include("../Admin/Adminsidemenu.php");
					   ?>	
					</div>    
				</div>
				<div id="content">
				<fieldset style="border: none;">
			
<div id="ContentRight" style="background-color: #d7d9dd;height: 150px;">
<form action="" method="post"><h2>Search And Block Users</h2>
	<font color="#006699" size="5px">Enter User Name</font><input type="text" name="ID" required="true"class="textbox"/>
	<input type="submit" name="search" value="search" class="myButton"/>
</form>
</div>
<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
    {
					if($con)
					{
					if(isset($_POST['search']))
						{
								$Search_ID=$_POST['ID'];
								$sql="select * from account where username='$Search_ID'";
								$recorfound=mysql_query($sql);
							if(mysql_affected_rows($con))
							 {
							$row=mysql_fetch_assoc($recorfound);
											
	echo	"<form action='' method='post' enctype='multipart/form-data'>";
	echo	"<table>";
	echo	"<tr><td>First_Name</td><td><input type='text' name='fname' value='".$row["fname"]."'readonly class='textbox'/></td></tr>";
	echo	"<tr><td>Last_Name</td><td><input type='text' name='lname' value='".$row["lname"]."'  readonly='true'class='textbox'/></td></tr>";
    echo	"<tr><td>Sex</td><td><input type='text' name='sex'  value='".$row["sex"]."' class='textbox' readonly/></td></tr>";
	echo	"<tr><td>Age</td><td><input type='number' name='age' value='".$row["age"]."' readonly='true'class='textbox'/></td></tr>";
	echo	"<tr><td>Username</td><td><input type='text' name='username' value='".$row["username"]."'  readonly='true'class='textbox'/></td></tr>";
	echo	"<tr><td>Password</td><td><input type='text' name='password' value='".$row["password"]."'  readonly='true'class='textbox'/></td></tr>";
	echo	"<tr><td>Role</td><td><input type='text' name='role'  value='".$row["role"]."'  readonly='true'class='textbox'/></td></tr>";
	echo	"<tr><td>Status</td><td><input type='text' name='status'  value='".$row["status"]."'  required='true'class='textbox'/></td></tr>";
	echo	"<tr><td colspan='2'><input type='submit' value='Block' name='Update' id='btn'/></td></tr></table></form>";
										
										}
										else
										echo "No Record Found!!";	
						}
					else if(isset($_POST["Update"]))
									{
						$status=$_POST['status'];	
						$un=$_POST['username'];
					$updated=mysql_query("update account set status='$status' where username='$un'");
										if(mysql_affected_rows($con))
										echo mysql_affected_rows($con)." User Blocked  successfully!";
										 else
										echo "Unable to Block User!";
													
									}
					}
					else
						echo "Connection faild";
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
<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="../images/top.png" style="width: 40px;height: 30px;border-radius: 170px;"/></button>
	</div>
</body>
</html>