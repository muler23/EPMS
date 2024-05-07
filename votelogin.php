<?php
session_start();
if(isset($_session['counter']))
	$_session['counter']+=1;
	else
	$_session['counter']=1;
	?>
<html>
<meta charset="utf-8">
<link  href="css/allcss.css" rel="stylesheet" type="text/css"/>
<head>
<title>epms</title>
<style>
#content
{
	background-color: #ebebeb;
	width: 1200px;
	height: 500px;
	margin-left: 0px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: hidden;
}
#menu
{
    /* background-color: red; */
width: 1350px; 
/* height: 750px; */
    margin-top: -40px;
    margin-left: -72px;

}
#leftside
{
	background-color: black;
	width: 100px;
	height: 650px;
	float: left;
	 /* //margin-top: -10px; */
    margin-left: -1350px;

}
#myBtn {
	  width: 60px;
	  display: none;
	  position: fixed;
	  bottom: 13px;
	  right: 80px;
	  font-size: 18px;
	  border-radius: 150px;;
	  outline: none;
	  color: #fff;
	  transition: 0.8s ease;
	  opacity: 0.8;
	  background-color: #96a0a0;
	  cursor: pointer;
	  padding: 2px;
	  height: 50px;
	  
}
#myBtn:hover {
  background-color: black;
}

.login {
  width: 700px;
  margin: 0px auto;
  font-size: 16px;
}

/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

/* The triangle form is achieved by a CSS hack */
.login-triangle {
  width: 0;
  margin-right: auto;
  margin-left: auto;
  border: 12px solid transparent;
  border-bottom-color: #28d;
}

.login-header {
  background: #28d;
  padding: 20px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  text-transform: capitalize;
  color: #fff;
}

.login-container {
  background: #ddd;
  padding: 20px;
}

/* Every row inside .login-container is defined with p tags */
.login p {
	
		color: #555;
		font-weight: bolder;
		font-family: Times New Roman;
		font-size: 20px;
		padding: 5px;
}
.login input {
  display: block;
  width: 100%;
  padding: 16px;
  font-family: inherit;
  font-size: 0.95em;
}

.login input[type="text"],
.login input[type="password"] {
  background: #fff;
  border: none;
  color: #555;
}

/* Text fields' focus effect */
.login input[type="text"]:focus,
.login input[type="password"]:focus {
border: none;
}

.login input[type="submit"] {
  background: #a5aaa4;
  width: 150px;
  color: #fff;
  cursor: pointer;
  border: none;
}

.login input[type="submit"]:hover {
  background: #a2d2d7;
}

/* Buttons' focus effect */
.login input[type="submit"]:focus {
  border-color: #05a;
}



/* Text fields' focus effect */
.login input[type="text"]:focus,
.login input[type="password"]:focus {
border: none;
}

.login input[type="reset"] {
  background: #a5aaa4;
  width: 250px;
  color: #fff;
  cursor: pointer;
  border: none;
}

.login input[type="reset"]:hover {
  background: #a2d2d7;
}

/* Buttons' focus effect */
.login input[type="reset"]:focus {
  border-color: #05a;
}
</style>
<script>
function show_password() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    }
    else {
        x.type = "password";
    }
}
</script>
</head>
<body style="background-color: #FFF">
<div id="container">
		
		<div id="menu">
		<?php
		include("menu.php");
		?>
	</div>
	<div id="leftside">
</div>
			<div id="content">
				<div class="login">
						  <div class="login-triangle"></div>
						  <h2 class="login-header">Just Login here</h2>
					 <form class="login-container" method="post" enctype="multipart/form-data">
					      	<p>User Name:<input type="text" placeholder="username" name="username"required></p>
					      	<p>Password:<input type="password" placeholder="********" name="password" id="password" required></p>
					    	<p><input type="submit" value="Login" name="login"></p>
				            <label style="margin-left: 100px;float: right;margin-top: -50px;">
					        <input type="checkbox" name="checkbox" id="chekbox" onClick="show_password();">Show Password
					        </label>
					       <P><a href="forgotpassword.php" style="text-decoration:none;font-style: italic;">Forget Password</a></P>
					       <span style="width: 10px;"><input type="reset" value="Reset" style="width: 150px;float: right;margin-top: -40px;"/></span>
					  </form>
			  	
			    <?php   
      		include("Database/connection.php");	 
    	if($con)
	 	{
if(isset($_POST['username'])&&isset($_POST['password']))
	 {

	if(isset($_POST['login']))
     {

		$uname=$_POST['username'];
		$upass=$_POST['password'];
		$pass=md5($upass);
		$result=mysql_query( "Select * from account where (account.username='$uname' and 
		account.password='$pass' and  account.status=1)");
		$row=mysql_fetch_array($result);
		$username=$row['username'];
		$password=$row['password'];
		$role=$row['role'];
		$photo=$row['photo'];
		$userid=$row['emp_id'];
	   }
		if($username==$uname&&$password==$pass)
		{
			$sql=mysql_query("delete from attempt");	
			$_SESSION['username']=$uname;
			$_SESSION['password']=$upass;
			$_SESSION['role']=$role;
			$_SESSION['emp_id']=$userid;
			$_SESSION['sphoto']=$photo;
			if($_SESSION['role']=="Adminstrator")
			header("location:Admin/Admin.php");
			else if($_SESSION['role']=="HR")
			header("location:ssd/SSD.php");
			else if($_SESSION['role']=="Directer")
			header("location:candidate/Candidate.php");
			else if($_SESSION['role']=="Employee")
			header("location:Voter/Voter.php");
			else if($_SESSION['role']=="Manager")
			header("location:Main-Registrar/Main-Registrar.php");
			else
			
					echo "Unknown Role";
		   		
	    }
	else
	{
$count="insert";
$sql=mysql_query("select*from attempt");
$total=mysql_num_rows($sql);
$total++;
if($total>3)
{
header("location:votelogin1.php");
}
else
{
echo "<font color=red>Please enter correct username and password</font>";
echo "<br>You have 4 Chance now you tries $total times";
$insert=mysql_query("insert into attempt values('$count')");	
}
}
}
}else
	echo "Database not connected!";
?>  </div>
		    </div>
		<div id="footer">
			<?php
			include("footer.php");
			?>
	</div>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="images/top.png" style="width: 40px;height: 30px;border-radius: 170px;"/></button>
</body>
</html>