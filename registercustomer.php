<?php
session_start();
include("connection.php");
include("connection2.php");
?>

<html>
<meta charset="utf-8">
<head> 
   <link rel="stylesheet" type="text/css" href="setting2.css" />	
   <link rel="stylesheet" type="text/css" href="setting3.css" />
    <script src="validation.js" type="text/javascript"></script>
   <title>register customer</title>
</head>
<body style="background-color: #FFDEAD">
<?php

	if(isset($_SESSION['Username']) && isset($_SESSION['Password']))
	{
		$id=$_SESSION['$id'];
		//$user=$_SESSION['$user'];
		//$acc=$_SESSION['$acc'];
	
?>
<div id='mainblock'align="left" >
<!-- Header Table -->
<table border="0" cellpadding="0" cellspacing="0">
	<tr valign="top">
		<td><?php
include("header.php");
?>
</td>	
</tr>
</table>
<!-- End of Header Table -->
<!-- Menu Bar -->
<?php

	//if(isset($_SESSION['username']) && isset($_SESSION['password']))
	//{

?>
<div id="navigationmenu">
<table  border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
<?php
		include("menu.php");
	?>
		</td>
	</tr>
</table>
</div>
<!-- End of Menu Bar -->
<!-- Left Menu -->
<div id='leftnavigation'>
<?php
		include("left2.php");
	?>
</div>
<!--End of Left Menu -->
<!-- Right Menu -->
<div id='rightnavigation'>	
<?php
		include("right2.php");
	?>
</div>
<!-- End of right Menu -->
<!-- Content -->
<div id='content'>
<?php
if(isset($_POST["submit"]))
{
	 $Today=date("m");
	$NewDate=date("m", strtotime("+30 days"));
	//$phoneno=$_POST["photo"];
	$acc=$_POST["no"];
	$id=$_POST["id"];
	$fn=$_POST["fname"];
	$mn=$_POST["mname"];
	$ln=$_POST["lname"];
	$sex=$_POST["sex"];
	$age=$_POST["age"];
	$zone=$_POST["zone"];
	$wor=$_POST["woreda"];
	$tow=$_POST["town"];
	$keb=$_POST["kebele"];
    $share=$_POST["share"];
    $workpl=$_POST["workp"];
	$occup=$_POST["occup"];
	$coll=$_POST["coll"];
	$depo=$_POST["amo"];
	$mob=$_POST["mopho"];
	$dat=$_POST["date"];
	
	    
	if($con)
	  {
	$ptmploc=$_FILES["photo"]["tmp_name"];
	$pname=$_FILES["photo"]["name"];
	$psize=$_FILES["photo"]["size"];
	$ptype=$_FILES["photo"]["type"];						
	
			
		if($ptype=="image/jpeg")
			{
		if(!file_exists("image"))
			mkdir("image");
			$photopath="image/$pname";
			if(copy($ptmploc,$photopath))
			{
		$sql="select * from customer where accountno='$acc'";
		$userexist=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			echo "account number  already exist please change your account number and try again!";
			else
			{
		$sql="select * from customer where custid='$id'";
		$userexist=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			echo "customer id already exist!";
		else
		{	
	       if($age>=14 && $age<=80 )
	       {
	       	if($share>=90 && $share<=300)
	       	{
			$sql="Insert into customer values('$photopath','$id','$acc','$fn','$mn','$ln', '$sex','$age','$zone',
	'$wor','$tow','$keb','$share','$workpl','$occup','$coll','$depo','$mob','$dat','noreport','nodeposit',
	'new','$Today','$NewDate','','Active')";
			$inserted=mysqli_query($con,$sql);
			if(mysqli_affected_rows($con))
				echo "Customer registered successfully!";
			else	
				echo "Unable to register the user";
				

				//////////////////deposit
$Today1=date("m");
$NewDate1=date("m", strtotime("+30 days"));
$Today=date("Y-m-d");
$NewDate=date("Y/m/d", strtotime("+0 days"));
   $did=$_POST["id"];
	//$acc=$_POST["no"];
	//$depo=$_POST["amou"];
	$Interest=0;
	$Balance=$depo;

			
	/*if($con)
	{   
	$sql="select * from registercustomer where accountno='$acc'";
		$userexist=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
		{*/
		$sql="select * from deposite where depositid='$did'";
		$userexist=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			echo "deposit id  already exist please change your deposit id and try again!";
		else
		{
		if($depo>=50)
		{
				$sql="insert into deposite values('identity(1,1)','$acc','$depo',Now(),'$Interest','$Balance','$NewDate','$Today1','$NewDate1')";
			$inserted=mysqli_query($con,$sql);
			//if(mysqli_affected_rows($con))
				//echo  mysqli_affected_rows($con).   "deposit money registered successfully!";
			//else	
				//echo "Unable to register the deposit money";
	$sql2="select * from count";
	$recordfound=mysqli_query($con,$sql2);
	$row=mysqli_fetch_array($recordfound);
		   {
			$cou=$row['total'];
			$tot=$cou+$depo;
			$sql1="Update count set total='$tot'";
		$updated=mysqli_query($con,$sql1);
			}
				}
				else 
				echo " no deposit less than 50 birr";
				}
				}
				else
				echo "Share between 90 and 300 birr";
				}
				else
				echo "customer age must be greater than 14 or less than 80";
	//}}
		}
		}
		
		
		}
		//}
		else
		echo "Unable to upload the photo!";
		}
		else
		{
			//if($psize>300000)
		//echo "  Photo size should not be greater than 2Kb??";
		//else
		echo "Photo should be in jpeg format";
		
		}		
		//
		}
	else
		echo "Connection Failed";
       }
        ?>
        
       <!-- calculate interset--> 
        
        
     <?php
     if($con)
	{
		$Today2=date("m");
		$NewDate2=date("m", strtotime("+30 days"));
     $tod=date("Y-m-d");
     $newD=date("Y/m/d", strtotime("+0 days"));
     $sql2="select * from deposite";
	$recordfound=mysqli_query($con,$sql2);
	while($row=mysqli_fetch_array($recordfound))
		{
		$id=$row['depositid'];
		$bdate=$row['bdate'];
		
     if($tod==$bdate)
     {
     	$acc=$row['accountno'];
     	$b=$row['balance'];	
     	$v=0.4;
	 	$t=($b*$v)/100;
	 	$ba=$b+$t;
	 	//echo $acc;
	 	$sql11="Update deposite set balance='$ba',interest='$t',bdate='$newD',imonth='$NewDate2' where accountno='$acc'";
		$updated1=mysqli_query($con,$sql11);
		  $sql="select * from count";
	$recordfound=mysqli_query($con,$sql);
	while($row1=mysqli_fetch_array($recordfound))
		{
			$tot=$row1['total'];
			$total=$tot+$t;
	$sql1="Update count set total='$total'";
		$updated=mysqli_query($con,$sql1);
		}
	 }
	 }
	 }
     ?>
     
