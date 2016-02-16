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
		
		<link rel="stylesheet" href="lib/speech-input/speech-input.css">
		
	</head>
	<body>
    
		<div class="top">
			
	    <div class="nav">
				Korra Platform v1.0<br>
				<a href="/">Home</a><br>
	      <a href="dashboard.php">Dashboard</a><br>
				<a href="javascript:about()">About</a>
				<script>
				function about() {
					alert("Korra Platform v1.0\nCreated by Charles Fries\n© 2016 Charles Fries")
				}
				</script>
	    </div>
			
	    <center>
				<form method="get">
					<div class="si-wrapper">
						<!--<input class="si-input" id="typer" type="text" placeholder="Hello, I am Korra! Ask me anything!" size="40" name="q" value="<?php echo $_GET['q']; ?>">-->
						<!--<button class="si-btn">
			        speech input
			        <span class="si-mic"></span>
			        <span class="si-holder"></span>
			    	</button>-->
						<input id="typer" type="text" placeholder="Hello, I am Korra! Ask me anything!" size="40" name="q" value="<?php echo $_GET['q']; ?>">
					</div>
				</form>
	      <br>
	      <span class="response"><?=$response?></span>
				<script>
				document.onkeypress = function() {
					document.getElementById("typer").focus();
				}
				</script>
	    </center>
			
		</div>
		
		<div id="footer">
  		&copy; 2016 Charles Fries
		</div>

		<script src="lib/three.js/three.min.js"></script>
		<script src="lib/three.js/Projector.js"></script>
		<script src="lib/three.js/CanvasRenderer.js"></script>
		<script src="lib/three.js/example.js"></script>
		
		<script src="lib/speech-input/speech-input.js"></script>
		
	</body>
</html>