	<?php
	session_start();
	if(isset($_SESSION['username'])&&isset($_SESSION['password']))
	{
	include("../Database/connection.php");
	?>
<html>
<meta charset="utf-8">
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
	overflow-x: hidden;
	overflow-y: hidden;
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
include("../Voter/votermenu.php");
		?>
	</div>

				<div id="leftside">
					<div id="applyside">
						<?php
							include("../Voter/votersidemenu.php");
					   ?>	
					</div>    
				</div>
				<div id="content">
<fieldset style="border: none; height: auto;">
<legend align="center"><H1>Get Any Promotion Here</H1> </legend>

	  <?php
// rows per page

$rowsPerPage = 1;

// if $_GET

if(isset($_GET['page']))

{

$pageNum= $_GET['page'];

}

else

$pageNum = 1;

// preceding rows

$previousRows =($pageNum - 1) * $rowsPerPage;

// the first, optional value of LIMIT is the start position

//the next required value is the number of rows to retrieve

	$date=date('y-m-d');
    $sql=mysql_query("select * from promotion ORDER BY dates ASC LIMIT $previousRows, $rowsPerPage");
	$row=mysql_num_rows($sql);
	if($row>0)
	{   
	while($a=mysql_fetch_array($sql))
	{
	$uid=$a["userid"];	
	$title=$a['Title'];	
	$content=$a['Content'];	
	$date=$a['Dates'];	
	
	 $sql1=mysql_query("select * from account where userid='$uid'");
	$row1=mysql_num_rows($sql1);
	if($row1>0)
	{
					while($info = mysql_fetch_array($sql1))
					{	
					$username=$info['username'];
					$photo=$info['photo'];
					$fn=$info['fname'];
					$ln=$info['lname'];
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
					}
					}
					else
					print "not found!";
					}
					?>
      
  <div style="margin: 10px;float: right;border:1px Solid #dadcdc;
					 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
					<table cellspacing="0">
						<tr  style="background-color: #5078af;height: 30px;color: #fff;"><th colspan="2">
						<label>Candidate:<?php echo ''.$fn.'';?></label></th></tr>
						<tr><td colspan="2"><center><?php echo "<img src='$photo' height=200>"?></center></td></tr>
						<tr><td><b>Full Name:</b></td><td><?php echo ''.$fn.'&nbsp;'.$ln.'';?></td></tr>
						<tr><td><b>Collage:</b></td><td><?php  echo ''.$collage.''; ?></td></tr>
						<tr><td><b>Department:</b></td><td><?php echo ''.$dept.''; ?></td></tr>
						<tr><td><b>Year:</b></td><td><?php echo ''.$yr.'&nbsp;year'; ?></td></tr>
						<tr><td><b>CGPA:</b></td><td><?php echo ''.$cgpa.''; ?></td></tr>
					</table>
					</div>
<?php
		echo "<h3> $title </h3><p> $content</p><p><i>Date Of post:$date </i></p>";
		
		
		}
	}
		
		// Find the number of rows in the query

			$query = "SELECT COUNT(pid) AS numrows FROM promotion WHERE pid!=''";

			$result = mysql_query($query) or die('Error, couldn\'t get count title=\"$page\"').mysql_error();

			//use an associative array

			$row = mysql_fetch_assoc($result);

			$numrows = $row['numrows'];

			// find the last page number

			$lastPage = ceil($numrows/$rowsPerPage);

			//we use ceil which rounds up the result, because if we have 4.2 as an answer, we'd need 5 pages.

			$phpself = $_SERVER['PHP_SELF'];

			//if the current page is greater than 1, that is, it isn't the first page

			//then we print first and previous links

					if ($pageNum > 1)

					{

					$page = $pageNum - 1;

					$prev = " <a href=\"$phpself?page=$page\" title=\"Page $page\">[Back]</a> ";

					$first = " <a href=\"$phpself?page=1\" title=\"Page 1\">[First Page]</a> ";

					}

					else

					//otherwise we do not print a link, because the current page is

					//the first page, and there are no previous pages

					{

					$prev = ' [Back] ';

					$first = ' [First Page] ';

					}

					// We print the links for the next and last page only if the current page

					//isn't the last page

					if ($pageNum < $lastPage)

					{

					$page = $pageNum + 1;

					$next = " <a href=\"$phpself?page=$page\" title=\"Page $page\">[Next]</a> ";

					$last = " <a href=\"$phpself?page=$lastPage\" title=\"Page $lastPage\">[Last Page]</a> ";

					}

					//the current page is the last page, so we don't print links for

					//the last and next pages, there is of course no next page.

					else

					{

					$next = ' [Next] ';

					$last = ' [Last Page] ';

					}

		//We print the links depending on our selections above

		echo "<br><br><br><br><br><br><hr><span style='color:  red;margin-left:150px;'>". $first . $prev . " Showing page <bold>$pageNum</bold> of <bold>$lastPage</bold> pages " . $next . $last."</span>";
	}

else echo "<div id ='error'> There is no new/recent Promotion!.</div>";
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