<fieldset style=" width: 550; margin-left:50px" alien="center">
<table  align="center" border="0" cellpadding="" cellspacing="" style="margin-top: -290px">
<h2 align="center" style="background:#1f618d;color: white;height: 30px">Register Customer</h2>
	<form action="" method="post" enctype="multipart/form-data">	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date: <input type="text" name="date" value="<?php echo date('Y-m-d')?> "readonly=""><br>	<br>	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Photo:<input type="file" name="photo" id="pho" style=" width: 30%;
						height:7%; border-radius:4px;font-size:15px;box-sizing: border-box; 
						border: 1px solid #060907; box-sizing: border-box; padding: 0px;" ><br>	
						<script type="text/javascript">
				    var f1 = new LiveValidation('pho');
				   f1.add(Validate.Presence,{failureMessage: " <font color=red>It cannot be empty</font>"});
				
				 </script>
<tr><td style="font-size: 18px"></td><td><input type="hidden"name="id" id="id" pattern="^[0-9 ]+"  required="deposit id is required" placeholder="enter deposit id" style="height: 28px"
                                            onChange="document.getElementById('id').value=trim(this.value);"></td></tr><br>			
<tr><td style="font-size: 18px">Account No:</td><td>
<input type="text"name="no" id="no" pattern="^[0-9 ]+" value="<?php
	$sql="select * from customer";
	$userexist=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($userexist))
	{
	$acc=$row["accountno"];	
	}
	if($acc=='')
	echo 400010000000;
	else
	echo $acc+1;
	?>" readonly="" required="account is required" placeholder="enter account number" style="height: 28px" ></td></tr><br>
	<tr><td style="font-size: 18px">Customer ID:</td><td>
	<!--<input type="text" name="id" id="id" pattern="^[a-zA-Z/0-9 ]+"required="first name is required" placeholder="customer id" style="height: 28px">-->
	<select name="id" id="idd"style="height: 28px;width: 175px">
	                     <?php
	                    $sql="select * from stripper where status='Active' ";
						  $sql1=mysqli_query($conn,$sql);					
						  if($sql1)
						  {		
						  ?>
						  <option value=""></option>
						  <?php						
						while($row=mysqli_fetch_array($sql1 ))
						  {
						?>
						
						<option value="<?php echo $row["custid"];?>">
						<?php echo $row["custid"];?>							
						</option>
						<?php
						}
						
						}	
						?>	
						</select>
						<script type="text/javascript">
				    var f1 = new LiveValidation('idd');
				   f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9/]+$/ ,failureMessage: " It allows  character , numberand /"});
				 </script>
						</td></tr><br>
