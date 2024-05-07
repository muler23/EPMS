<meta charset="utf-8"><?php
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
	margin-top: 5px;
	background-color: #718076;
	height: 220px;
	width: auto;
}
	.textbox
	{
		height:30px;
		width: 300px;
		border-top: none;
		border-left: none;
		font-family: Times New Roman;
		font-weight:italic;
		font-size: inherit;
		
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
<body style="background-color: #FFF">
<div id="container">
		
		<div id="menu">
		<?php
		include("../Admin/Adminmenu.php");
		?>
	</div>

				<div id="leftside">
						<?php
						include("../Admin/Adminsidemenu.php");
					   ?>	  
				</div>
				<div id="content">
								<fieldset style="border: none;">
				<legend align="center"><h2>Create User account Page</h2></legend>
				<form action="" method="post" enctype="multipart/form-data">
					<table>
			        <tr><td>First Name:</td><td><input type="text" name="fname" required=""pattern="[a-zA-Z0-9\]+" class="textbox"></td></tr>
					<tr><td>Last Name:</td><td><input type="text" name="lname" required=""pattern="[a-zA-Z0-9\]+" class="textbox"></td></tr>
					<tr><td>Sex</td><td>Male<input type="radio" name="sex" value="Male"/>
					Female<input type="radio" name="sex" value="Female"/></td></tr>
					<tr><td>EMP ID</td><td><input type="text" name="age" required="true" class="textbox"/></td></tr>
					<tr><td>Username:</td><td><input type="text" name="username" required=""pattern="[a-zA-Z0-9\]+" class="textbox"></td></tr>
					<tr><td>password:</td><td><input type="text" name="password" required=""pattern="[a-zA-Z0-9\]+" class="textbox"></td></tr>
					<tr><td>role:</td><td>
					<select name="role" required="true" class="textbox">
					<?php
				$role=array("Select Role","Adminstrator","Manager","HR" , "Employee");
				foreach($role as $i)
				echo "<option value=$i>$i</option>";
				?>	
				</select>
			</td></tr>
			<tr><td>User Photo:</td><td><input type="file" name="photo" required class="textbox"></td></tr>
			<tr><td colspan="2"><input type="reset" value="Reset" class="myButton"><input type="submit" value="Sign Up" name="register" class="myButton">
			</td></tr>
			</table>
			</form>
			
<?php
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
    {
				 if(isset($_POST['register']))
					{
							$fn=$_POST['fname'];
							$ln=$_POST['lname'];
							$sex=$_POST['sex'];
							$age=$_POST['age'];
							$un=$_POST['username'];
							$pw=MD5($_POST['password']);
							$role=$_POST['role'];
							$ptmploc=$_FILES["photo"]["tmp_name"];
							$pname=$_FILES["photo"]["name"];
							$psize=$_FILES["photo"]["size"];
							$ptype=$_FILES["photo"]["type"];
							
				if($con)
				{
				$sql="select * from account where username='$un'";
				$userexist=mysql_query($sql);
				if(mysql_affected_rows($con))
					echo "Username already exist please change your username and try again!";
				else{
					
						if($psize<=1000000&&($ptype=="image/jpeg"||$ptype=="image/jpeg"||$ptype=="image/png"))
				{
					if(!file_exists("userphoto"))
						mkdir("userphoto");
					$photopath="userphoto/$pname";
					if(copy($ptmploc,$photopath))
					{
					$sql=mysql_query("insert into account values('identity(1,1)','$fn','$ln','$sex','$age','$un','$pw','$role','1','$photopath','')");
					$inserted=mysql_query($sql);
								if(mysql_affected_rows($con))
									echo "User registered successfully!";
								else	
									echo "Unable to register the user";
							}else
								echo "Unable to upload the photo!";
						}
						else
						{
							if($psize>1000000)
								echo "Photo size should not be greater than 2Kb!";
							else
								echo "Photo should be in jpeg format";
						}
					}
					}
					else
				echo "Connection Failed";
				}
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
