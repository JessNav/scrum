<!-- HTML5 Doc -->
<!DOCTYPE html>
<html>
	<head>
    	<script>
			<!-- Regular Timer -->
			var minutes = 0;
			var seconds = 0;
			
			<!-- Countdown Timer = 15 Min. -->
			var minutesCD = 15;
			var secondsCD = 0;
			
			var timeout;
			
			document.getElementById("countUpMin").innerHTML = minutes.toString();
			document.getElementById("countUpSec").innerHTML = "0" + seconds.toString();	
			document.getElementById("countDownMin").innerHTML = minutesCD.toString();	
			document.getElementById("countDownSec").innerHTML = "0" + secondsCD.toString();	
			
			function startTimer()
			{
				timeout = window.setInterval("timer()", 1000);
			}
			
			function timer()
			{
				/* Regular Timer */
				
				seconds ++;
				secondsCD --;
				
				<!-- Adjust the Minutes -->
				if( seconds >= 60)
				{
					minutes ++;
					seconds = 0;
					document.getElementById("countUpMin").innerHTML = minutes.toString();	
				}
				
				<!-- Display Zero in seconds (1 to 9)-->
				if(seconds < 10)
				{
					document.getElementById("countUpSec").innerHTML = "0" + seconds.toString();
				}
				else
				{
					document.getElementById("countUpSec").innerHTML = seconds.toString();	
					
				}
				
				<!-- Display Zero in seconds (1 to 9)-->
				if(secondsCD < 10)
				{
					document.getElementById("countDownSec").innerHTML = "0" + secondsCD.toString();	
				}
				else
				{
					document.getElementById("countDownSec").innerHTML = secondsCD.toString();	
				}
				
				
				/* Countdown Timer */
				
				<!-- Adjust the Minutes -->
				if(secondsCD <= 0)
				{
					minutesCD --;
					secondsCD = 59;
					document.getElementById("countDownMin").innerHTML = minutesCD.toString();
				}
				
				<!-- Display Zero in seconds (1 to 9)-->
				if(secondsCD < 10)
				{
					document.getElementById("countDownSec").innerHTML = "0" + secondsCD.toString();	
				}
				else
				{
					document.getElementById("countDownSec").innerHTML = secondsCD.toString();	
				}
				
				
				<!-- Stop timer when 15 minutes are up -->
				if( minutes >= 15 || (minutesCD <= 0 && secondsCD <= 0) )
				{
					stopTimer();
					minutes = 15;
					seconds = 0;
					minutesCD = 0;
					secondsCD = 0;
					document.getElementById("countUpMin").innerHTML = minutes.toString();
					document.getElementById("countUpSec").innerHTML = "0" + seconds.toString();	
					document.getElementById("countDownMin").innerHTML = minutesCD.toString();	
					document.getElementById("countDownSec").innerHTML = "0" + secondsCD.toString();	
				}
			}
			
			function stopTimer()
			{
				clearTimeout(timeout);
			}
			
			function resetTimer()
			{
				stopTimer();
				minutes = 0;
				seconds = 0;
				minutesCD = 15;
				secondsCD = 0;
				document.getElementById("countUpMin").innerHTML = minutes.toString();
				document.getElementById("countUpSec").innerHTML = "0" + seconds.toString();	
				document.getElementById("countDownMin").innerHTML = minutesCD.toString();	
				document.getElementById("countDownSec").innerHTML = "0" + secondsCD.toString();	
				
			}
		</script>
    	
        <style>
			div
			{
				float: left;
			}
			div#buttons
			{
				float: none;
			}
		</style>
    
    </head>
    <body>
    
    <div id = "buttons">
        <input type="button" onClick="startTimer()" value="Start Meeting" />
        <input type="button" onClick="stopTimer()" value="Stop Meeting" />
        <input type="button" onClick="resetTimer()" value="Reset" />
    </div>
    
    <div id="countUpMin">0</div>
    <div>:</div>
    <div id="countUpSec">00</div>
    
 
 	<br />   
    
    <div id="countDownMin">15</div>
    <div>:</div>
    <div id="countDownSec">00</div>
    
    </body>
</html>