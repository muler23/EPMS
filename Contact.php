<?php
session_start();
include("Database/connection.php");
?><html>
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
		height: 50px;
		width: 500px;
		border-top: none;
		border-left: none;
		font-family: Times New Roman;
		font-weight:italic;
		font-size: inherit;
		
	}
	#menu
{
    /* background-color: red; */
width: 1350px; 
/* height: 750px; */
    margin-top: -40px;
    margin-left: -72px;

}
#leftside
{
	background-color: black;
	width: 100px;
	height: 620px;
	float: left;
	 /* //margin-top: -10px; */
    margin-left: -1350px;

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
	margin-left: 50px;
	margin-top: 7px;
	overflow-x: hidden;
	overflow-y: hidden;
}
</style>
</head>
<body style="background-color: #FFF">
<div id="container">
		
		<div id="menu">
		<?php
		include("menu.php");
		?>
	</div>
	<div id="leftside">
</div>
				<div id="content">
<?php include("popuplogin.php");?>
                <fieldset  style="height: 500px;border: none;">
                <legend align="right"><img src="images/contact.jpg" height="60px;" width="500px;"/> </legend>
                <?php
                $sql=mysql_query("select * from account WHERE role='Adminstrator' or role='SSD' or role='Main-Registrar' LIMIT 3");
                while($row=mysql_fetch_assoc($sql))
                {
				$fname=$row['fname'];
				$lname=$row['lname'];
				$role=$row['role'];
				
                ?>
                <div style="background-color: #cdd9ed;float: left;padding: 10px;margin: 10px; width: 270px;font-family: Times New Roman;">
         		Full Name:<label><?php echo $fname.'&nbsp;'.$lname;?></label><br>
                Position:<label><?php echo $role;?></label><br>
                Phone Number:<label>+251918749948</label><br>
                Email:<label>example@gmail.com</label><br><br>
                <img src="images/cotactus.png" style="width: 270px;"/>
                </div>

                <?php
                }
                ?> 
                 <div style="color: #006699;padding-top: 50px;font-size: 25px;float: right;">
                	Just Contact Us By Using Above Information!!!!!
                </div>
				</fieldset>
		    </div>
		<div id="footer">
			<?php
			include("footer.php");
			?>
	</div>
	</div>
</div>
</body>
</html>
