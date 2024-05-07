<?php
	session_start();
	if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
	include("../Database/connection.php");
	$id=$_SESSION['userid'];
	?>
<html>
<meta charset="utf-8">
<link  href="../css/allcss.css" rel="stylesheet" type="text/css"/>

<head>
<title>EPMS</title>
<style>
#content
{
	background-color: #dfdfdf;
	width: 970px;
	height: 1350px;
	margin-left: 230px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: hidden;
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
    color: #000000;
}
</style>
<script>
		var loadFile = function(event) 
		{
		var reader = new FileReader();
		reader.onload = function()
		{
		var output = document.getElementById('output');
		output.src = reader.result;
		};
		reader.readAsDataURL(event.target.files[0]);
		};
		
			function ValidateAlpha(evt)
        {
            var keyCode = (evt.which) ? evt.which : evt.keyCode
            if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32 &&  keyCode != 8  &&  keyCode != 9)
				{
				alert("please enter	Only letters! ")
            return false;
			}}
    </script>
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
	<script>window.addEventListener('scroll',()=></script>
<div id="container">
		
		<div id="menu">
		<?php
include("../Voter/votermenu.php");
		?>
	</div>

				<div id="leftside">
					<div id="applyside">
						<?php
							include("../Voter/votersidemenuu.php");
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
	die('No record found.');
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
	window.location = "../Voter/voteclosed.php"
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
     $query="SELECT * FROM  account WHERE username='".$_SESSION['username']."' ";
     $result=mysql_query($query);
     $row=mysql_fetch_array($result);
     $id=$row['requestid'];
     //echo "$id";
     $sql="SELECT *FROM states WHERE veteriid='$id'";
     $r1=mysql_query($sql);
     $r2=mysql_fetch_array($r1);
     $status=$r2['countt'];
     //echo $status;
     if ($status>=11) {
     	echo "your vot limit is exced ";

     	?><!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  background-color: black;
  font-family: cursive;
}

.glow {
  font-size: 80px;
  color: #fff;
  font-family: ALGERIAN;
  text-align: center;
  -webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #FF0000, 0 0 20px #FF0000, 0 0 30px #0000FF, 0 0 40px	#FFFF00, 0 0 50px #0000FF, 0 0 60px 	#FFFF00, 0 0 70px 	#FFFF00;
  }
  
  to {
    text-shadow: 0 0 20px #008000, 0 0 30px #008000, 0 0 40px #008000, 0 0 50px #008000, 0 0 60px #0000FF, 0 0 70px #0000FF, 0 0 80px #ff4da6;
  }
}
</style>
</head>
<body style="background-color: red">

<h1 class="glow">your vot limit is exced</h1>
     
</body>
</html> 
<?php
     }
     else
     {
     	$sq="SELECT * FROM account JOIN  requesttable ON account.requestid=requesttable.Student_ID WHERE account.role='Candidate'";
     	$sq1=mysql_query($sq);
     	while($info = mysql_fetch_array($sq1))
				{	
					//$role=$info['role'];

					$username=$info['requestid'];
					$photo=$info['photo'];
					$fn=$info['fname'];
					$ln=$info['lname'];
					$userid=$info['userid'];
					$collage=$info['collage'];
					$dept=$info['department'];
					$yr=$info['year'];
					$cgpa=$info['cgpa'];

					$sq0="SELECT * FROM  ballotstoretable WHERE Voters_ID='$id' AND Candidate_ID='$username'";
					$RE=mysql_query($sq0);
					$coount=mysql_num_rows($RE);
					if ($coount>0) {
						continue;
					}
					else
					{
						?>
                     
					
					<!-- if problem ocure here put ?> -->
					<div style="margin: 5px;float: left;border:1px Solid #dadcdc;
					 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
					<table cellspacing="0">
						<tr  style="background-color: #5078af;height: auto;color: #fff;"><th colspan="2">
						<label>Candidate:<?php echo ''.$fn.'';?></label></th></tr>
						<tr><td colspan="2"><?php echo "<img src='$photo' height=150>"?></td></tr>
						<tr><td><b>ID:</b></td><td><?php echo ''.$username.'';?></td></tr>
						<tr><td><b>Full Name:</b></td><td><?php echo ''.$fn.'&nbsp;'.$ln.'';?></td></tr>
						<tr><td><b>Collage:</b></td><td><?php  echo ''.$collage.''; ?></td></tr>
						<tr><td><b>Department:</b></td><td><?php echo ''.$dept.''; ?></td></tr>
						<tr><td><b>Year:</b></td><td><?php echo ''.$yr.'&nbsp;year'; ?></td></tr>
						<tr><td><b>CGPA:</b></td><td><?php echo ''.$cgpa.''; ?></td></tr>
						<tr><td colspan="2"><a href="vote.php?voteid=<?php echo $username;?>" class="btn">Vote<a/></td></tr>
					</table>
					</div>
					<?php
					}
				}
         
				//	print "no candidate found!";
     }
if (isset($_GET['voteid'])) {
    $voted_id=$_GET['voteid'];
     //echo $voted_id;
    //record date to ballot table
    $insert="INSERT INTO ballotstoretable (Voters_ID,Candidate_ID) VALUES('$id','$voted_id')";
    $res=mysql_query($insert);
     //update voter chance
    $sql2="SELECT * FROM states WHERE veteriid='$id'";
    $res=mysql_query($sql2);
    $count=mysql_num_rows($res);
    if ($count>0) {
     $sq="UPDATE states SET countt=countt+1 WHERE veteriid='$id'";
    $res=mysql_query($sq);	
    }
	else
	{
		$sql3="INSERT INTO states (veteriid,countt) VALUES('$id',1)";
		mysql_query($sql3);

	}
   //select candidate on count table
	$sql4="SELECT * FROM count WHERE candidate_id='$voted_id'";
	$res1=mysql_query($sql4);
	$count2=mysql_num_rows($res1);
	if ($count2>0) {
		//update candidate voice
    $can="UPDATE count set VOICE=VOICE+1  WHERE candidate_id='$voted_id' ";
    mysql_query($can);
	}
	else
	{
		// inserti candidate information
		$ins="INSERT INTO count  VALUES(1,'$voted_id')";
		if (mysql_query($ins)) {
			echo "succssfuly";
			# code...
		}
		else
			echo "error".mysql_error($conn);
	}
	header("location: vote.php");
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
 