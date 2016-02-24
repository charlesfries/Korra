<?php
require("controller.php");
require("analyzer.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Korra</title>
		
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
		
		<link rel="apple-touch-icon" href="img/icon.png">
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
    
		<div class="top">
	    <div class="nav">
				Korra Platform v1.0<br>
				<a href="/">Home</a><br>
	      <a href="dashboard.php">Dashboard</a><br>
				<a href="javascript:about()">About</a><br>
	    </div>
			<div class="loader" id="loader"></div>
	    <center>
				<input type="text" id="query" placeholder="Hello, I am Korra! Ask me anything!" style="width:100%" name="q" value="<?=$_GET['q']?>" onkeydown="go()">
	      <br>
	      <span class="response" id="resp"><?=$response?></span>
	    </center>
		</div>
		
		<div id="footer">&copy; 2016 Charles Fries</div>
		
		<script>
			function about() {
				alert("Korra Platform v1.0\nCreated by Charles Fries\n© 2016 Charles Fries");
			}
		
			document.onkeypress = function() {
				document.getElementById("query").focus();
			}
			
			function go() {
				if (event.keyCode == 13) analyze(document.getElementById("query").value);
			}
		</script>

		<script src="lib/three.js/three.min.js"></script>
		<script src="lib/three.js/Projector.js"></script>
		<script src="lib/three.js/CanvasRenderer.js"></script>
		<script src="lib/three.js/example.js"></script>
		<script src="lib/spin.js/spin.min.js"></script>
		<script src="lib/annyang/annyang.min.js"></script>
		<script src="lib/jquery/jquery.min.js"></script>
		
		<script>
			if (annyang) {
				var commands = {
					"lights on": function() {
						analyze("lights on");
					},
					"lights off": function() {
						analyze("lights off");
					}
				};
				annyang.addCommands(commands);
				annyang.start();
				/*var commands = {
					"korra *tag": showFlickr
				};
				var showFlickr = function(tag) {
					analyze(tag);
				}*/
			}
			
			function analyze(query) {
			  
				// Interface
				document.getElementById("query").value = query;
				
				var opts = {
					lines: 13,
					length: 28,
					width: 14,
					radius: 42,
					scale: 0.3,
					corners: 1,
					color: "#fff",
					opacity: 0.25,
					rotate: 0,
					direction: 1,
					speed: 1,
					trail: 60,
					fps: 20,
					zIndex: 2e9,
					className: "spinner",
					top: "50%",
					left: "50%",
					shadow: false,
					hwaccel: false,
					position: "relative"
				};
				var spinner = new Spinner(opts).spin(document.getElementById("loader"));
				
				var audio = new Audio("audio/blip.mp3");
				audio.play();
				
				// Processing
			  var words = query.split(" ");
				
				if (words[0].toLowerCase() == "lights") {
					if (words[1].toLowerCase() == "on") {
			      window.location = "?s=allOn";
			    } else if (words[1].toLowerCase() == "off") {
			      window.location = "?s=allOff";
			    }
				} else {
					document.getElementById("resp").innerHTML = "Sorry, I am incapable of answering that question.";
				}
			}
		</script>
		
	</body>
</html>