<?php
session_start();
include("ppopuplogin.php");
include("Database/connection.php");
?>
<html>
<meta charset="utf-8">
<link  href="css/allcss.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/imagepreview.js"></script>
<script type="text/javascript" src="js/fontawosome.js"></script>
<script src="js/validation.js" type="text/javascript"></script>
<head>
<title>Online Stuidenet Union Voting System</title>
<style>
		.textbox
	{
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
#file
{
		height: 25px;
		width: 220px;;
		background-color: #ffffff;
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
.topnav input[type=text] {
  height: 42px;
  padding: 10px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
  margin-left: 10px;
  
}
   .topnav input[type=submit] {
    background-color:#4392bc; 
    width: 100px;
    height: 37px;
    border: none;
     padding: 10px;
  }
     .topnav input[type=submit]:hover{ 
    background-color:##c1c7c8; 
    width: 100px;
    height: 37px;
    cursor: pointer;
    color: #fff7f7;
    border: none;
     padding: 10px;
  }
  .templatemo_post_mid {
  	float: right;
	width: 550px;
	background:#dfdfdf;

}

.templatemo_post_bottom {
	margin-left: -20px;
	width: 550px;
	height: 39px;
	background-color: #BCC2BD;
	
}
hr {
    overflow: visible; /* For IE */
    padding: 0;
    border: none;
    height: 10px;
    border-top: medium double #333;
    color: #333;
    text-align: center;
}
hr:after {
    display: inline-block;
    position: relative;
    top: -0.9em;
    font-size: 1.7em;
    padding: 0 0.25em;
    background: white;
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
<body style="background-color: #FFDEAD">
<div id="container">
		<div id="header">
		<?php
		include("headerhome.php");
	   ?>
		</div>
		<div id="menu">
		<?php
include("mmenu.php");
		?>
	</div>

				<div id="leftside">
					<div id="applyside">
						<?php
							include("hhomesidemenu.php");
					   ?>	
					</div>    
				</div>
				<div id="content">
<fieldset style="margin-top: 10px; height: auto; border: none;">
<div style="margin-left: 600px;margin-top: -45px;border:1px solid #fff;padding: 5px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
<?php	
$result = mysql_query("SELECT * FROM apply_date");
$numrow = mysql_num_rows($result);
if ($numrow == 0)
{
	die('የተመዘገበ የለም.');
}
$row = mysql_fetch_row($result);
$closedate = date_format(date_create($row[2]), 'm/d/Y H:i:s');
print("ሰአቱ እስኪያልቅ መጠየቅ ይቻላል!!");
echo "<br>የመጨረሻ ቀን: " . $closedate;
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
DisplayFormat = "%%D%% Days %%H%% Hours %%M%% Minutes %%S%% Seconds.";
FinishMessage = "የምርጫ ሰአት አልቋል!";
	function calcage(secs, num1, num2) {
  s = ((Math.floor(secs/num1))%num2).toString();
  if (LeadingZero && s.length < 2)
    s = "0" + s;
  return "<b>" + s + "</b>";
}
function CountBack(secs) {
  if (secs < 0) {
    document.getElementById("cntdwn").innerHTML = "የመጠየቂያ ሰአት አልቋል ";
	window.location = "applyclose.php"
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
<!--
		<div class="templatemo_post_mid" id="Candidatecriteria">
        <label style="font-size: 30px; color: #1d6be2;margin-left: 50px;">Some of Candidates criteria</label>
            <ul>
                   <li>The Candidate should be member of Debre Markos University and regular student.</li> 
                   <li>Candidate should be non GC</li> 
                   <li>The candidate should listen and speaks the local language in his competition area.</li>   
                   <li>The candidate should have the performance to his/her given work type.</li>   
                   <li>The Candidate Should have CGPA Above 3.00</li>   
                   <li>The Candidate should be none of Descipline Record</li>   
                   <li>Fill the next information Atentivly After search Your Information</li>  
                   <li style="float: right;color: #1d6be2;list-style: none;">Good Luck!!!</li> 
            </ul>       
        </div>
-->
<div class="topnav" id="awesome_form">
    <form method="post"enctype="multipart/form-data">
      <label>መለያ ቁጥርህን እዚህ አስገባ </label><input type="text" placeholder="Search.." name="searchID" required="1"/>
      <input type="submit" value="Search" name="search">
    </form>
  </div>  
  <legend style="font-size: 30px;" align="left">መራጭ ለመሆን ጠይቅ</legend>                      
  <?php
  
			if(isset($_POST['search']))
						{
				$Search_ID=$_POST['searchID'];
				$sql="select * from student where sid='$Search_ID'";
				$userexist=mysql_query($sql);
				if(mysql_affected_rows()>0)
				{
				while($row=mysql_fetch_assoc($userexist))	
				{
					?>
			<form action="" method="post" enctype="multipart/form-data" onSubmit="return validate()">
			<table>
			  <tr>
			<td>መለያ ቁጥር:</td><td><input type="text" name="cid" class="textbox" required="1" readonly value="<?php echo $row['sid'];?>"/></td>
			<td> የተጠቃሚ ስም: </td><td><input type="text" name="un" required="1" class="textbox" onKeyPress="return ValidateAlpha(event)"/></td>
			  </tr>
			  <tr>
			  <td>የመጀመርያ ስም: </td><td><input type="text" name="fname" class="textbox" required="1" readonly value="<?php echo $row['fname'];?>"/></td>
			  <td> የይለፍ ቃል: </td><td><input type="password" name="pw" required="1" class="textbox" id="pw" pattern=".{6,}" title="Six or more characters"/>
			  				 						<script type="text/javascript">
				    var f1 = new LiveValidation('pw');
				   f1.add(Validate.Presence,{failureMessage: "X"});
				 </script>
			  </td>
			  </tr>
			 <tr>
			 <td> ያባት ስም: </td><td><input type="text" name="lname" class="textbox" required="1" readonly value="<?php echo $row['lname'];?>"/></td>
			 <td>የይለፍ ቃል ይደገም: </td><td><input type="password" name="cpw" required="1" class="textbox" id="rpw"/></td>
			 </tr>
		<tr><td>ጾታ:</td><td><input type="text" name="gender" class="textbox" required="1" readonly value="<?php echo $row['gender'];?>"/></td>
		<td>ስልክ:</td><td><input type="file" name="photo" id="file" required="1" accept="image/*" onchange="loadFile(event)"/></td>
			 </tr>
			 <tr><td> እድሜ: </td>
			 <td><input type="number" name="age" class="textbox" min="15" max="60" required="1" readonly value="<?php echo $row['age'];?>"/></td>
			 			 <td>ቀን:</td><td><input type="date" name="date"  class="textbox" readonly value="<?php echo  date("Y-m-d");?>"/></td>
			 </tr>
			 <tr><td>ኮሌጅ: </td>
			 <td><input type="text" name="collage" class="textbox" required="1" readonly value="<?php echo $row['collage'];?>"></td></tr>
			  <tr><td>ይት.ት ክፍል: </td>
			  <td><input type="text" name="department" class="textbox" required="1" readonly value="<?php echo $row['department'];?>"></td></tr>
		      <tr><td>ይት.ት አመት: </td><td><input type="text" name="year" class="textbox" required="1" readonly value="<?php echo $row['year'];?>"></td></tr>
		      <tr><td>አጠቃላይ ውጤት: </td><td><input type="text" name="cgpa" class="textbox" required="1" readonly value="<?php echo $row['cgpa'];?>"/></td></tr>
			  <tr><td colspan="2"  style="margin-left: 200px;"><input type="submit" value="Send" id="btn" name="register">
			  <input type="reset" value="Cancel" id="btn"></td></tr>
			  <img id="output"  width="150" height="170"  style="float: right;"/>
			  </table>
			  </form>	 
			  <?php
}
}
else
echo "<font color=red><center>ይቅርታ የዩኒቨርስቲው አባል አደሉም !<br>ስለዚህ ለምርጫ መወዳደር አይችሉም.</center></font>";
}
		else if(isset($_POST['register']))
				{
					$cid=$_POST['cid'];
					$fname=$_POST['fname'];
					$lname=$_POST['lname'];
					$gender=$_POST['gender'];
					$age=$_POST['age'];
					$collage=$_POST['collage'];
					$dept=$_POST['department'];
					$year=$_POST['year'];
					$cgpa=$_POST['cgpa'];
					$date=$_POST['date'];
					$username=$_POST['un']; 
					$pass=MD5($_POST['pw']);
					$cpass=$_POST['cpw'];
					$ptmploc=$_FILES["photo"]["tmp_name"];
					$pname=$_FILES["photo"]["name"];
					$psize=$_FILES["photo"]["size"];
					$ptype=$_FILES["photo"]["type"];
						$query="select * from discipline where sid='$cid'";
				        $result=mysql_query($query);
						if(mysql_num_rows($result)==0)
						{
				$sql="select * from student where sid='$cid'";
				$userexist=mysql_query($sql);
						while($row=mysql_fetch_assoc($userexist))
						{
							$gpa=$row['cgpa'];
							$program=$row['program'];
							$gender=$row['gender'];
							$year=$row['year'];
							
							
						}
							if($gpa>="3.00" && $gender=="male" ||$gpa>="2.75" && $gender=="female")
							{
								if ($year=="2" || $year=="3" ) {
									
								
							if($program=="regular")
							{
			if($psize<=1000000&&($ptype=="image/jpeg"||$ptype=="image/jpeg"||$ptype=="image/png"))
						{
				if(!file_exists("userphoto"))
					mkdir("userphoto");
				$photopath="userphoto/$pname";
				if(copy($ptmploc,$photopath))
				{
		$sql=mysql_query("insert into requesttable values('$cid','$fname','$lname','$gender','$age','$collage','$dept','$year','$cgpa','$username','$pass','Candidate','unvote','$photopath','no','$date')");
				if(!$sql)
				die("<font color=red><b><center>ከ አንድ በላይ መጠየቅ አይቻልም !</center></b></font>");
					else
						echo "<font color=green><b><center>ጥያቄዎት በትክክል ተልኳል !</center></b></font>";
						
						
								$sql2=mysql_query("insert into requesttablepreguess values('$cid','$fname','$lname','$gender','$age','$collage','$dept','$year','$cgpa','$username','$pass','Candidate','unvote','$photopath','no','$date')");
				
				}
				else
				echo "ፎቶ መስቀል አልተቻለም!";
				}
				else
				{
				if($psize>1000000)
				echo "የፎቶ ይዞታው ከ 2Kb መብለጥ አይችልም!";
				else
				echo "ፎቶው jpeg ፎርም መሆን አለበት";
				}
				}
				else
				echo "<font color=red><b><center>ኤክስቴንሽን ተማሪ መወዳደር አይችልም.</center></b></font>"; 
				}
				else
					echo "<font color=red><b><center>
				$year 'ኛ አመት ተማሪ መወዳደር አይችልም .</center></b></font>"; }
				else
				echo "<font color=red><b><center>ውጤትህ 3.00 እና ክዛ በላይ ለወንድ // 2.75እና ክዛ በላይ ለሴት  መሆን አለበት  !<br>ስለዚህ መወዳደር አትችልም .</center></b></font>";             }
			else
			echo "<font color=red><b><center>የድስፕሊን ችግር ያለበት ተማሪ መወዳደር አይችልም</center></b></font>"; 
				}
				?>
	
				</fieldset>
		    </div>
		<div id="footer">
			<?php
			include("footer.php");
			?>
	</div>
<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="images/top.png" style="width: 40px;height: 30px;border-radius: 170px;"/></button>
	</div>
</body>
</html>