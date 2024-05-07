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
<title>Online Stuidenet Union Voting System</title>
<style>
		.avatar {
    width: 50px;
    height: 32px;
    border-radius: 50px;
    background-color:white;
}
#content
{
	background-color: #dfdfdf;
	width: 970px;
	height: 600px;
	margin-left: 230px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: scroll;
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
<body style="background-color: #FFf">
<div id="container">
		
		<div id="menu">
		<?php
		include("menu.php");
		?>
	</div>

				<div id="leftside">
					<div id="applyside">
						<?php
						include("homesidemenuu.php");
					   ?>	
					</div>    
				</div>
				<div id="content">
<?php include("popuplogin.php");?>
<fieldset style="border: none;">
<legend align="center"><H1>Notice Board</H1> </legend>
<?php
	$date=date('Y-m-d hh:mm');
	$sql1=mysql_query("SELECT * from notice where Ex_Dates>='$date' ORDER BY dates ASC") or die(mysql_error());
	$ro=mysql_num_rows($sql1);
	if($ro!='0')
	{
	$sql=mysql_query("SELECT * from notice where Ex_Dates>='$date' ORDER BY dates ASC") or die(mysql_error());
	while($row=mysql_fetch_array($sql))
	{
	
            echo"<p align='right'><b>Date:</b>"."<u>".$row['Dates']."</u>"."</p>";
            echo"<center>"."<u>".$row['Title']."</u>"."</center>"."</p>";       	
			/*echo"<center>".$row['Dates']."</center>"."</p>"."</font>";*/
			echo "<font  size='3' color='#00000b'>".$row['myfile'];
           echo"<font size='4' color='#00000b'><br><u><i>Posted By:".$row['sender']."</i></u>"."</p>";
         	echo "<hr>"	;

	}
	}
	else
	{
		echo "There is No Posted Notice!!!";
		
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