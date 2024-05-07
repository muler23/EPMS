<meta charset="utf-8"><?php
include("Database/connection.php");
// session_start();
// include("popuplogin.php");
// if(isset($_session['counter']))
// 	$_session['counter']+=1;
// 	else
// 	$_session['counter']=1;
	?>
<html>
<link  href="css/allcss.css" rel="stylesheet" type="text/css"/>
<head>
<title>Online Stuidenet Union Voting System</title>


</head>
<body style="background-color: #FFDEAD">
<div id="container">
		<div id="header">
	<!-- 	<?php
		//include("headerhome.php");
	   ?>	
		</div>
		<div id="menu">
		<?php
		// include("mmenu.php");
		?>
	</div>
 -->
				<!-- <div id="leftside">
						<?php
						//include("hhomesidemenu.php");
					   ?> -->	   
				</div>
				<div id="content">
				<fieldset style="margin: 50px;width:850px;border: none;">
				<legend align="center" style="color: #418cbe;font-size: 30px;">ድምር የምርጫ ውጤት</legend>
				<table class="data-table"  border="1" style="border-collapse: collapse;">
				<thead style="background-color: #89bcae;"><tr><th>የተወዳዳሪው መለያ.ቁ</th><th>ሙሉ ስም </th><th>እድሜ</th><th>ዖታ</th><th>ኮሌጅ</th><th>የት.ት ክፍል</th><th>አመት</th><th>አማካይ ውጤት</th><th>ያገኙት ድምጽ</th><th>ደረጃ</th><th>የስራ መደብ</th></tr></thead>
				<?php 
				$sql=mysql_query("SELECT * FROM count JOIN requesttable ON count.candidate_id=requesttable.Student_ID  ORDER BY VOICE DESC ");
				//$sql=mysql_query("select * from count ORDER BY VOICE DESC ");
				$rank=1;
				while($row1=mysql_fetch_assoc($sql))
				{
                   if($rank==1)
                   $selected='ፕሬዘዳንት';
                   elseif($rank==2)
                   $selected='ምክትል ፕሬዘዳንት';
                   elseif($rank==3)
                   $selected='ጸሀፊ';
                   else
                   $selected='አባል';
                   ?>
				<tr><td><?php echo $row1['candidate_id']; ?></td><td><?php echo $row1['fname'];?></td><td><?php echo $row1['age'];?></td><td><?php echo $row1['sex'];?></td><td><?php echo $row1['collage'];?></td><td><?php echo $row1['department'];?></td><td><?php echo $row1['year'];?></td><td><?php echo $row1['cgpa'];?></td><td><?php echo $row1['VOICE'];?></td><td><?php echo $rank;?></td><td><?php echo $selected;?></td></tr>
				<?PHP
				$rank++;
				}
				?>
				</table>
				</fieldset>
		    </div>
		<!-- <div id="footer">
			<?php
			// include("footer.php");
			?>
	</div> -->
	</div>
<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="images/top.png" style="width: 40px;height: 30px;border-radius: 170px;"/></button>
</body>
</html><?php

?>