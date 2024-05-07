<html>
<meta charset="utf-8">
<head>
<script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>
  <script>
  $(document).ready(function(){
    $("#logForm").validate();
  });
  </script>  
</head>
<?php
include "config.php";

$sql = "SELECT * FROM adocument where title='font'";
//$sql .= "ORDER BY filename ASC";
$result = mysql_query($sql);
$rows = mysql_num_rows($result);
//echo '<li>';
for ($i = 0; $i < $rows; $i++) {
  $data = mysql_fetch_object($result);
  // since our script is very small, i'm not going to escape out to html mode here
  echo "   <a href='download.php?id=$data->document'>አማረኛ ሶፍትዌር </a> ";
 ;

}

mysql_free_result($result); 
mysql_close();
?>
<?php
include "config.php";


	$per_page=3;
	
	$page_query=mysql_query("select count(id) from adocument");
	$pages=ceil(mysql_result($page_query,0)/$per_page);
$page=(isset($_GET['page']))? (int) $_GET['page']:1;
$start=($page-1)*$per_page;
$sql = "SELECT * FROM adocument order by id desc limit $start,$per_page";
//$sql .= "ORDER BY filename ASC";
$result = mysql_query($sql);
$rows = mysql_num_rows($result);

for ($i = 0; $i < $rows; $i++) {
  $data = mysql_fetch_object($result);
  // since our script is very small, i'm not going to escape out to html mode here
  echo "<div align='center'>";
 echo "<b>";
  echo "<u>";
  echo "  $data->title";
    echo "</u>";
   echo "</b>";
    echo "</div>";
 
    echo "<br>";
  //echo "  <td>$data->filesize</td>\n";
  //echo "  <td>" . stripslashes($data->Description) . "</td>\n";
  
   echo "<div align='center'>";
  
  echo "   <a href='download.php?id=$data->document'><img class='icon' width=;100' height='100' alt='አዉርድ/download' title='CLICK TO DOWNLOAD' src='images/reg3.jpg'></a> ";
 ;
  echo "</div>";
}
mysql_free_result($result);
mysql_close();

echo '<div align="center" id="Layer1">';
echo '<div class="pagination2">';
if($pages>=1 && $page<=$pages){
for($x=1;$x<=$pages;$x++){
//echo 'Page'.$x;
echo ($x==$page)?'<strong><font size="+1" style="text-decoration:blink" ><a   href="?page='.$x.'"  >'.'<span>'.$x.'</span>'.'</a></font></strong>'.' ':'<a  class="button" href="?page='.$x.'">'.'<span>'.$x.'</span>'.'</a>'.' ';

}

}	
echo '</div>';
echo '</div>';
?>
</html>
<body bgcolor=#ffffcc>