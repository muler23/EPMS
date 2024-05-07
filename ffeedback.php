<?php
session_start();
include("Database/connection.php");
?>
<html>
<meta charset="utf-8">
<link  href="css/allcss.css" rel="stylesheet" type="text/css"/>
<head>
<title>Online Stuidenet Union Voting System</title>
<style>
		.avatar {
    width: 50px;
    height: 32px;
    border-radius: 50px;
    background-color:white;
}
	.textbox
	{
		height: 40px;
		width: 400px;
		border-top: none;
		border-left: none;
		font-family: Times New Roman;
		font-weight:italic;
		font-size: inherit;
		
	}
	.textarea
	{
		height: 100px;
		width: 500px;
		
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
	width: 1200px;
	height: 470px;
	margin-left: 0px;
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
		include("headerhome.php");
	   ?>
		</div>
		<div id="menu">
		<?php
		include("mmenu.php");
		?>
	</div>

				<div id="content">
				<?php include("ppopuplogin.php");?>
				<?php
		if(isset($_POST['send']))
				{
					$email=$_POST['email'];
					$comment=$_POST['comment'];
					$date=$_POST['date'];
					$sql=mysql_query("insert into feedback(email,comment,date) values('$email','$comment','$date')");
					if(!$sql)
					{
						die("Data not inserted:".mysql_error());
					}
					else
					{
						echo "በትክክል ተልኳል";
					}
				}
				?>
		<fieldset style="height: 300px;border: none;margin: 50px;"><legend style="color:#006699;font-size: 27px;">አስተያየቶችዎን እዚህ ብቻ ያስቀምጡ</legend>
<form name="feedback" method="post" action="#">
<table>
<tr>
<td>
የ ኢሜል አድራሻ:
</td>
<td >
<input type="email" style="background-image:none;" name="email" required="true" class="textbox" placeholder="የኢሜል አድራሻ ያስገቡ">
</td>
</tr>
<tr>
<td>
አስተያየቶች
</td>
<td>
<textarea name="comment" maxlength="1000" cols="25" rows="6" class="textarea" placeholder="የራስዎን አስተያየት እዚህ ያኑሩ" style="width: 400px;" required="1"></textarea>
</td>
</tr>
<tr><td>ቀን:</td><td><input type="datetime" name="date" value="<?php echo  date("Y-m-d h:i:s");?>" readonly="1"  class="textbox"></td></tr>
<tr>
<td colspan="2" style="text-align:right">
<input type="submit" value="Send" id="btn" name="send"> <input type="reset" value="Cancel" id="btn">
</td>
</tr>
<div style="float: right;margin-top: -19px;margin-right: -10px;"><img src="images/feedback.jpg" height="300px;" width="250px;"/> </div>
</table>
</form>
</fieldset>
		    </div>
		<div id="footer">
			<?php
			include("ffooter.php");
			?>
	</div>
<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="images/top.png" style="width: 40px;height: 30px;border-radius: 170px;"/></button>
	</div>
</body>
</html>
