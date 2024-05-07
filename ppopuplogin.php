<head>
<meta charset="utf-8">
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
<div id="id01" class="modal">
  <form class="modal-content animate" method="post" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/login_icon.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username...." name="username" required style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    font-size:20px;
    font-family:Times New Roman;
    display: inline-block;
    border: 1px solid #dedede;
    box-sizing: border-box;">
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="**************" name="password" id="password" required style="    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    font-size:20px;
    font-family:Times New Roman;
    display: inline-block;
    border: 1px solid #dedede;
    box-sizing: border-box;">
        
      <button type="submit" name="login">ግባ</button>
      <label >
        <input type="checkbox" name="checAkbox" id="chekbox" onClick="show_password();"> የይለፍ ቃል ይታይ
      </label><br/>
      <button type="reset"  class="cancelbtn" style="width: 100px;">አጠፋ</button>
      <span class="psw">ረሳህ <a href="#">የይለፍ ቃል?</a></span>
      
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
		$pass=$upass;
		$result=mysql_query("Select * from account where (account.username='$uname' and 
		account.password='$pass' and  account.status=1)");
		$row=mysql_fetch_array($result);
		$username=$row['username'];
		$password=$row['password'];
		$role=$row['role'];
		$photo=$row['photo'];
		$userid=$row['userid'];
	   }
		if($username==$uname&&$password==$pass)
		{
			$_SESSION['username']=$uname;
			$_SESSION['password']=$upass;
			$_SESSION['role']=$role;
			$_SESSION['userid']=$userid;
			$_SESSION['sphoto']=$photo;
			if($_SESSION['role']=="Adminstrator")
			header("location:Admin/Admin.php");
			else if($_SESSION['role']=="SSD")
			header("location:ssd/SSD.php");
			else if($_SESSION['role']=="Candidate")
			header("location:candidate/Candidate.php");
			else if($_SESSION['role']=="Voter")
			header("location:Voter/Voter.php");
			else if($_SESSION['role']=="Main-Registrar")
			header("location:Main-Registrar/Main-Registrar.php");
			else
			
					echo "አይታወቅም";
		   		
	    }
	else
	{
echo "<script>alert('እባክዎ ትክክለኛ ስም እና የይለፍ ቃል ያስገቡ');</script>";
	}
	}
	
}else
	echo "ዳታቤዙ አልተገናኘም!";
?>
    </div>
      
  </form>
</div>