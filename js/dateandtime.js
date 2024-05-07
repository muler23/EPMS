function getCalendarDate()
{
   var months = new Array(13);
   months[0]  = "01";
   months[1]  = "02";
   months[2]  = "03";
   months[3]  = "04";
   months[4]  = "05";
   months[5]  = "06";
   months[6]  = "07";
   months[7]  = "08";
   months[8]  = "09";
   months[9]  = "10";
   months[10] = "11";
   months[11] = "12";
   var now         = new Date();
   var monthnumber = now.getMonth();
   var monthname   = months[monthnumber];
   var monthday    = now.getDate();
   var year        = now.getYear();
   if(year < 2000) { year = year + 1900; }
   var dateString = monthname +' ' + monthday + ', ' + year;
   return dateString;
}	

/* for time*/
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;

/*
	<div align=left> 
				<script type="text/javascript" language="JavaScript">
				var calendarDate = getCalendarDate();
				document.write(calendarDate);
				</script>
				<form name="clock">
				<input type="submit" class="trans" name="face" value="">
			</form>
		</div>
*/