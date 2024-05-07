<?php
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
$userid=$_SESSION['userid'];
include("../Database/connection.php");
?>
<html>
<link  href="../css/allcss.css" rel="stylesheet" type="text/css"/>
<head>
<title>Online Stuidenet Union Voting System</title>
<style>
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
	height: auto;
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
				<fieldset style="border: none;height: 900px;">
				<?php
				$sql=mysql_query("select * from examresult WHERE candidate_ID=$userid");
					if(mysql_num_rows($sql)==0)
						{
						?>
						
<!----------------------------------Total Exam Date---------------------------------------------------------->
<div style="margin-left: 0px;margin-top: -5px;border:1px solid #fff;padding: 5px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);width: 300px;">
<?php	
$result = mysql_query("SELECT * FROM examdate");
$numrow = mysql_num_rows($result);
if ($numrow == 0)
{
	die('No record found.');
}
$row = mysql_fetch_row($result);
$closedate = date_format(date_create($row[0]), 'm/d/Y H:i:s');
print("This IS The Exame Date!!");
echo "<br>End of Exame Date: " . $closedate;
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
Display = "%%H%%:%%M%%:%%S%% Seconds.";
FinishMessage = "Voting is now bieng closed!";
	function calcage(secs, num1, num2) {
  s = ((Math.floor(secs/num1))%num2).toString();
  if (LeadingZero && s.length < 2)
    s = "0" + s;
  return "<b>" + s + "</b>";
}
function Countdown(secs) {
  if (secs < 0) {

    document.getElementById("dowcount").innerHTML = "Request Date is Now Closed";
	window.location = "../candidate/examclosed.php"  		
	var m=document.getElementById('Exam');	
		m.submit();
		clearTimeout(tim);
    return;
  }
  DisplayStr = Display.replace(/%%D%%/g, calcage(secs,86400,100000));
  DisplayStr = DisplayStr.replace(/%%H%%/g, calcage(secs,3600,24));
  DisplayStr = DisplayStr.replace(/%%M%%/g, calcage(secs,60,60));
  DisplayStr = DisplayStr.replace(/%%S%%/g, calcage(secs,1,60));

  document.getElementById("dowcount").innerHTML = DisplayStr;
  if (CountActive)
    setTimeout("Countdown(" + (secs+CountStepper) + ")", SetTimeOutPeriod);
}

function putspan(backcolor, forecolor) 
{
 document.write("<span id='dowcount' style='background-color:" + backcolor + 
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
Countdown(gsecs);
</script></div>
<!---------------------------------------------------End Of Exam Date----------------------------------------------------------->							
<!---------------------------------------------------Exam time----------------------------------------------------------->					
						
<div style="margin-left: 600px;margin-top: -0px;border:1px solid #fff;padding: 5px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
<?php	

$var1 = '0-0-0 00:02:00';
$var2 = '0-0-0 00:03:00';
$closetime = date_format(date_create($var1), 'm/d/Y H:i:s');
$closedate = date_format(date_create($var2), 'm/d/Y H:i:s');
print("Dear Candidate Use Time Properly!!");
print("<br>Time Allowed:1");
?>
<br>
Time Left:
<script>
closetime="<?php echo $closetime ?>";
CloseDate = "<?php echo $closedate ?>";
BackColor = "whte";
ForeColor = "red";
CountActive = true;
CountStepper = -1;
LeadingZero = true;
DisplayFormat = "%%H%%:%%M%%:%%S%%";
	function calcage(secs, num1, num2) {
  s = ((Math.floor(secs/num1))%num2).toString();
  if (LeadingZero && s.length < 2)
    s = "0" + s;
  return "<b>" + s + "</b>";
}
function CountBack(secs) {
  if (secs < 0) {
		var m=document.getElementById('Exam');	
		 m.submit();
		clearTimeout(tim);
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
var CurrentDate = new Date(closetime);
if(CountStepper>0)
  ddiff = new Date(CurrentDate-EndDate);
else
  ddiff = new Date(EndDate-CurrentDate);
gsecs = Math.floor(ddiff.valueOf()/1000);
CountBack(gsecs);
</script></div>

<!-----------------------------------------------------------end of exam time------------------------------------------------------>
<?php
$query="select * from question";
$rand=mysql_num_rows(mysql_query($query,$con));
//set question
$sq="select *from question ORDER BY RAND() LIMIT $rand ";
$result = mysql_query($sq,$con);
// Loop through each records
?>
<?php	
$number=0;
while($row = mysql_fetch_array($result))
{
$qid=$row["qid"];
$question=$row["question"];
$option1=$row["optiona"];
$option2=$row["optionb"];
$option3=$row["optionc"];
$option4=$row["optiond"];
$number++;
?>
<div id="radio_button">
  <table id="question">
  <form id="Exam" action="viewexsubmit.php" method="post" > 
<tr ><td colspan="2"><?php echo $number;?>. &nbsp;&nbsp;<?php echo $question;?></td> </tr>
<tr><td width="1"><input type="radio"  name="<?php echo $qid;?>" value="A"/></td>  <td>A)&nbsp;&nbsp;<?php echo  $option1;?> </td></tr>
<tr><td  width="1"><input type="radio"  name="<?php echo $qid;?>" value="B"/></td>  <td>B)&nbsp;&nbsp;<?php echo  $option2;?> </td></tr>
<tr><td  width="1"><input type="radio"  name="<?php echo $qid;?>" value="C"/></td>  <td>C)&nbsp;&nbsp;<?php echo  $option3;?> </td></tr>
<tr><td  width="1"><input type="radio"  name="<?php echo $qid;?>" value="D"/></td>  <td>D)&nbsp;&nbsp;<?php echo  $option4;?> </td></tr>                
<?php
}
?>
<tr><td colspan="2"><input type="submit" name="Submit" value="submit answer" style="margin-left: 800px;"/></td></tr><br/></form></table> 
</div>
<?php
					}
					else 
					echo "<script>alert('You Are Already Taken The Exam.');</script>";
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