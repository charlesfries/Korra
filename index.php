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
				<a href="javascript:about()">About</a>
	    </div>
			
			<div class="loader" id="loader"></div>
			
	    <center>
				<input type="text" id="query" placeholder="Hello, I am Korra! Ask me anything!" style="width:100%" name="q" value="<?php echo $_GET['q']; ?>" onkeydown="go()">
	      <br>
	      <span class="response"><?=$response?></span>
				
				<script>
					function about() {
						alert("Korra Platform v1.0\nCreated by Charles Fries\n© 2016 Charles Fries")
					}
				
					document.onkeypress = function() {
						document.getElementById("query").focus();
					}
				
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
					
					var target = document.getElementById("loader");
					
					function proc() {
						window.location = "?q="+document.getElementById("query").value;
					}

					function go() {
						if (event.keyCode == 13) {
							var spinner = new Spinner(opts).spin(target);
							setTimeout(proc,100);
						}
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
		<script src="lib/spin.js/spin.min.js"></script>
		
	</body>
</html>