<tr><td style="font-size: 18px">First name:</td><td><input type="text" name="fname" id="fnam" pattern="^[a-zA-Z ]+"required="first name is required" placeholder="customer first name" style="height: 28px"></td></tr><br>
<script type="text/javascript">
				    var f1 = new LiveValidation('fnam');
				   f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " It allows only character"});
				 </script>
<tr><td style="font-size: 18px">Father name:</td><td><input type="text" name="mname" id="mnam" pattern="^[a-zA-Z ]+"required="father name is required" placeholder="customer father name" style="height: 28px"></td></tr><br>
<script type="text/javascript">
				    var f1 = new LiveValidation('mnam');
				   f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " It allows only character"});
				 </script>
<tr><td style="font-size: 18px">GrandFather name:</td><td><input type="text" name="lname" id="lnam" pattern="^[a-zA-Z ]+" required ="last name is required" placeholder="customer grand father name" style="height: 28px"></td></tr><br>
<script type="text/javascript">
				    var f1 = new LiveValidation('lnam');
				   f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " It allows only character"});
				 </script>
<tr><td style="font-size: 18px">Sex:</td><td><input type="radio" name="sex" value="male" checked>Male
<input type="radio" name="sex" value="female">Female
</td></tr><br>
<tr><td style="font-size: 18px">Age:</td><td><input type="number" name="age" id="age" pattern="^[0-9 ]+" required="age is required" placeholder="customer age" style="height: 28px;width: 174"></td></tr><br>

<tr><td style="font-size: 18px">Zone:</td><td><input type="text" name="zone" id="zon" pattern="^[a-zA-Z0-9/ ]+"required="zone is required" placeholder="customer zone address" style="height: 28px"></td></tr><br>
<script type="text/javascript">
				    var f1 = new LiveValidation('zon');
				   f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9/]+$/ ,failureMessage: " It allows character , number and /"});
				 </script>
<tr><td style="font-size: 18px">Woreda:</td><td><input type="text" name="woreda" id="wored" pattern="^[a-zA-Z0-9/ ]+" required="woreda is required" placeholder="customer woreda address" style="height: 28px"></td></tr><br>
<script type="text/javascript">
				    var f1 = new LiveValidation('wored');
				   f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9/]+$/ ,failureMessage: " It allows character , number and /"});
				 </script>
<tr><td style="font-size: 18px">Town:</td><td><input type="text" name="town" id="tow" pattern="^[a-zA-Z0-9/ ]+" required="town is required" placeholder="customer town address" style="height: 28px"></td></tr><br>
<script type="text/javascript">
				    var f1 = new LiveValidation('tow');
				   f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9/]+$/ ,failureMessage: " It allows character , number and /"});
				 </script>
