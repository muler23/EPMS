<html>
<link  href="css/allcss.css" rel="stylesheet" type="text/css"/>
<head>
<title>Online Stuidenet Union Voting System</title>

<meta charset="utf-8">
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
<?php
 function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath)
	{
    // Connect & select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 

    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$db->query($templine)){
                $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error)?$error:true;
 
}	
 $domain="localhost";
$dbuser="root";
$dbpass="";
$dbname="osuvs"; 
$output = "C:/wamp/www/Online Student Union Voting system/osuvs.sql";
$filePath  = 'C:/wamp/www/Online Student Union Voting system/Database/osuvs.sql';
$restore=restoreDatabaseTables("localhost", "root", "", "osuvs", $filePath);
if($restore)
 echo"<br>ዳታቤዙ በትክክል ሪስቶር ሆኗል";
 else
 echo"<br>ዳታቤዙ በትክክል ሪስቶር አልሆነም";
?>
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