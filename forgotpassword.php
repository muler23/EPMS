<?php
session_start();
 include("Database/connection.php");
if(isset($_session['counter']))
	$_session['counter']+=1;
	else
	$_session['counter']=1;
	?>
<html>
<meta charset="utf-8">
<link  href="css/allcss.css" rel="stylesheet" type="text/css"/>
<head>
<title>EPMS</title>
<style>
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
	float: right;
	width: 250px;
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


.myButtons {
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
	width: 100px;
	height: 40px;
}
.myButtons:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #9ba892), color-stop(1, #dbe6c4));
	background:-moz-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:-webkit-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:-o-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:-ms-linear-gradient(top, #9ba892 5%, #dbe6c4 100%);
	background:linear-gradient(to bottom, #9ba892 5%, #dbe6c4 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9ba892', endColorstr='#dbe6c4',GradientType=0);
	background-color:#9ba892;
}
.myButtons:active {
	position:relative;
	top:1px;
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
#content
{
	background-color: #dfdfdf;
	width: 1200px;
	margin-left: -0px;
	height: 550px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: hidden;
}
#rightside
{
	background-color: #336699;
	width: 220px;
	height: 555px;
	float: right;
	margin-top: 5px;
	margin-right: 40px;
}
#calander
{
	margin-top: 1px;
	padding-top: 0px;
	width: auto;
	height: 190px;
}
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #dedede;
    box-sizing: border-box;
}
hr.style-five {
    border: 0;
    height: 0; /* Firefox... */
    box-shadow: 0 0 10px 1px black;
}
hr.style-five:after {  /* Not really supposed to work, but does */
    content: "\00a0";  /* Prevent margin collapse */
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


// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
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
		
		<div id="menu">
		<?php
		include("menu.php");
		?>
	</div>

				<div id="content">
<fieldset style="border: none;margin: 30px;">

			<div style="margin-left: 400px;">
				<h1>Recover Password</h1>
				<div class="topnav">
    <form method="post"enctype="multipart/form-data">
      <label style="color: #006699;font-size: 20px;">Enter Your Username:</label><input type="text" placeholder="Search.." name="searchID" required="1" style="width: 200px;"/>
      <input type="submit" value="Search" name="search" class="myButtons">
    </form>
  </div> <?php
  			if(isset($_POST['search']))
						{
  				$Search_ID=$_POST['searchID'];
				$sql="select * from account where username='$Search_ID'";
				$userexist=mysql_query($sql);
				if(mysql_affected_rows()>0)
				{
				while($row=mysql_fetch_assoc($userexist))	
						{
					?>
  

			   <form method="POST" enctype="multipart/form-data">
			    <table>
			    <tr><td>UserName</td><td><input type="username"  name="username" class="textbox" required="1" readonly="1" value="<?php echo $row['username'];?>"/> </td></tr> 
			    <tr><td>Enter your new password:</td><td><input type="password"  name="newpassword" class="textbox"required></td></tr>
			    <tr><td>Re-enter your new password:</td><td><input type="password"  name="confirmnewpassword" class="textbox"required></td></tr>
			    <tr><td colspan="2"><input type="submit" value="Update Password" name="change" class="myButton"></td></tr>
			    </table>  
			 </form>
			 
			    <?php
			    }
			    }
			    else
			    print "<font color=red>Unknown Username</font>";
}
		    else if(isset($_POST['change']))
		    {
				$username = $_POST['username'];
		        $newpassword = md5($_POST['newpassword']);
		        $confirmnewpassword = md5($_POST['confirmnewpassword']);
		        $result = mysql_query("SELECT * FROM account WHERE username='$username'");
		        $row=mysql_fetch_assoc($result);
			    if($newpassword==$confirmnewpassword)
			    {
		        $sql=mysql_query("UPDATE account SET password='$newpassword' where username='$username'");
		        if($sql)
		        {
		        echo "<font color='green'>You have successfully Recover your password</font>";
		        }
		        }
		       else
		        {
		       echo "<font color='red'>Password does not match</font>";
               }	

         }
      ?>
				</div>
		
						</fieldset>
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