<tr><td style="font-size: 18px">Kebele:</td><td><input type="text" name="kebele" id="kebel" pattern="^[a-zA-Z0-9/ ]+"required="kebele is required" placeholder="customer kebele address" style="height: 28px"></td></tr><br>
<script type="text/javascript">
				    var f1 = new LiveValidation('kebel');
				   f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9/]+$/ ,failureMessage: " It allows character , number and /"});
				 </script>
	<tr><td style="font-size: 18px">share:</td><td><input type="text" name="share" id="shar" pattern="^[0-9 ]+"required="share is required" placeholder="amount of share" style="height: 28px"></td></tr><br>
 <script type="text/javascript">
				    var f1 = new LiveValidation('shar');
				   f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[0-9]+$/ ,failureMessage: " It allows only number"});
				  // f1.add( Validate.Length, { minimum:13, maximum: 13,failureMessage:"always 12 charactor " } );
				 </script>
<tr><td style="font-size: 18px">Work place:</td><td><input type="text" name="workp" id="workpp" value="DMU" pattern="^[a-zA-Z0-9/ ]+"required="work place is required" readonly="" placeholder="customer work place" style="height: 28px"></td></tr><br>
<script type="text/javascript">
				    var f1 = new LiveValidation('workpp');
				   f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " It allows only character"});
				 </script>

<tr><td style="font-size: 18px">Occupation:</td><td><input type="text" name="occup" id="occupp" pattern="^[a-zA-Z/ ]+"required="occupation is required" placeholder="customer occupation" style="height: 28px"></td></tr><br>
 <script type="text/javascript">
				    var f1 = new LiveValidation('occupp');
				   f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " It allows only character"});
				  // f1.add( Validate.Length, { minimum:13, maximum: 13,failureMessage:"always 12 charactor " } );
				 </script>
<tr><td style="font-size: 18px">collage:</td><td>
<select name="coll" id="col"style="height: 28px">
	<option value="">select collage</option>
	<option value="technology">Tecnology collage</option>
	<option value="health">Health collage</option>
	<option value="social">Social science collage</option>
	<option value="law">Law collage</option>
	<option value="agricalcur">Agricalcher collage</option>
	<option value="fb">FB collage</option>
	<option value="executive">Executive</option>
	<option value="assocation">assocation</option>
</select>
</td></tr><br>
 <script type="text/javascript">
				    var f1 = new LiveValidation('col');
				   f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " It allows only character"});
				  // f1.add( Validate.Length, { minimum:13, maximum: 13,failureMessage:"always 12 charactor " } );
				 </script>
<tr><td style="font-size: 18px">Deposit amount:</td><td><input type="text" name="amo" id="amou" pattern="^[0-9]+"required="deposit is required" placeholder="deposit amount" style="height: 28px"></td></tr><br>
 <script type="text/javascript">
				    var f1 = new LiveValidation('amou');
				   f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[0-9.]+$/ ,failureMessage: " It allows only numbers and dot"});
				  // f1.add( Validate.Length, { minimum:13, maximum: 13,failureMessage:"always 12 charactor " } );
				 </script>
<tr><td style="font-size: 18px">Mobile phone:</td><td><input type="text" name="mopho" id="phon" value="+2519" maxlength="13" pattern="^[0-9+ ]+" required="mobile is required"  style="height: 28px"></td></tr><br>
	 <script type="text/javascript">
				    var f1 = new LiveValidation('phon');
				   f1.add(Validate.Presence,{alertMessage: " It cannot be empty"});
				   f1.add(Validate.Format,{pattern: /^[0-9+]+$/ ,failureMessage: " It allows only numbers and +"});
				   f1.add( Validate.Length, { minimum:13, maximum: 13,failureMessage:"always 10 charactor " } );
				 </script>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td><th><input type="submit" name="submit" value="Register" style="font-size: 20px;background: #1f618d;color: white">
<input type="reset" value="cancle"style="font-size: 20px;background: #1f618d;color: white"></th></tr>
</form>
</table></fieldset>
</div>
<?php
	//}
	//else
	//header("location:index.php");	
?>
<!-- End of Content -->
<!-- Footer -->
<div id='foot'>	
<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td> <?php
 include("foot.php");
?>
</td>
		</tr>
		
	</table>
</div>
<!-- End of Footer -->  
</div>
<?php
	}
	else
	header("location:index.php");	
?>
</body>
</html>
