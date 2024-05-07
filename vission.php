<html>
<meta charset="utf-8">
<link  href="css/allcss.css" rel="stylesheet" type="text/css"/>
<head>
<title>Online Stuidenet Union Voting System</title>
<script type="text/javascript">
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
<style>
	#content
{
	background-color: #dfdfdf;
	width: 1200px;
	height: 440px;
	margin-left: 0px;
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
		include("headerhome.php");
	   ?>
		</div>
		<div id="menu">
		<?php
		include("menu.php");
		?>
	</div>

				<div id="content">
				<div style="margin-left: 190px;">
				<h2 align="center">Vission</h2>
 The Vision of Wollo University Kombolcha Institute of Technology (KIoT) is to become among the leading higher education centers of 
academic excellence in teaching-learning, research, publications and community services in africa and
contribute to the development of Ethiopia.
                               <h5>Values</h5>
Kombolcha Institute of Technology (KIoT) is guided by the following core values/principles.
<ul>
<li>Academic Freedom: The University upholds academic freedom as its core value whereby all its communities 
exercise the right to free expression of ideas and scholarship. </li>
<li>Excellence: The University upholds excellence as the ruling standard in teaching, research, community service 
and scholarship, and commits itself to the attainment of the highest standards in academic performance. </li>
<li>Integrity and Honesty: The University promotes honesty, integrity, ethical conduct, justice, fairness, and 
nurtures a culture of teamwork, collegiality and mutual support among members of the University community.</li> 
<li>Celebrating diversity: The University promotes and honors commonalities and differences in culture, ideas, religion, 
language, ethnic identity; upholds the principle of gender equality and acknowledges the vital role of every member 
of the community</li> 
<li>Reliance on Evidence and Authority of Reason: Pronouncement and undertakings of the University shall be founded on reason 
and evidence.</li>
</ul>
</div>
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