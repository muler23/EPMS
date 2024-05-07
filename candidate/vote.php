<?php
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
include("../Database/connection.php");
$id=$_SESSION['userid'];
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
	overflow-x: scroll;
	overflow-y: scroll;
}

.btn {
	float: right;
    position: relative;
    background-color: #4592d8;
    color: #fffbfb;
    font-size: 16px;
    padding: 10px 30px;
    border: none;
    cursor: pointer;
    border-radius: 1px;
    text-align: center;
    width: 160px;
    text-decoration: none;
}
.btn:hover {
	background-color: #e9e8e7;
   opacity: 0.9;
    color: #000000;
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
							include("../candidate/candidatesidemenu.php");
					   ?>	
					</div>    
				</div>
				<div id="content">
				<fieldset style="margin: 2px;height: auto;border: none;">
			<div style="margin-left: 600px;margin-top: -0px;border:1px solid #fff;padding: 5px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
<?php	
$result = mysql_query("SELECT * FROM elecetion_date");
$numrow = mysql_num_rows($result);
if ($numrow == 0)
{
	die('Now The Election DATE iS not Started!!!');
}
$row = mysql_fetch_row($result);
$closedate = date_format(date_create($row[2]), 'm/d/Y H:i:s');
//print("you can send request Until time is up!!");
echo "Voting Close Date: " . $closedate;
?>
<br>
Time Left:
<script>
CloseDate = "<?php echo $closedate ?>";
BackColor = "whte";
ForeColor = "red";
CountActive = true;
CountStepper = -1;
LeadingZero = true;
DisplayFormat = "%%D%% Days %%H%%:%%M%%:%%S%% Seconds.";
FinishMessage = "Voting is now bieng closed!";
	function calcage(secs, num1, num2) {
  s = ((Math.floor(secs/num1))%num2).toString();
  if (LeadingZero && s.length < 2)
    s = "0" + s;
  return "<b>" + s + "</b>";
}
function CountBack(secs) {
  if (secs < 0) {
    document.getElementById("cntdwn").innerHTML = "Request Date is Now Closed";
	window.location = "../candidate/voteclosed.php"
    return;
  }
  DisplayStr = DisplayFormat.replace(/%%D%%/g, calcage(secs,86400,100000));
  DisplayStr = DisplayStr.replace(/%%H%%/g, calcage(secs,3600,24));
  DisplayStr = DisplayStr.replace(/%%M%%/g, calcage(secs,60,60));
  DisplayStr = DisplayStr.replace(/%%S%%/g, calcage(secs,1,60));

  document.getElementById("cntdwn").innerHTML = DisplayStr;
  if (CountActive)
    setTimeout("CountBack(" + (secs+CountStepper) + ")", SetTimeOutPeriod);
}

function putspan(backcolor, forecolor) 
{
 document.write("<span id='cntdwn' style='background-color:" + backcolor + 
                "; color:" + forecolor + "'></span>");
}
CountStepper = Math.ceil(CountStepper);
if (CountStepper == 0)
  CountActive = false;
var SetTimeOutPeriod = (Math.abs(CountStepper)-1)*1000 + 990;
putspan(BackColor, ForeColor);
var EndDate = new Date(CloseDate);
var CurrentDate = new Date();
if(CountStepper>0)
  ddiff = new Date(CurrentDate-EndDate);
else
  ddiff = new Date(EndDate-CurrentDate);
gsecs = Math.floor(ddiff.valueOf()/1000);
CountBack(gsecs);
</script></div>
		<?php
	$sql1=mysql_query("select * from account where role='Candidate'");
	$row1=mysql_num_rows($sql1);
	if($row1>0)
	{
				while($info = mysql_fetch_array($sql1))
				{	
					$username=$info['username'];
					$photo=$info['photo'];
					$fn=$info['fname'];
					$ln=$info['lname'];
					$userid=$info['userid'];
					
					$query=mysql_query("select * from requesttable where username='$username'");
					$rowselected=mysql_num_rows($query);
					if($rowselected>0)
					{
					while($rowsel = mysql_fetch_array($query))
					{
					$collage=$rowsel['collage'];
					$dept=$rowsel['department'];
					$yr=$rowsel['year'];	
					$cgpa=$rowsel['cgpa'];  
					
			
					}		 ?>
					<div style="margin: 5px;float: left;border:1px Solid #dadcdc;
					 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
					<table cellspacing="0">
						<tr  style="background-color: #5078af;height: auto;color: #fff;"><th colspan="2">
						<label>Candidate:<?php echo ''.$fn.'';?></label></th></tr>
						<tr><td colspan="2"><?php echo "<img src='$photo' height=200>"?></td></tr>
						<tr><td><b>Full Name:</b></td><td><?php echo ''.$fn.'&nbsp;'.$ln.'';?></td></tr>
						<tr><td><b>Collage:</b></td><td><?php  echo ''.$collage.''; ?></td></tr>
						<tr><td><b>Department:</b></td><td><?php echo ''.$dept.''; ?></td></tr>
						<tr><td><b>Year:</b></td><td><?php echo ''.$yr.'&nbsp;year'; ?></td></tr>
						<tr><td><b>CGPA:</b></td><td><?php echo ''.$cgpa.''; ?></td></tr>
						<tr><td colspan="2"><a href="vote.php?voteid=<?php echo $userid;?>" class="btn">Vote<a/></td></tr>
					</table>
					</div>
                    <?php
					}
					else
					print "no candidate found!";
		         }	
		       if(isset($_GET['voteid']))
	                	{
	            $varvoteid=$_GET['voteid'];
			$qry="select * from account where userid='$id'";
			$results = mysql_query($qry) or die(mysql_error());
			if(mysql_num_rows($results)>0)
			{
				while ($row = mysql_fetch_array($results)) 
					{
					$requestid=$row['requestid'];
					$sqlquer1=mysql_query("select * from account WHERE userid='$varvoteid'");
					while($row2 = mysql_fetch_array($sqlquer1))
					{
					$fn=$row2['fname'];
					$ln=$row2['lname'];	
					$age=$row2['age'];
					$sex=$row2['sex'];
					$requestid2=$row['requestid'];
					$sqlquer2=mysql_query("select * from requesttable WHERE Student_ID='$requestid2'");
					while($row3 = mysql_fetch_array($sqlquer2))
					{
					$collage=$row3['collage'];
					$dept=$row3['department'];
					$yr=$row3['year'];	
					$cgpa=$row3['cgpa'];  
					}
					}
					}
					 
						# code...
					
					$sqlquery=mysql_query("select * from requesttable WHERE Student_ID='$requestid'");
					while($result1=mysql_fetch_array($sqlquery))
					{
					$votestatus=$result1['votestatus'];	
					if($votestatus=='unvote')
					{
						
					$sql=mysql_query("select * from count where CID='$varvoteid'");
					$total=mysql_num_rows($sql);
					if($total>0)
					{
					while ($row = mysql_fetch_array($sql)) 
					$VOICE=$row['VOICE'];
					$total=$VOICE+1;
					mysql_query("update count set VOICE='$total' where CID='$varvoteid'");
					mysql_query("INSERT INTO `ballotstoretable` VALUES ( '$id','$varvoteid')");
					mysql_query("update requesttable set votestatus='$i' where Student_ID='$requestid'");
					echo"You have sucssusfully voted Thank you!";
					}
					else
					{
					mysql_query("INSERT INTO `count` VALUES ('$varvoteid','$fn $ln','$age','$sex','$collage','$dept','$yr','$cgpa','1')");	
					mysql_query("INSERT INTO `ballotstoretable` VALUES ('$id','$varvoteid')");	
					mysql_query("update requesttable set votestatus='$i' where Student_ID='$requestid'");
					echo"You have sucssusfully voted Thank you!";
					}
					}}
					if($votestatus=='12')
					{
				echo"<script> alert('Sorry!!! You are already Vote! you cannot vote again please!!!'); 
				window.location = 'Candidate.php';</script>";
				exit();	
					//echo "You are already Voted! you cannot vote again please!!!";
					}
					}
			}
			else
			echo "no data found";
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
	</div>
</div>
</body>
</html>
